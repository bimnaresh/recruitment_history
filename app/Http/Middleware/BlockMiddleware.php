<?php namespace App\Http\Middleware;

use Closure;

class BlockMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user()->status != 1)
        {
        	\Session::flash('message', 'You are Blocked by Admin');
            return redirect('home');
        }
		return $next($request);
	}

}
