<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Session;
use Hash;
use App\History;
class PasswordController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('member.password_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		 $input = $request->input();
		    $data = $request->only('old_password','password','password_confirm');
        $rules = array(
        	
        	'old_password' => 'required',
        	'password' => 'required',
                'password_confirm' =>'required'                
        	);
        $v= \Validator::make($data,$rules);
        if($v->fails()){
        	return view('member.password_create')->withErrors($v)
        				->withInput($data);
        } else {
        	$old_password = $input['old_password'];
        	//$old_password = Hash::make($old_password);	
        	if(Hash::check($old_password, Auth::user()->password))
        	{	
			$password = $input['password'];
        	$password = \Hash::make($password);
        	$update= DB::table('members')
            ->where('id', Auth::user()->id)
            ->update(['password' => $password]);
            		$history = new History;
					$history->action_id = Auth::user()->id;;
					$history->action = 'Password Changed';
					$history->user = Auth::user()->name;
					$history->remark = '';
					$history->save();
            Session::flash('message', 'Password has been changed successfully');
            return Redirect::to('home');
        	 }else{
        		Session::flash('message', 'Old password Incorrect');
        		return view('member.password_create');
        	 }
          }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
