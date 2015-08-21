<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color:#FFFFFF;
	margin-left: 0px;
	margin-top: 10px;
	margin-right: 0px;
	margin-bottom: 10px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
.BDJApplicantsName {
	background:#ffffff;
	font-size:18px;
	font-weight:bold;
	color:#333399;
	padding-left:7px;
	padding-top:16px;
	padding-bottom:3.5px;
}
.BDJHeadline01 {
	background:#E6E6E6;
	font-size:12px;
	font-weight:bold;
	padding-left:2px;
	padding-top:2px;
	padding-bottom:2px;
}
.BDJBoldText01 {
	background:#FFFFFF;
	font-size:11px;
	font-weight:bold;
	padding-left:2px;
	padding-top:2px;
	padding-bottom:2px;
}
.BDJNormalText01 {
	background:#FFFFFF;
	font-size:11px;
	font-weight:normal;
	padding-left:2px;
	padding-top:7px;
	padding-bottom:10px;
}
.BDJNormalText02 {
	background:#FFFFFF;
	font-size:11px;
	font-weight:normal;
	padding-left:2px;
	padding-top:2px;
	padding-bottom:2px;
}
.BDJNormalText03 {
	background:#FFFFFF;
	font-size:11px;
	font-weight:normal;
	padding-left:7px;
	padding-top:2px;
	padding-bottom:2px;
}
.BDJNormalText04 {
	background:#FFFFFF;
	font-size:9px;
	font-weight:normal;
	padding-left:7px;
	padding-top:2px;
	padding-bottom:2px;
}
.BDJCopyRight {
	background:#FFFFFF;
	font-size:9px;
	font-weight:normal;
	padding-left:7px;
	padding-top:2px;
	padding-bottom:2px;
	color:#000066;
}
#container {
	border:#999 3px solid;
}
</style>
<title>Recruitment Agency CMS| Preview your Resume</title>
</head>
<body>

  <table style="width: 100%; text-align: left; border: none">
  <tbody><tr>
    <td height="93" valign="bottom" class="BDJApplicantsName" style="width: 75%; text-align: left; border: none">{{$personal->fname}} {{$personal->lname}}</td>
    <td rowspan="2" valign="bottom" style="width: 25%; text-align: left;">      <table align="center" bgcolor="#dadce1" border="0" cellpadding="0" cellspacing="7" height="140" width="140">
        <tbody><tr>
          <td align="center" bgcolor="#e2e4e5" height="135" valign="middle" width="126"><img src="{{url()}}/upload/{{$personal->resume_photo}}" width="124" alt="Picture"></td>
        </tr>
      </tbody></table>
      </td>
  </tr>
  <tr>
    <td class="BDJNormalText04" align="left" valign="middle" style="width: 100%; text-align: left;"> Address: {{$personal->raddress1}}, {{$personal->city}}, {{$personal->country}}     <br>Mobile: {{$personal->mobile}}<br>Email Address: {{$personal->email}}</td>
  </tr>
</tbody></table>
<table style="width: 100%; text-align: left; border: none">
  <tbody><tr>
    <td style="border-bottom: 1px solid rgb(0, 0, 0); width: 100%; text-align: left;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="BDJHeadline01" width="100%"><u>Career Objective:</u></td>
  </tr>
  <tr width="100%">
    <td style="padding-left: 5px;" class="BDJNormalText01" width="100%">{{@$additional->add_information}}</td>
  </tr>
  <!--<tr>-->
    <!--<td class="BDJHeadline01" width="100%"><u>Special Qualification:</u></td>-->
  <!--</tr>-->
  <tr>
    <td style="padding-left: 5px;" class="BDJNormalText01" width="100%"></td>
  </tr>
