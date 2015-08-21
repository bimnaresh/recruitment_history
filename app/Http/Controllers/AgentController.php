<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\MemberProfile;
use Auth;
Use Redirect;
use DB;
use Session;
use Input;
use App\DemandDelete;
use App\Demand;
use App\EmailDelete;
use App\History;
use Validator;
class AgentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$id = Auth::user()->id;
		$update= DB::table('members')
		->where('id', $id)
		->update(['loginas' => 3 ]);
		Session::flash('message', 'Welcome to Agent Portal');
		return Redirect::to('home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('agent.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$agentp = DB::table('members')->whereId($id)->first();
		return view('agent.index')->with('agentp',$agentp);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$agentp = DB::table('members')->whereId($id)->first();
		return view('agent.edit')->with('agentp',$agentp);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$input = $request->input();
		if(Input::file('company_document'))
		{
		$company_document = array('file' => Input::file('company_document'),'extention' => Input::file('company_document')->getClientOriginalExtension());
		
		$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:pdf,doc,docx,jpeg,bmp,png');
		$validator = Validator::make($company_document, $rules);			
		
		if ($validator->fails()) {
   		
			Session::flash('message', 'File must be less than 2Mb and only pdf,doc,docx,jpeg,bmp,png');
			$agentp = DB::table('members')->whereId($id)->first();
			return view('agent.edit')->with('agentp',$agentp);
		}
		else {

		$destinationPath = 'upload';
		$companyDocumentExtension = Input::file('company_document')->getClientOriginalExtension();
		$companyDocumentName = rand(11111,99999).'_comp_docu'.'.'.$companyDocumentExtension;
		Input::file('company_document')->move($destinationPath, $companyDocumentName);
		}
		}
		
		$update= DB::table('members')
		->where('id', $id)
		->update(['name' => $input['name'],'address' => $input['address'], 'contactNumber' => $input['contactNumber'],'email' => $input['email']]);
		$ret= DB::table('memberprofile')->where('uid',$id)->first();		
		if($ret)
		{
			$mpupdate= DB::table('memberprofile')
			->where('uid', $id)
			->update(['company_name' => $input['company_name'],'company_address' => $input['company_address'], 'company_information' => $input['company_information'],'company_document' => isset($companyDocumentName)?$companyDocumentName:'']);
		}else{
			$memprofile = new MemberProfile;
			$memprofile->uid = $id;
			$memprofile->company_name = $input['company_name'];
			$memprofile->company_address = $input['company_address'];
			$memprofile->company_information = $input['company_information'];
			$memprofile->company_document = isset($companyDocumentName)?$companyDocumentName:'';
			$memprofile->save();            	
		}
		$rethistory= History::whereAction_idAndAction($id,'Profile Updated')->first();

		if($rethistory)
		{
			$history = History::find($rethistory->id);
			$history->action = 'Profile Updated';
			$history->user = Auth::user()->name;
			$history->remark = '';
			$history->save();
		}else{
			$history = new History;
			$history->action_id = $id;
			$history->action = 'Profile Updated';
			$history->user = Auth::user()->name;
			$history->remark = '';
			$history->save();
		}
		Session::flash('message', 'Updated successfully');
		return Redirect::to('home');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$update= DB::table('personalinformation')
		->where('id', $id)
		->update(['agent_approval_delete' =>2]);
		return Redirect::to('approval_view');
	}
	public function approval_view()
	{
		/*$approved= DB::table('personalinformation')->where('approval_status',1)->get();
		return view('agent.approval')->with('approved',$approved);*/
	}
	public function demand_view()
	{
		$query=Demanddelete::SELECT('demandId')->where('userId',Auth::user()->id)->get()->toArray();
		$empdemand= Demand::whereNotIn('id',$query)		
		->orderBy('id','desc')->paginate(10);
		$empdemand->setPath('empdemand');
		return view('agent.demand')->with('empdemand',$empdemand);
	}
	/*
	public function demand_delete($id)
	{
		$deleteChecked = Input::get('demand');	
			if($deleteChecked)
			{		
			foreach($deleteChecked as $delete)
			{
			$insert= new Demanddelete;
			$insert->userId = Auth::user()->id;
			$insert->demandId = $delete;
			$insert->save();
			}
			}
		    return Redirect::to('demand_view');
		}*/
		public function demand_view_detail($id)
		{
			$det= DB::table('demand')->whereId($id)->first();

			$e= $det->eid;

			$emdet= DB::table('members')->whereId($e)->first();
			return view('agent.demandetail')->with('det',$det)->with('emdet',$emdet);
		}
		public function notification_email_view()
		{
			$query=EmailDelete::SELECT('emailId')->where('userId',Auth::user()->id)->get()->toArray();
			if(Auth::user()->loginas==2)
			{
				$email= DB::table('notification')->whereIn('to',['a','e',Auth::user()->id])
				->whereNotIn('id',$query)
				->orderBy('id','desc')->paginate(10);
		// return view('agent.notification')->with('not',$not);
			}else{

				$email= DB::table('notification')->whereIn('to',['a','g',Auth::user()->id])
				->whereNotIn('id',$query)
				->orderBy('id','desc')->paginate(10);
			}
			$email->setPath('email');
			return view('agent.notification')->with('email',$email);

		}
	}
