@extends('index')

@section('content')
<div id="page-wrapper">  
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">My Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                EDIT PROFILE
                                 @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		<!-- <div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                                    		</div> -->
                                    		</div>
                                    		</div>
                                    		<div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                          
                                        @if($agentp->type==3 || $agentp->type==1)
                                         {!! Form::model($agentp, ['method' => 'PATCH','route' => ['agent.update', $agentp->id],'files' =>true]) !!}
                                        <?php 
                                        $profile= DB::table('memberprofile')->where('uid',$agentp->id)->first();
                                        ?>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        <tr>
                                        <td>Name:</td><td> <input class="form-control" type="text" name="name" id="name" value="{{$agentp->name}}"></td>
                                        </tr>
                                        <tr>
                                        <td>Email:</td><td><input class="form-control" type="text" name="email" id="email" value="{{$agentp->email}}"></td>
                                        </tr>
                                        <tr>
                                        <td>Address:</td><td><input class="form-control" type="text" name="address" id="address" value="{{$agentp->address}}"></td>
                                        </tr>
                                        <tr>
                                        <td>Contact Number:</td><td><input class="form-control" type="text" name="contactNumber" id="contctNumber" value="{{$agentp->contactNumber}}"></td>
                                        </tr>
                                        <tr>
                                        <td>Company Name:</td><td><input class="form-control" type="text" name="company_name" id="company_name" value="{{{isset($profile->company_name)? $profile->company_name:''}}}"></td>
                                        </tr>
                                        <tr>
                                        <td>Company Address:</td><td><input class="form-control" type="text" name="company_address" id="company_address" value="{{{isset($profile->company_address)? $profile->company_address:''}}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Company Information:</td><td><textarea class="form-control" type="text" name="company_information" id="company_information" value="">{{{isset($profile->company_information)? $profile->company_information:''}}}</textarea></td>
                                        </tr>
                                        <tr>
                                        <td>Document:</td><td><input class="form-control" type="file" name="company_document" value=""><a href='{{url()}}/upload/{{{isset($profile->company_document)?$profile->company_document:''}}}'>{{{isset($profile->company_document)?$profile->company_document:''}}}</a></td>
                                        </tr>
                                        
                                         <tr>
                                       <td>{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}</td>
                                        </tr>
                                  {!! Form::close() !!}
                                   @endif
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