</tbody></table>
<table style="width: 100%; text-align: left;">
  <tbody><tr>
    <td colspan="2" class="BDJHeadline01" style="width: 100%; text-align: left;"><u>Employment History:</u></td>
  </tr>
  <!--<tr>-->
    <!--<td colspan="2" class="BDJNormalText01" style="width: 100%; text-align: left;"><strong>Total Year of Experience: </strong>1 Years  6 Month(s)</td>-->
  <!--</tr>-->
    <tr>
    <td class="BDJBoldText01" valign="top" style="padding-left: 5px; width: 5%; text-align: center;">1.</td>
    <td class="BDJBoldText01" style="width: 95%; text-align: left; "><u>{{{isset($experience->position_title)?$experience->position_title:''}}} (<u>{{{isset($experience->from_date)?$experience->from_date:''}}}</u>-{{{isset($experience->to_date)?($experience->to_date==1)?"present":$experience->to_date:''}}}</u>)<br>
    <strong><br>
    {{{isset($experience->company_name)?$experience->company_name:''}}}</strong>
    </td>
  </tr>
  <tr>
    <td class="BDJHeadline02" style="padding-left: 5px; width: 5%; text-align: center;">&nbsp;</td>
    <td class="BDJNormalText01" style="padding-left: 5px; width: 95%; text-align: left; text-align:justify"><strong><i>Duties/Responsibilities:</i></strong> <br>
      {{{isset($experience->role)?$experience->role:''}}}</td>
  </tr>
  
    <input name="exp_count" type="hidden" value="2">
</tbody></table>



<table style="width: 100%; text-align: left; border: none">
  <tbody><tr>
    <td colspan="6" class="BDJHeadline01" style="width: 100%; text-align: left; border: none"><u>Education/Trainings</u></td>
  </tr>
  <tr>
    <td>      <table style="width: 100%; text-align: left; border: none">
        <tbody><tr class="BDJNormalText01">
          <td height="20" colspan="6" style="width: 100%; text-align: left;"><strong>Academic Qualification:</strong></td>
        </tr>
        <tr class="BDJHeadline01">
          <td width="17%" height="20" nowrap="" style="padding-left:6px; ">Degree</td>
          <td width="12%" nowrap="" style="padding-left:7px; ">Major</td>
          <td width="15%" nowrap="" style="padding-left:5px; ">Graduation Year</td>
          <td width="20%" nowrap="" style="padding-left:5px; ">College/School</td>
          <td width="20%" nowrap="" style="padding-left:7px; ">Board/University</td>
          <td width="16%" nowrap="" style="padding-left:5px; ">Percentage/CGPA</td>
        </tr>
            @if(@$phd)
         <tr class="BDJNormalText01">
          <td width="17%" height="32" style="padding-left:6px; ">Ph. D.</td>
          <td width="12%" style="padding-left:7px; ">{{@$phd->major}}</td>
          <td width="15%" style="padding-left:5px; ">{{@$phd->gyear}}</td>
          <td width="20%" style="padding-left:5px; ">{{@$phd->school}}</td>
          <td width="20%" style="padding-left:7px; ">{{@$phd->board}}</td>
          <td width="16%" style="padding-left:5px; ">{{@$phd->grade}}</td>
        </tr>
            @endif
            @if(@$master)
         <tr class="BDJNormalText01">
          <td width="17%" height="32" style="padding-left:6px; ">Master's</td>
          <td width="12%" style="padding-left:7px; ">{{@$master->major}}</td>
          <td width="15%" style="padding-left:5px; ">{{@$master->gyear}}</td>
          <td width="20%" style="padding-left:5px; ">{{@$master->school}}</td>
          <td width="20%" style="padding-left:7px; ">{{@$master->board}}</td>
          <td width="16%" style="padding-left:5px; ">{{@$master->grade}}</td>
        </tr>
            @endif
            @if(@$bachelor)
         <tr class="BDJNormalText01">
          <td width="17%" height="32" style="padding-left:6px; ">Bachelor's's</td>
          <td width="12%" style="padding-left:7px; ">{{@$bachelor->major}}</td>
          <td width="15%" style="padding-left:5px; ">{{@$bachelor->gyear}}</td>
          <td width="20%" style="padding-left:5px; ">{{@$bachelor->school}}</td>
          <td width="20%" style="padding-left:7px; ">{{@$bachelor->board}}</td>
          <td width="16%" style="padding-left:5px; ">{{@$bachelor->grade}}</td>
        </tr>
            @endif
            @if(@$intermediate)
         <tr class="BDJNormalText01">
          <td width="17%" height="32" style="padding-left:6px; ">Intermediate</td>
          <td width="12%" style="padding-left:7px; ">{{@$intermediate->major}}</td>
          <td width="15%" style="padding-left:5px; ">{{@$intermediate->gyear}}</td>
          <td width="20%" style="padding-left:5px; ">{{@$intermediate->school}}</td>
          <td width="20%" style="padding-left:7px; ">{{@$intermediate->board}}</td>
          <td width="16%" style="padding-left:5px; ">{{@$intermediate->grade}}</td>
        </tr>
            @endif
            @if(@$slc)
         <tr class="BDJNormalText01">
          <td width="17%" height="32" style="padding-left:6px; ">S.L.C. (10th)</td>
          <td width="12%" style="padding-left:7px; ">{{@$slc->major}}</td>
          <td width="15%" style="padding-left:5px; ">{{@$slc->gyear}}</td>
          <td width="20%" style="padding-left:5px; ">{{@$slc->school}}</td>
          <td width="20%" style="padding-left:7px; ">{{@$slc->board}}</td>
          <td width="16%" style="padding-left:5px; ">{{@$slc->grade}}</td>
        </tr>
            @endif
             @if(@$other)
         <tr class="BDJNormalText01">
          <td width="17%" height="32" style="padding-left:6px; ">Other</td>
          <td width="12%" style="padding-left:7px; ">{{@$other->major}}</td>
          <td width="15%" style="padding-left:5px; ">{{@$other->gyear}}</td>
          <td width="20%" style="padding-left:5px; ">{{@$other->school}}</td>
          <td width="20%" style="padding-left:7px; ">{{@$other->board}}</td>
          <td width="16%" style="padding-left:5px; ">{{@$other->grade}}</td>
        </tr>
            @endif
                      
                                <tr>
          <td colspan="6">&nbsp;</td>
        </tr>
      </tbody></table>
                  <table style="width: 100%; text-align: left; border: none">
        <tbody><tr class="BDJNormalText01">
          <td height="20" colspan="4" style="width: 100%; text-align: left;"><strong>Trainings</strong></td>
        </tr>
        <tr class="BDJHeadline01">
          <td width="30%" height="20" style="padding-left:5px; ">Topic</td>
          <!--<td width="30%" style="padding-left:5px; ">Objective</td>-->
          <!--<td width="30%" style="padding-left:5px; ">Place/Institution </td>-->
          <td width="10%" style="padding-left:5px; ">Proficiency</td>
        </tr>
            @foreach($skills as $skill)
                <tr class="BDJNormalText01">
          <td width="30%" height="32" style="padding-left:5px; ">{{@$skill->skills}}</td>
          <!--<td width="30%" style="padding-left:5px; "></td>-->
          <!--<td width="30%" style="padding-left:5px; "></td>-->
          <td width="10%" style="padding-left:5px; ">{{@$skill->proficiency}}</td>
        </tr>
            @endforeach
                
              </tbody></table>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</tbody></table>



