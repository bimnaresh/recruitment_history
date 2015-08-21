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
                                {!! Form::open(['method' => 'get','route' => ['employer.edit', $agentp->id]]) !!}
                                                     {!! Form::submit('Edit Profile', ['class' => 'btn-xs btn-primary']) !!}
                                                     {!! Form::close() !!} </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	<!-- <div class="col-sm-6">
                                    	<div class="dataTables_length" id="dataTables-example_length">
                                    		<label>Show 
                                    		<select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                                    	</div>
                                    	</div> -->
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
                                                                               
                                        @if($agentp->type==2 || $agentp->type==1)
                                        <tr>
                                        <td>Name:</td><td>{{$agentp->name}}</td>
                                        </tr>
                                        <tr>
                                        <td>Email:</td><td>{{$agentp->email}}</td>
                                        </tr>
                                        <tr>
                                        <td>Address:</td><td>{{$agentp->address}}</td>
                                        </tr>
                                        <tr>
                                        <td>Contact Number:</td><td>{{$agentp->contactNumber}}</td>
                                        </tr>
                                        <tr>
                                        <td>Company Information:</td><td></td>
                                        </tr>
                                        <tr>
                                        <td>Document:</td><td></td>
                                        </tr>
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
