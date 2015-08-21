<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Session;
use Input;
use App\PersonalInformation;
use App\EmployerApproval;
use App\Member;
Use App\SkillsInformation;
Use App\EducationalInformation;
use App\History;
class ApprovalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		if(Auth::user()->type==1 && Auth::user()->loginas==1)
		{
			$resump= PersonalInformation::join('employerapproval','personalinformation.id','=','employerapproval.pid')
			->join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')
			// ->join('educationinformation','personalinformation.id', '=', 'educationinformation.pid')
			->where('personalinformation.approval_status','!=',1)
			->where('personalinformation.approved_by','!=',0)
			->orderBy('personalinformation.id','desc')->paginate(10);

			$resump->setPath('resump');	
			return view('member.approval')->with('resump',$resump);
		}else{
			$resump= PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')
			// ->join('educationinformation','personalinformation.id', '=', 'educationinformation.pid')
			->join('privacyinformation','personalinformation.id', '=', 'privacyinformation.pid')			
			->where('privacyinformation.privacy','=',1)
			->where(function ($cquery)
			{
				$cquery->where('personalinformation.approval_status','=',0)
				->orwhereIn('personalinformation.approved_by',[1,Auth::user()->id]);
			})
			->orderBy('personalinformation.id','desc')->paginate(10);
			$resump->setPath('resump');
			return view('employer.approval_index')->with('resump',$resump);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		
	// return $resumep;
		if(Auth::user()->type==1 && Auth::user()->loginas==1)
		{
			if($request['skill'])
			{
				$skillsearch=SkillsInformation::select('pid')->where('skills',$request['skill'])->get()->toArray();
				
			}else{
				$skillsearch=PersonalInformation::select('id')->get()->toArray();
			}
			if($request['qualification'])
			{
				$edusearch=EducationalInformation::select('pid')->where('degree',$request['qualification'])->get()->toArray();
				
			}else{
				$edusearch=PersonalInformation::select('id')->get()->toArray();
			}
			$resumep = PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')
			// ->join('educationinformation','personalinformation.id', '=', 'educationinformation.pid')
			->where('personalinformation.country','LIKE','%'.$request['country'].'%')
			->where('personalinformation.fname', 'LIKE', '%'.$request['name'].'%')
			->where('personalinformation.inumber', 'LIKE', '%'.$request['passportNo'].'%')
			->where('personalinformation.age', 'LIKE', '%'.$request['age'].'%')
			->where('personalinformation.height', 'LIKE', '%'.$request['height'].'%')
			->where('experienceinformation.experience', 'LIKE', '%'.$request['experience'].'%')
			->whereIn('personalinformation.id',$skillsearch)
			->whereIn('personalinformation.id',$edusearch)
			->orderBy('personalinformation.id','desc')->paginate(20);

			return view('resume.index')->with('resumep',$resumep);
		}else if(Auth::user()->type==3 || Auth::user()->loginas==3)
		{
			if($request['skill'])
			{
				$skillsearch=SkillsInformation::select('pid')->where('skills',$request['skill'])->get()->toArray();
				
			}else{
				$skillsearch=PersonalInformation::select('id')->get()->toArray();
			}
			if($request['qualification'])
			{
				$edusearch=EducationalInformation::select('pid')->where('degree',$request['qualification'])->get()->toArray();
				
			}else{
				$edusearch=PersonalInformation::select('id')->get()->toArray();
			}
			$resumep = PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')
			// ->join('educationinformation','personalinformation.id', '=', 'educationinformation.pid')
			->where('personalinformation.country','LIKE','%'.$request['country'].'%')
			->where('personalinformation.fname', 'LIKE', '%'.$request['name'].'%')
			->where('personalinformation.inumber', 'LIKE', '%'.$request['passportNo'].'%')
			->where('personalinformation.age', 'LIKE', '%'.$request['age'].'%')
			->where('personalinformation.height', 'LIKE', '%'.$request['height'].'%')
			->where('experienceinformation.experience', 'LIKE', '%'.$request['experience'].'%')
			->whereIn('personalinformation.id',$skillsearch)
			->whereIn('personalinformation.id',$edusearch)
			->where('personalinformation.agent_id','=',Auth::user()->id)
			->orderBy('personalinformation.id','desc')->paginate(20);

			return view('resume.index')->with('resumep',$resumep);	
		}
		else{
			if($request['skill'])
			{
				$skillsearch=SkillsInformation::select('pid')->where('skills',$request['skill'])->get()->toArray();
				
			}else{
				$skillsearch=PersonalInformation::select('id')->get()->toArray();
			}
			if($request['qualification'])
			{
				$edusearch=EducationalInformation::select('pid')->where('degree',$request['qualification'])->get()->toArray();
				
			}else{
				$edusearch=PersonalInformation::select('id')->get()->toArray();
			}
			 // return $edusearch;
			$resumeSearch = PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')
			// ->join('educationinformation','personalinformation.id', '=', 'educationinformation.pid')
			->join('privacyinformation','personalinformation.id', '=', 'privacyinformation.pid')
			->where('privacyinformation.privacy','=',1)
			->where('personalinformation.country','LIKE','%'.$request['country'].'%')
			->where('personalinformation.fname', 'LIKE', '%'.$request['name'].'%')
			->where('personalinformation.inumber', 'LIKE', '%'.$request['passportNo'].'%')
			->where('personalinformation.age', 'LIKE', '%'.$request['age'].'%')
			->where('personalinformation.height', 'LIKE', '%'.$request['height'].'%')
			->where('experienceinformation.experience', 'LIKE', '%'.$request['experience'].'%')
			->whereIn('personalinformation.id',$skillsearch)
			->whereIn('personalinformation.id',$edusearch)
			->where(function ($cquery)
			{
				$cquery->where('personalinformation.approval_status','=',0)
				->orwhereIn('personalinformation.approved_by',[1,Auth::user()->id]);
			})			
			->orderBy('personalinformation.id','desc')->paginate(10);

			// $resumeSearch->setPath('resumeSearch');
			return view('employer.approval_index')->with('resump',$resumeSearch);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(Input::get('resume'))
		{
			$approveChecked = Input::get('resume');	


			if(Auth::user()->type==1 && Auth::user()->loginas==1)
			{
				$records = EmployerApproval::select('pid')
				->whereIn('apid',$approveChecked)
				->selectRaw('count(`pid`) as `occurences`')
				->from('employerapproval')
				->groupBy('pid')
				->having('occurences', '>', 1)
				->get();
				if(count($records)!=0)
				{
					Session::flash('message', 'You can not Approve more than one Employer for same Resume');
					return Redirect::to('approval');
				}else{


					foreach($approveChecked as $approve)
					{
						$rid=EmployerApproval::where('apid',$approve)->first();

						$update= DB::table('personalinformation')
						->where('id', $rid->pid)
						->update(['approval_status' =>1,'approved_by' => $rid->empid]);  
						
					}  
					$history = new History;
					$history->action_id = Auth::user()->id;
					$history->action = 'Resume Approved';
					$history->user = Auth::user()->name;
					$history->remark = 'Number of resume approved='.count($approveChecked);
					$history->save();   
					Session::flash('message', 'Resume Approved Successfully');
				 
				}    
			}else{
				foreach($approveChecked as $approve)
				{
					$prvcheck=EmployerApproval::wherePidAndEmpid($approve,Auth::user()->id)->first();

					if($prvcheck)
					{
						
					}
					else{
						$update= DB::table('personalinformation')
						->where('id', $approve)
						->update(['approved_by' =>1]);  
						$insert=new EmployerApproval;
						$insert->pid = $approve;
						$insert->empid = Auth::user()->id;
						$insert->save();    
						Session::flash('message', 'Resume Requested Successfully');
				 
					}
				}
				if($insert)   
				{
					$history = new History;
					$history->action_id = Auth::user()->id;;
					$history->action = 'Resume Requested';
					$history->user = Auth::user()->name;
					$history->remark = 'Number of resume requested='.count($approveChecked);
					$history->save();
				}
			}
			
		}
		return Redirect::to('approval');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$det=PersonalInformation::where('id',$id)->first();
		if($det)
		{
			$ag=Member::where('id',$det->agent_id)->first();
			$em=Member::where('id',$det->approved_by)->first();
			return view('resume.approvalDetail')->with('det',$det)->with('ag',$ag)->with('em',$em);
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
		/*return "hello";
		if(Auth::user()->type==1 && Auth::user()->loginas==1)
		{
			$update= DB::table('personalinformation')
			->where('id', $id)
			->update(['approval_status' =>1]);
			return Redirect::to('approval');
		}else{
			$update= DB::table('personalinformation')
			->where('id', $id)
			->update(['approved_by' =>1]);
			$insert=new EmployerApproval;
			$insert->pid = $id;
			$insert->empid = Auth::user()->id;
			$insert->save();   
			return Redirect::to('approval');
		}*/
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
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
            ->update(['approval_status' =>2]);//,'approved_by' =>Auth::user()->id]);
return Redirect::to('approval');
}


}
