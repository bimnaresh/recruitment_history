<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
use DB;
use Redirect;
use App\EmailDelete;
use Input;
use App\EmailView;
class NotificationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query=EmailDelete::SELECT('emailId')->where('userId',Auth::user()->id)->get()->toArray();
		$adminemail= DB::table('notification')->where('from',Auth::user()->id)
		->whereNotIn('id',$query)
		->orderBy('id','desc')->paginate(10);
		$adminemail->setPath('adminemail');
		return view('member.notification_index')->with('adminemail',$adminemail);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('member.notification_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->input();
		$data = $request->only('to','subject');
		$rules = array(
			'to' =>'required',
			'subject' => 'required'
			);
		$v= \Validator::make($data,$rules);
		if($v->fails()){
			return view('member.notification_create')->withErrors($v)
			->withInput($input);
		} else {

			$fid=Auth::user()->id;
			$insert= new Notification;
			$insert->from = $fid;
			$insert->to = $input['to'];
			$insert->subject = $input['subject'];
			$insert->message = $input['message'];
			$insert->status = 0;
			$insert->save();
			/*$insert=DB::table('notification')->insert(
    			['from' => $fid, 'to' => $input['to'],'subject' =>$input['subject'], 'message' => $input['message'], 'status' => 0]
    			);*/
return \Redirect::to('notification');
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
		$query=EmailView::where('userId',Auth::user()->id)
				->where('emailId',$id)->first();
		if($query)
		{

		}else{
			if(Auth::user()->loginas!=1)
			{
		$insert= new EmailView;
		$insert->userId = Auth::user()->id;
		$insert->emailId = $id;
		$insert->save();
		}
		}
		$notif= DB::table('notification')->whereId($id)->first();
		if(Auth::user()->loginas==1)
		{
			return view('member.sentEmail')->with('notif',$notif);
		}
		else
		{
			return view('agent.notificationDetail')->with('notif',$notif);
		}

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
		
		$deleteChecked = Input::get('email');		
		foreach($deleteChecked as $delete)
		{
			$insert= new EmailDelete;
			$insert->userId = Auth::user()->id;
			$insert->emailId = $delete;
			$insert->save();
		}
		
		if(Auth::user()->loginas==1)
		{
			return Redirect::to('notification');
		}
		else
		{
			return Redirect::to('notification_email_view');
		}

	}

}
