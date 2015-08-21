@extends('index')

@section('content')
<div id="page-wrapper">
    
    
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Job Seekers</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            @if(Auth::user()->type==2 || (Auth::user()->type==1 && Auth::user()->loginas!=3))
                            List of Resume
                            @else

                            <a href="{{url()}}/resume/create"><button  class="btn btn-primary">Add New</button></a>
                             @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                             @if (Session::has('nrmessage'))
                            <div class="alert alert-danger">{{ Session::get('nrmessage') }}</div>
                            @endif
                            @endif
                            </div>
               
                            <!-----------search code------>
                             {!! Form::open(array('route' => 'approval.create', 'id' => 'sign_up','class' => '','method'=> 'POST')) !!}
                <div class="form-group">
                   <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Country</label>
                          <div class="col-xs-12">                                    
                              <select class="form-control" name="country" id="country">
                                  <option selected disabled value="">Select </option>
                                  <option value="Nepal" >Nepal</option>
                                  <option value="USA">USA</option>
                                  <option value="Malaysia">Malaysia</option>
                                  <option value="Maldives">Maldives</option>
                                  
                              </select>
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Age</label>
                          <div class="col-xs-12">                                    
                               <input class="form-control"  name="age" type="number" pattern="[0-9]*" min="0" maxlength="3"  placeholder="Age">
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Height</label>
                          <div class="col-xs-12">                                    
                               <input class="form-control"  name="height" type="number" pattern="[0-9]*" min="0"  placeholder="Height(ft.)">
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Education</label>
                          <div class="col-xs-12">                                    
                              <select class="form-control" name="qualification" id="qualification" >
	                             <option selected disabled value="">- Select Qualification -</option>
	                             <option value="slc" title="Primary/Secondary School/'O' Level">Primary/Secondary School/'O' Level</option>
	                             <option value="intermediate" title="Higher Secondary/Pre-U/'A' Level">Higher Secondary/Pre-U/'A' Level</option>
	                             <option value="intermediate" title="Diploma">Diploma</option>
	                             <option value="bachelor" title="Advanced/Higher/Graduate Diploma">Advanced/Higher/Graduate Diploma</option>
	                             <option value="bachelor" title="Bachelor's Degree">Bachelor's Degree</option>
	                             <option value="other" title="Professional Degree">Professional Degree</option>
	                             <option value="master" title="Master's Degree">Master's Degree</option>
	                             <option value="phd" title="Doctorate  (PhD)">Doctorate  (PhD)</option>
	                         </select>
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob">Skill and Training</label>
                                                              
                              <div class="col-xs-12">                                    
                               <input class="form-control"  name="skill" type="text"   placeholder="skill">
                          	</div>
                          
                       		
                     	</div>
                 	</div>
                     <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Experience</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control"  name="experience" type="number" pattern="[0-9]*" min="0"  placeholder="experience(year)">
                          </div>
                          
                       </div>
                     </div>
                     <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Name</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control" name="name" type="text" placeholder="Name" >
                           </div>
                          
                       </div>
                     </div>
                     <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Identification No.</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control" name="passportNo" type="text" placeholder="Identification No.">
                           </div>
                          
                       </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-6 parent-box ">
	                      <div class="row">
	                           <div class="col-xs-12">
	                               <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
	        						<input type="submit" class="btn btn-success btn-md"  value="Filter">
	     						</div>
	                      </div>
                     </div>
                 </div>
                    {!! Form::close() !!}
                            
                             <!-----------search code------>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		
                                    		</div>
                                    		</div>
                                    		<div class="row"><div class="col-sm-12">
                                         {!! Form::open(['route' => 'resume.destroy','method' => 'DELETE', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}    
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th width='4%'></th>
                                            	<th width='16%'>Employee Name</th>
                                            	<th width='40%'>Employee Address</th>
                                                <th width='10%'>Experience</th>
                                            	<th width='15%'>Attachment</th>
                                            	<th width='15%'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!--  -->
                                        @if(isset($resumep))
                                         @foreach($resumep as $resum)
                                         <?php // $pid= $resum->id;
//                                         $work = DB::table('experienceinformation')->where('pid',$pid)->first();
//                                         $edu = DB::table('educationinformation')->where('pid',$pid)->first();
                                              
                                         ?>
                                         <tr class="gradeA odd" role="row">
                                             <td> {!! Form::checkbox('resume[]',$resum->id)!!}</td>
                                                <td class="sorting_1">{{$resum->fname}} {{$resum->lname}}</td>
                                                <td>{{$resum->raddress1}},{{$resum->country}},{{$resum->mobile}},{{$resum->email}}</td>
                                                
                                                <td>{{{isset($resum->from_date)?$resum->from_date:''}}}-{{{isset($resum->to_date)?($resum->to_date==1)?"present":$resum->to_date:''}}}</td>
                                                <td>
                                                    <ul>
                                                         <?php 
                                                             $cv=DB::table('uploadinformation')->where('pid',$resum->id)->first();
                                                             $skil=DB::table('skillsinformation')->where('pid',$resum->id)->get();
                                                             $other=DB::table('additionalinformation')->where('pid',$resum->id)->first();
                                                            ?>
                                                        @if(@$cv->uresume!='')
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$cv->uresume;?>
                                                            <a href="{{url()}}/upload/{{@$cv->uresume}}">CV</a>
                                                        </li>
                                                        @endif
                                                        @if(@$resum->passport!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$resum->passport;?>
                                                            <a href="{{url()}}/upload/{{@$resum->passport}}">Passport</a>
                                                        </li>
                                                        @endif
                                                        @if(@$resum->resume_certificate!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$resum->resume_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$resum->resume_certificate}}">Certificate</a>
                                                        </li>
                                                        @endif
                                                         @if(@$resum->experience_certificate!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$resum->experience_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$resum->experience_certificate}}">Exp_Certificate</a>
                                                        </li>
                                                        @endif
                                                        @foreach($skil as $sk)
                                                         @if(@$sk->skills_certificate!='')
                                                         <?php $i=1; ?>
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$sk->skills_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$sk->skills_certificate}}"><?php echo "Skill_".$i; $i++;?></a>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                        @if(@$other->sdocument!='')
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$other->sdocument;?>
                                                            <a href="{{url()}}/upload/{{@$other->sdocument}}">other</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="#"><button class="btn-xs btn-warning" onclick="window.open('{{url()}}/resume/{{$resum->id}}','newWin','width=800,height=600')">View Resume</button></a>                        
                                               <!-- <a href=""><button type="button" class="btn-xs btn-danger">Expert</button></a> -->
                                                @if(Auth::user()->type==3||(Auth::user()->type==1 && Auth::user()->loginas!=2))
                                                <a href="{{url()}}/resume/{{{$resum->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-danger">Edit</button></a>
                                                 
                                               <!--{!! Form::open(['method' => 'DELETE','route' => ['resume.destroy',$resum->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger']) !!}
                                                     {!! Form::close() !!}-->
                                                @endif 
                                               @if($resum->approved_by!=0 && $resum->approval_status!=1)
                                                <a href=""><button type="button" class="btn-xs btn-primary">Requested</button></a>
                                           
                                                @elseif($resum->approved_by!=0 && $resum->approval_status==1)
                                                <a href="{{url()}}/approval/{{{$resum->id}}}"><button type="button" class="btn-xs btn-success">Approved</button></a>
                                                @else
                                                <!--<a href=""><button type="button" class="btn-xs btn-primary">Request</button></a>-->
                                                @endif 
                                                
                                              
                                                </td>
                                                <!-- <td class="center"><a href=""><button type="button" class="btn-xs btn-primary">export</button></a> <a href=""><button type="button" class="btn-xs btn-warning">edit</button></a> <a href=""><button type="button" class="btn-xs btn-danger">delete</button></a></td> -->
                                            </tr>
                                            @endforeach
                                            <?php echo $resumep->render(); ?>
                                            @else
                                            <tr>
                                                <td colspan="7"> Searched not found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                               
                                   {!! Form::close() !!}
                                    </div>
                                    </div>
                                    <!-- <div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing 1 to 50 of 57 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li></ul></div></div>
                                    </div> -->
                                    </div>
                                </div>
                                <!-- /.table-responsive -->
                             
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
</div>
@endsection
