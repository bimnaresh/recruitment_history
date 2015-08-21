@extends('index')

@section('content')
<div id="page-wrapper">
    

    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Resume List122</h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
	                             <option value="Primary/Secondary School/'O' Level" title="Primary/Secondary School/'O' Level">Primary/Secondary School/'O' Level</option>
	                             <option value="Higher Secondary/Pre-U/'A' Level" title="Higher Secondary/Pre-U/'A' Level">Higher Secondary/Pre-U/'A' Level</option>
	                             <option value="Professional Certificate" title="Professional Certificate">Professional Certificate</option>
	                             <option value="Diploma" title="Diploma">Diploma</option>
	                             <option value="Advanced/Higher/Graduate Diploma" title="Advanced/Higher/Graduate Diploma">Advanced/Higher/Graduate Diploma</option>
	                             <option value="Bachelor's Degree" title="Bachelor's Degree">Bachelor's Degree</option>
	                             <option value="Post Graduate Diploma" title="Post Graduate Diploma">Post Graduate Diploma</option>
	                             <option value="Professional Degree" title="Professional Degree">Professional Degree</option>
	                             <option value="Master's Degree" title="Master's Degree">Master's Degree</option>
	                             <option value="Doctorate  (PhD)" title="Doctorate  (PhD)">Doctorate  (PhD)</option>
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
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Password No.</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control" name="passwordNo" type="text" placeholder="Passwor No.">
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
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		
                                    		</div>
                                    		</div>
                                    		<div class="row"><div class="col-sm-12">
                                                        {!! Form::open(['route' => 'approval.store', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                         {!! Form::submit('Request', ['class' => 'btn btn-primary']) !!}               
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th tabindex="1"></th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 217px;">Employee Name</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262px;">Work Experience</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Qualification</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 200px;">Contact Number</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Address</th>
                                                <th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Action</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($resumeSearch))
                                            
                                       @foreach($resumeSearch as $deman)
                                       <?php 
                                       $empapp=DB::table('employerapproval')->where('pid',$deman->id)->where('empid',Auth::user()->id)->first();
                                       ?>
                                      <tr class="gradeA odd" role="row">
                                           <td>{!! Form::checkbox('resume[]',$deman->id)!!}</td>
                                       <td class="sorting_1">{{$deman->fname}} {{$deman->lname}}</td>
                                               
                                                <td>{{@$deman->from_date}}-{{{isset($deman->to_date)?($deman->to_date==1)?"present":$deman->to_date:''}}}</td>
                                                <td>{{@$deman->qualification}}</td>
                                                <td>{{@$deman->mobile}}</td>
                                                <td>{{@$deman->raddress1}},{{@$deman->country}}</td>
                                                <td>
                                               <a href="#"><button class="btn-xs btn-warning" onclick="window.open('{{url()}}/resume/{{$deman->id}}','newWin','width=800,height=600')">View Resume</button></a>                        
                                                @if(@$empapp && $deman->approval_status!=1)
                                                <a href=""><button type="button" class="btn-xs btn-primary">Requested</button></a>
                                           
                                                @elseif(@$empapp && $deman->approved_by==Auth::user()->id && $deman->approval_status==1)
                                                <a href=""><button type="button" class="btn-xs btn-success">Approved</button></a>
                                                @else
                                                <!--<a href="{{url()}}/approval/{{{$deman->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-primary">Request</button></a>-->
                                                @endif
                                                <!--{!! Form::open(['method' => 'DELETE','route' => ['approval.destroy', $deman->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn btn-warning']) !!}
                                                     {!! Form::close() !!}
                                                -->
                                                 </td>
                                                 </tr>
                                          
                                        @endforeach
                                         <?php echo $resumeSearch->render(); ?>
                                        @else
                                        <tr>
                                            <td colspan="7">searched not found</td>
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