<table style="width: 100%; text-align: left; border: none">
  <tbody><tr>
    <td class="BDJHeadline01" style="width: 100%; text-align: left;"><u>Career and Application Information:</u></td>
  </tr>
  <tr>
    <td colspan="6" class="BDJNormalText01" align="left"><table style="width: 100%; text-align: left; border: none">
        <!--Looking For:-->
        <tbody>
            
                <tr class="BDJNormalText03">
          <td style="padding-left: 5px;" align="left" width="32%">Expected Salary</td>
          <td align="center" width="2%">:</td>
          <td align="left" width="66%">{{{isset($additional->currency)?$additional->currency:''}}} {{@$additional->salary}}</td>
        </tr>
                
        <tr class="BDJNormalText03">
          <td style="padding-left: 5px;" align="left" width="32%">Preferred Job Location</td>
          <td align="center" width="2%">:</td>
          <td align="left" width="66%">{{@$additional->preferred_location}}</td>
        </tr>
      </tbody></table></td>
  </tr>
</tbody></table>




<table style="width: 100%; text-align: left; border: none">
  <tbody><tr>
    <td colspan="4" class="BDJHeadline01" style="width: 100%; text-align: left;"><u>Language Proficiency:</u></td>
  </tr>

      <tr>
    <td><table style="width: 100%; text-align: left; border: none">
        <tbody><tr>
          <td><table style="width: 100%; text-align: left;">
              <tbody>
                  <tr class="BDJHeadline01">
                <td class="header" style=" width:25%; padding-left:5px">Language</td>
                <!--<td class="header" style=" width:25%; padding-left:5px">Reading</td>-->
                <td class="header" style=" width:25%; padding-left:5px">Writing</td>
                <td class="header" style=" width:25%; padding-left:5px">Speaking</td>
              </tr>
                  @foreach($language as $lan)
                            <tr class="BDJNormalText01">
                <td style=" width:25%; padding-left:5px" height="25">{{@$lan->language}}</td>
                <!--<td style=" width:25%; padding-left:5px">Excellent</td>-->
                <td style=" width:25%; padding-left:5px">{{@$lan->lwritten}}&nbsp;</td>
                <td style=" width:25%; padding-left:5px">{{@$lan->lspoken}}&nbsp;</td>
              </tr>
                  @endforeach
                           
                          </tbody></table></td>
        </tr>
      </tbody></table></td>
  </tr>
  </tbody></table>




  <table style="width: 100%; text-align: left; border: none">
    <tbody><tr>
      <td class="BDJHeadline01" style="width: 100%; text-align: left;"><u>Personal Details :</u></td>
    </tr>
    <tr>
      <td class="BDJNormalText01"><table style="width: 100%; text-align: left;">
          <tbody><tr class="BDJNormalText03">
            <td style="padding-left: 5px;" align="left" width="22%">Date  of Birth</td>
            <td align="center" width="2%">:</td>
            <td align="left" width="76%">{{@$personal->dob}}</td>
          </tr>
          <tr class="BDJNormalText03">
            <td style="padding-left: 5px;" align="left" width="22%">Gender</td>
            <td align="center" width="2%">:</td>
            <td align="left" width="76%">{{@$personal->gender}}</td>
          </tr>
          
          <tr class="BDJNormalText03">
            <td style="padding-left: 5px;" align="left">Nationality</td>
            <td align="center">:</td>
            <td align="left">{{@$personal->nationality}}</td>
          </tr>
                  
                          <tr class="BDJNormalText03">
            <td style="padding-left: 5px;" align="left">Present Address</td>
            <td align="center">:</td>
            <td align="left">{{@$personal->raddress1}}, {{@$personal->city}}, {{@$personal->country}}</td>
          </tr>
                          <tr class="BDJNormalText03">
            <td style="padding-left: 5px;" align="left">Permanent Address</td>
            <td align="center">:</td>
            <td align="left">{{@$personal->raddress2}}</td>
          </tr>
                </tbody></table></td>
    </tr>
  </tbody></table>
  
      <!--
  <table style="width: 100%; text-align: left; border: none">
    <tbody><tr>
      <td colspan="6" class="BDJHeadline01" style="width: 100%; text-align: left;"><u>Reference (s):</u></td>
    </tr>
      <tr>
      <td><table style="width: 100%; text-align: left; border: none">
              <tbody><tr>
                <td valign="top" style="width: 50%; text-align: left; ">                <table style="width: 100%; text-align: left; border: none">
                    <tbody><tr>
                      <td height="20" colspan="2" class="BDJNormalText03"><strong>Reference#1</strong></td>
                    </tr>
                    <tr class="BDJNormalText03">
                      <td width="40%" style="padding-left:10px;" height="18">Name</td>
                      <td width="40%">Mr. &nbsp;</td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Address</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Mobile</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Email</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Company Name</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Company Location</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Designation</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Relationship</td>
                      <td></td>
                    </tr>
                                      <tr>
                      <td height="10" colspan="4">&nbsp;</td>
                    </tr>
                  </tbody></table>
                  </td>
                <td valign="top" style="width: 50%; text-align: left; ">
                  <table width="100%" border="0" cellpadding="2" cellspacing="0" style="padding-left:3px; padding-right:3px;">
                    <tbody><tr>
                      <td height="20" colspan="2" class="BDJNormalText03"><strong>Reference#2</strong></td>
                    </tr>
                    <tr class="BDJNormalText03">
                      <td width="40%" height="18" style="padding-left:10px;">Name</td>
                      <td width="40%">Mr. &nbsp;</td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Address</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Mobile</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Email</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Company Name</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Company Location</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Designation</td>
                      <td></td>
                    </tr>
                                      <tr class="BDJNormalText03">
                      <td height="18" style="padding-left:10px;">Relationship</td>
                      <td></td>
                    </tr>
                                      <tr>
                      <td height="10" colspan="4">&nbsp;</td>
                    </tr>
                  </tbody></table>
                                </td>
          </tr>
            </tbody></table> --></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    </tbody></table>

</body></html>