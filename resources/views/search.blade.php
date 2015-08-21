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
                Search Resume
                @else

                <a href="{{url()}}/resume/create"><button  class="btn btn-primary">Add New</button></a>
                 @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                @endif
                </div>
                {!! Form::open(array('route' => 'search.store', 'id' => 'sign_up','class' => '','method'=> 'POST')) !!}
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


                <!-- /.panel-heading -->
                <div class="panel-body">
    
                    <div class="dataTable_wrapper">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        	<div class="row">
                        	
                        	<div class="col-sm-6">
                        		
                        		</div>
                        		</div>
                        		<div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                            <thead>
                                <tr role="row">
                                	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 217px;">Name</th>
                                	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262px;">Address</th>
                                	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Experience</th>
                                	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 189px;">Email</th>
                                	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!--  -->
                             @foreach($resume as $resum)
                             <?php $pid= $resum->id;
                             $work = DB::table('experienceinformation')->where('pid',$pid)->first();
//                                         $edu = DB::table('educationinformation')->where('pid',$pid)->first();
                                  
                             ?>
                             <tr class="gradeA odd" role="row">
                                    <td class="sorting_1">{{$resum->fname}} {{$resum->lname}}</td>
                                    <td>{{$resum->raddress1}},{{$resum->country}},{{$resum->mobile}}</td>
                                    <td>{{{isset($work->from_date)?$work->from_date:''}}}-{{{isset($work->to_date)?($work->to_date==1)?"present":$work->to_date:''}}}</td>
                                    <td class="center">{{$resum->email}}</td>
                                    <td>
                                        <a href="#"><button class="btn-xs btn-warning" onclick="window.open('{{url()}}/resume/{{$resum->id}}','newWin','width=800,height=600')">View Resume</button></a>                        
                                   <a href=""><button type="button" class="btn-xs btn-danger">Expert</button></a>
                                    @if(Auth::user()->type==3||(Auth::user()->type==1 && Auth::user()->loginas!=2))
                                    {!! Form::open(['method' => 'DELETE','route' => ['resume.destroy',$resum->id]]) !!}
                                         {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
                                         {!! Form::close() !!}
                                    @endif 
                                    </td>
                                    <!-- <td class="center"><a href=""><button type="button" class="btn-xs btn-primary">export</button></a> <a href=""><button type="button" class="btn-xs btn-warning">edit</button></a> <a href=""><button type="button" class="btn-xs btn-danger">delete</button></a></td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
