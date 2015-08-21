<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Input;
use Redirect;
use File;
use Validator;
use App\PersonalInformation;
use App\EducationalInformation;
use App\WorkInformation;
use App\SkillsInformation;
use App\Language;
use App\AdditionalInformation;
use App\UploadInformation;
use App\PrivacyInformation;
use App\History;
// use Illuminate\Pagination\Paginator;
class ResumeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->type==3 || Auth::user()->loginas==3)
		{
			$resumep = PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')->where('personalinformation.agent_id',Auth::user()->id)->orderBy('personalinformation.id','desc')->paginate(10);	
		}
		/*else if(Auth::user()->type==2 || Auth::user()->loginas==2)
		{
			$resumep = PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')->whereIn('personalinformation.approved_by',[0,Auth::user()->id])->orderBy('personalinformation.id','desc')->paginate(10);	
		}*/
		else
		{
			$resumep = PersonalInformation::join('experienceinformation','personalinformation.id', '=', 'experienceinformation.pid')->orderBy('personalinformation.id','desc')->paginate(10);
		}
		$resumep->setPath('resumep');
		return view('resume.index')->with('resumep',$resumep);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('resume.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		$input=$request->input();		
		
		if($input['level'] == 1 ){

			/*$photo = array('resume_photo' => Input::file('resume_photo'),'passport' =>Input::file('passport'));
			$rules = array('resume_photo' => 'required');//mimes:jpeg,bmp,png|max:10000','passport' => 'required|mimes:jpeg,png,pdf,doc|max:10000'); //mimes:jpeg,bmp,png and for max size max:10000
  // doing the validation, passing post data, rules and the messages
$validator = Validator::make($photo, $rules);
if ($validator->fails()) {
    // send back to the page with the input data and errors
	return Redirect::to('resume.create')->withInput()->withErrors($validator);
}
else {*/
	if(Input::file('resume_photo'))
	{
		$resume_photo = array('file' => Input::file('resume_photo'),'extention' => Input::file('resume_photo')->getClientOriginalExtension());
		
		$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:jpeg,bmp,png');
		$validator = Validator::make($resume_photo, $rules);			
		
		if ($validator->fails()) {
   		 // send back to the page with the input data and errors
			// $validator->errors()->add('resume_photo', 'Invalide File');
			Session::flash('message', 'File must be less than 2Mb and only jpeg,bmp,png');
			return view('resume.create')->withErrors($validator)->with('id',$input['resumeId'])->with('state',($input['level']));
		}
		else {
			$destinationPath = 'upload';
			$photoExtension = Input::file('resume_photo')->getClientOriginalExtension();
			$photoName = rand(11111,99999).'_photo'.'.'.$photoExtension;
			Input::file('resume_photo')->move($destinationPath, $photoName);
		}
	}
	if(Input::file('passport'))
	{

		$passport = array('file' => Input::file('passport'),'extention' => Input::file('passport')->getClientOriginalExtension());
		
		$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:jpeg,bmp,png,pdf,doc,docx');
		$validator = Validator::make($passport, $rules);			
		
		if ($validator->fails()) {
   		 // send back to the page with the input data and errors
			// $validator->errors()->add('passport', 'File size must be less than 2MB and only .jpeg,.bmp,.png');
			Session::flash('message', 'File must be less than 2Mb and only jpeg,bmp,png,pdf,doc,docx');
			return view('resume.create')->withErrors($validator)->with('id',$input['resumeId'])->with('state',($input['level']));
		}
		else {
			$destinationPath = 'upload';
			$passportExtension = Input::file('passport')->getClientOriginalExtension();
			$passportName = rand(11111,99999).'_passport'.'.'.$passportExtension;	
			Input::file('passport')->move($destinationPath, $passportName);
		}
	}	
	
	$ret= PersonalInformation::where('id',$input['resumeId'])->first();
	if($ret)
	{

		$resume = PersonalInformation::find($input['resumeId']);
		$resume->fname = $input['fname'];
		$resume->lname = $input['lname'];
		$resume->resume_photo = isset($photoName)?$photoName:$ret->resume_photo;
		$resume->passport = isset($passportName)?$passportName:$ret->passport;	
		$resume->dob = $input['dob'];
		$resume->age = $input['age'];
		$resume->gender = $input['gender'];
		$resume->height = $input['height'];
		$resume->email = $input['email'];
		$resume->nationality = $input['nationality'];
		$resume->mobile = $input['mobile'];
		$resume->onumber = isset($input['onumber'])?$input['onumber']:'';
		$resume->raddress1 = $input['raddress1'];
		$resume->raddress2 = $input['raddress2'];
		$resume->city = isset($input['city'])?$input['city']:'';
		$resume->postal_code = $input['postal_code'];
		$resume->country = $input['country'];
		$resume->state = $input['state'];
		$resume->identification = $input['identification'];
		$resume->inumber = $input['inumber'];
		$resume->save();
		$rethistory= History::whereAction_idAndAction($resume->id,'Resume Updated')->first();

		if($rethistory)
		{
			$history = History::find($rethistory->id);
			$history->action = 'Resume Updated';
			$history->user = Auth::user()->name;
			$history->remark = '';
			$history->save();
		}else{
			$history = new History;
			$history->action_id = $resume->id;
			$history->action = 'Resume Updated';
			$history->user = Auth::user()->name;
			$history->remark = '';
			$history->save();
		}
	}else{
		$resume = new PersonalInformation;

		$resume->agent_id = Auth::user()->id;
		$resume->approval_status = 0;
		$resume->approved_by = 0;
		$resume->agent_approval_delete = 0;
		$resume->fname = $input['fname'];
		$resume->lname = $input['lname'];
		$resume->resume_photo = isset($photoName)?$photoName:'';
		$resume->passport = isset($passportName)?$passportName:'';	
		$resume->dob = $input['dob'];
		$resume->age = $input['age'];
		$resume->gender = $input['gender'];
		$resume->height = $input['height'];
		$resume->email = $input['email'];
		$resume->nationality = $input['nationality'];
		$resume->mobile = $input['mobile'];
		$resume->onumber = isset($input['onumber'])?$input['onumber']:'';
		$resume->raddress1 = $input['raddress1'];
		$resume->raddress2 = $input['raddress2'];
		$resume->city = isset($input['city'])?$input['city']:'';
		$resume->postal_code = $input['postal_code'];
		$resume->country = $input['country'];
		$resume->state = $input['state'];
		$resume->identification = $input['identification'];
		$resume->inumber = $input['inumber'];
		$resume->save();		
		$history = new History;
		$history->action_id = $resume->id;
		$history->action = 'Resume Created';
		$history->user = Auth::user()->name;
		$history->remark = '';
		$history->save();

	}
	return view('resume.create')->with('id',$resume->id)->with('state',($input['level'] + 1));
//}
}
if($input['level'] == 2 && $input['resumeId'] > 0){
	$eduChecked = Input::get('edu');

	if($eduChecked)
	{
		$edudel=EducationalInformation::where('pid',$input['resumeId'])->whereNotIn('degree',$eduChecked)->delete();
		foreach($eduChecked as $educationChecked)
		{
			if($educationChecked=='phd'){$prefe=1;}
			else if($educationChecked=='master'){$prefe=2;}
			else if($educationChecked=='bachelor'){$prefe=3;}
			else if($educationChecked=='intermediate'){$prefe=4;}
			else if($educationChecked=='slc'){$prefe=5;}
			else{$prefe=6;}
			$ret= EducationalInformation::wherePidAndDegree($input['resumeId'],$educationChecked)->first();
			if($ret)
			{
				$resume = EducationalInformation::find($ret['id']);
				$resume->pid = $input['resumeId'];
				$resume->degree = $educationChecked;
				$resume->preference = $prefe;
				$resume->major = $input['major_'.$educationChecked];
				$resume->gyear = $input['gradyear_'.$educationChecked];
				$resume->school = $input['school_'.$educationChecked];
				$resume->board = $input['board_'.$educationChecked];
				$resume->grade = $input['percentage_'.$educationChecked];
				$resume->resume_certificate ='';
				$resume->save();
			}
			else{
				$resume = new EducationalInformation;
				$resume->pid = $input['resumeId'];
				$resume->degree = $educationChecked;
				$resume->preference = $prefe;
				$resume->major = $input['major_'.$educationChecked];
				$resume->gyear = $input['gradyear_'.$educationChecked];
				$resume->school = $input['school_'.$educationChecked];
				$resume->board = $input['board_'.$educationChecked];
				$resume->grade = $input['percentage_'.$educationChecked];
				$resume->resume_certificate ='';
				$resume->save();
			}
		}
	}
	return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
//}
}
if($input['level'] == 3 && $input['resumeId'] > 0){

	if(Input::file('exp_certificate'))
	{
		$exp_certificate = array('file' => Input::file('exp_certificate'),'extention' => Input::file('exp_certificate')->getClientOriginalExtension());
		
		$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:jpeg,bmp,png,pdf,doc,docx');
		$validator = Validator::make($exp_certificate, $rules);			
		
		if ($validator->fails()) {
   		 // send back to the page with the input data and errors
			// $validator->errors()->add('passport', 'File size must be less than 2MB and only .jpeg,.bmp,.png');
			Session::flash('message', 'File must be less than 2Mb and only jpeg,bmp,png,pdf,doc,docx');
			return view('resume.create')->withErrors($validator)->with('id',$input['resumeId'])->with('state',($input['level']));
		}
		else {
			$exp_certificate = array('exp_certificate' => Input::file('exp_certificate'));
			$destinationPath = 'upload';
			$expCertificateExtension = Input::file('exp_certificate')->getClientOriginalExtension();
			$expCertificateName = rand(11111,99999).'_expcertificate'.'.'.$expCertificateExtension;
			Input::file('exp_certificate')->move($destinationPath, $expCertificateName);
		}
	}
	$ret= WorkInformation::where('pid',$input['resumeId'])->first();
	if($ret)
	{

		$resume = WorkInformation::where('pid',$input['resumeId'])
		->update(['pid' => $input['resumeId'],'position_title' => $input['position_title'],'company_name' => $input['company_name'],
			'from_date' => $input['from_date'],'to_date' => isset($input['wpresent'])?1:$input['to_date'],
			'experience' => $input['experience'],'specialization' => $input['specialization'],'role' => $input['role'],'country' => $input['country'],
			'industry' => isset($input['industry'])?$input['industry']:$ret->industry,'position_level' => isset($input['position_level'])?$input['position_level']:$ret->position_level,
			'currency' => isset($input['currency'])?$input['currency']:$ret->currency,'salary' => $input['salary'],
			'experience_certificate' => isset($expCertificateName)?$expCertificateName:$ret->experience_certificate]);
		
	}else{

		$resume = new WorkInformation;
		$resume->pid = $input['resumeId'];
		$resume->position_title = $input['position_title'];
		$resume->company_name = $input['company_name'];
		$resume->experience = $input['experience'];
		$resume->from_date = $input['from_date'];
		$resume->to_date = isset($input['wpresent'])?1:$input['to_date'];
		$resume->specialization = $input['specialization'];
		$resume->role = $input['role'];
		$resume->country = $input['country'];
		$resume->industry = isset($input['industry'])?$input['industry']:'';
		$resume->position_level = isset($input['position_level'])?$input['position_level']:'';
		$resume->currency = isset($input['currency'])?$input['currency']:'';
		$resume->salary = $input['salary'];
		$resume->experience_certificate = isset($expCertificateName)?$expCertificateName:'';
		$resume->save();
	}
	return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
}
if($input['level'] == 4 && $input['resumeId'] > 0){
	$t=$input['skillCount'];

	for($c=1;$c<=$t;$c++)
	{
		if(Input::file('skills_certificate_'.$c))
		{
			$skills_certificate = array('file' => Input::file('skills_certificate_'.$c),'extention' => Input::file('skills_certificate_'.$c)->getClientOriginalExtension());
			
			$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:jpeg,bmp,png,pdf,doc,docx');
			$validator = Validator::make($skills_certificate, $rules);			
			
			if ($validator->fails()) {
   		 // send back to the page with the input data and errors
			// $validator->errors()->add('passport', 'File size must be less than 2MB and only .jpeg,.bmp,.png');
				Session::flash('message', 'File must be less than 2Mb and only jpeg,bmp,png,pdf,doc,docx');
				return view('resume.create')->withErrors($validator)->with('id',$input['resumeId'])->with('state',($input['level']));
			}
			else {
				$skill_certificate = array('skills_certificate_'.$c => Input::file('skills_certificate_'.$c));
				$destinationPath = 'upload';
				$skillCertificateExtension = Input::file('skills_certificate_'.$c)->getClientOriginalExtension();
				$skillCertificateName = rand(11111,99999).'_skill_certificate'.'.'.$skillCertificateExtension;
				Input::file('skills_certificate_'.$c)->move($destinationPath, $skillCertificateName);
			}
		}else{
			$skillCertificateName = '';
		}
		$ret= SkillsInformation::wherePidAndSkills($input['resumeId'],$input["skill_".$c])->first();
		if($ret)
		{	
			$resume = SkillsInformation::find($ret->id);

		// $resume->skills = $input["skill_".$c];
			$resume->proficiency = $input["proficiency_".$c];
			if($skillCertificateName!='')
				$resume->skills_certificate = $skillCertificateName;
			$resume->save();
		}
		else{
			$resume = new SkillsInformation;
			$resume->pid = $input['resumeId'];
			$resume->skills = $input["skill_".$c];
			$resume->proficiency = $input["proficiency_".$c];
			$resume->skills_certificate = isset($skillCertificateName)?$skillCertificateName:'';
			$resume->save();
		}
	}
	
	return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
}
if($input['level'] == 5 && $input['resumeId'] > 0){
	//return $input;
	$t= $input['languageCount'];

	for($c=1;$c<=$t;$c++)
	{
		$ret= Language::wherePidAndLanguage($input['resumeId'],$input['language_'.$c])->first();
		if($ret)
		{	
			$resume = Language::find($ret->id);
			$resume->lspoken = $input['lspoken_'.$c];
			$resume->lwritten =$input['lwritten_'.$c];
			$resume->save();
		}else{
			$resume = new Language;
			$resume->pid = $input['resumeId'];
			$resume->language =$input['language_'.$c];
			$resume->lspoken = $input['lspoken_'.$c];
			$resume->lwritten =$input['lwritten_'.$c];
			$resume->save();
		}
	}
	return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
}
if($input['level'] == 6 && $input['resumeId'] > 0){
	if(Input::file('sdocument'))
	{
		$sdocument = array('file' => Input::file('sdocument'),'extention' => Input::file('sdocument')->getClientOriginalExtension());
		
		$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:jpeg,bmp,png,pdf,doc,docx');
		$validator = Validator::make($sdocument, $rules);			
		
		if ($validator->fails()) {
   		 // send back to the page with the input data and errors
			// $validator->errors()->add('passport', 'File size must be less than 2MB and only .jpeg,.bmp,.png');
			Session::flash('message', 'File must be less than 2Mb and only jpeg,bmp,png,pdf,doc,docx');
			return view('resume.create')->withErrors($validator)->with('id',$input['resumeId'])->with('state',($input['level']));
		}
		else {
			$sdocument = array('sdocument' => Input::file('sdocument'));
			$destinationPath = 'upload';
			$sdocumentExtension = Input::file('sdocument')->getClientOriginalExtension();
			$sdocumentName = rand(11111,99999).'_sdocument'.'.'.$sdocumentExtension;
			Input::file('sdocument')->move($destinationPath, $sdocumentName);
		}
	}
	$ret= AdditionalInformation::where('pid',$input['resumeId'])->first();
	if($ret)
	{
		$resume = AdditionalInformation::find($ret->id);
		$resume->sdocument = isset($sdocumentName)?$sdocumentName:$ret->sdocument;
	}
	else{
		$resume = new AdditionalInformation;
		$resume->sdocument = isset($sdocumentName)?$sdocumentName:'';
	}
	$resume->pid = $input['resumeId'];
	$resume->currency = $input['currency'];
	$resume->salary = $input['salary'];
	$resume->preferred_location = $input['prefered_location'];
	$resume->add_information = $input['add_information'];
	
	$resume->save();
	return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
}
if($input['level'] == 7 && $input['resumeId'] > 0){
	if(Input::file('uresume'))
	{
		$uresume = array('file' => Input::file('uresume'),'extention' => Input::file('uresume')->getClientOriginalExtension());
		
		$rules = array('file' => 'required|max:2048', 'extention' => 'required|In:pdf,doc,docx');
		$validator = Validator::make($uresume, $rules);			
		
		if ($validator->fails()) {
   		 // send back to the page with the input data and errors
			$validator->errors()->add('uresume', 'File size must be less than 2MB and only .pdf,.doc,.docx');
			return view('resume.create')->withErrors($validator)->with('id',$input['resumeId'])->with('state',($input['level']));
		}
		else {
			$uresume = array('uresume' => Input::file('uresume'));
			$destinationPath = 'upload';
			$uresumeExtension = Input::file('uresume')->getClientOriginalExtension();
			$uresumeName = rand(11111,99999).'_CV'.'.'.$uresumeExtension;
			Input::file('uresume')->move($destinationPath, $uresumeName);
		}
	}
	$ret= UploadInformation::where('pid',$input['resumeId'])->first();
	if($ret)
	{
		$resume = UploadInformation::find($ret->id);
		$resume->uresume = isset($uresumeName)?$uresumeName:$ret->uresume;
	}
	else{
		$resume = new UploadInformation;
		$resume->uresume = isset($uresumeName)?$uresumeName:'';
	}
	$resume->pid = $input['resumeId'];
	
	$resume->save();
	return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
}
if($input['level'] == 8 && $input['resumeId'] > 0){
	$ret= PrivacyInformation::where('pid',$input['resumeId'])->first();
	if($ret)
	{
		$resume = PrivacyInformation::find($ret->id);
	}
	else{
		$resume = new PrivacyInformation;
	}
	$resume->pid = $input['resumeId'];
	$resume->privacy = $input['privacy'];
	$resume->save();
	Session::flash('message', 'Resume has been created Successfully');
	return Redirect::to('resume');

	// return view('resume.create')->with('id',$input['resumeId'])->with('state',($input['level'] + 1));
		 	//$resume->
}
// if($input['level'] == 9) {

	// return Redirect::to('resume');
// }
Session::flash('message', 'Please Fill up Personal Information First!!');
return view('resume.create')->with('id',0)->with('state',1);
}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//return $id;
		$personal = PersonalInformation::where('id',$id)->first();
		// $education = EducationalInformation::where('pid',$personal->id)->first();
		/*education*/
		$phd1= DB::table('educationinformation')->where('pid',$id)->where('degree','phd')->first();
		$master1= DB::table('educationinformation')->where('pid',$id)->where('degree','master')->first();
		$bachelor1= DB::table('educationinformation')->where('pid',$id)->where('degree','bachelor')->first();
		$intermediate1= DB::table('educationinformation')->where('pid',$id)->where('degree','intermediate')->first();
		$slc1= DB::table('educationinformation')->where('pid',$id)->where('degree','slc')->first();
		$other1= DB::table('educationinformation')->where('pid',$id)->where('degree','other')->first();
		
		/*education*/
		$experience = WorkInformation::where('pid',$personal->id)->first();
		$skills = SkillsInformation::where('pid',$personal->id)->get();
		$additional = AdditionalInformation::where('pid',$personal->id)->first();
		$language = Language::where('pid',$personal->id)->get();
		$upload = UploadInformation::where('pid',$personal->id)->first();
		$privacy = PrivacyInformation::where('pid',$personal->id)->first();
		return view('resume')->with('personal',$personal)
		->with('phd',$phd1)
		->with('master',$master1)
		->with('bachelor',$bachelor1)
		->with('intermediate',$intermediate1)
		->with('slc',$slc1)
		->with('other',$other1)
		->with('experience',$experience)->with('skills',$skills)
		->with('additional',$additional)->with('language',$language)
		->with('upload',$upload);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('resume.create')->with('id',$id);
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
		if($id!=0)	
		{		
			$resumdel1 = PersonalInformation::where('id',$id)->delete();
			$resumdel2 = EducationalInformation::where('pid',$id)->delete();
			$resumdel3 = WorkInformation::where('pid',$id)->delete();
			$resumdel4 = Language::where('pid',$id)->delete();
			$resumdel5 = SkillsInformation::where('pid',$id)->delete();
			$resumdel = AdditionalInformation::where('pid',$id)->delete();
			$resumdel = UploadInformation::where('pid',$id)->delete();
			$resumdel = PrivacyInformation::where('pid',$id)->delete();
		}else{
			$deleteChecked = Input::get('resume');	
			if($deleteChecked)
			{		
				foreach($deleteChecked as $delete)
				{
					$resumdel1 = PersonalInformation::where('id',$delete)->delete();
					$resumdel2 = EducationalInformation::where('pid',$delete)->delete();
					$resumdel3 = WorkInformation::where('pid',$delete)->delete();
					$resumdel4 = Language::where('pid',$delete)->delete();
					$resumdel5 = SkillsInformation::where('pid',$delete)->delete();
					$resumdel = AdditionalInformation::where('pid',$delete)->delete();
					$resumdel = UploadInformation::where('pid',$delete)->delete();
					$resumdel = PrivacyInformation::where('pid',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
				$history = new History;
				$history->action_id = 0;
				$history->action = 'Resume deleted';
				$history->user = Auth::user()->name;
				$history->remark = 'Number of Resume deleted='.count($deleteChecked);
				$history->save();	
			}else{
				Session::flash('nrmessage','Resume are not Selected');
			}
		}
		
		return Redirect::to('resume');
	}
	public function view()
	{
		return view('resume');
	}

}