@extends('index')

@section('content')
<div id="page-wrapper">  
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Demand Letter</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             </div>
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
                                           {!! Form::model($deman, ['method' => 'PATCH','route' => ['demand.update', $deman->id]]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <tr>
                                        <td>Title:</td><td> <input class="form-control" type="text" name="title" id="title" value="{{$deman->title}}">@if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif</td>
                                                                                    
                                        </tr>
                                        <tr>
                                        <td>No of Vacancies:</td><td><input class="form-control" type="text" name="no_vacancy" id="no_vacancy" value="{{$deman->no_vacancy}}">@if ($errors->has('no_vacancy')) <p class="help-block">{{ $errors->first('no_vacancy') }}</p> @endif</td>
                                        </tr>
                                        <tr>
                                        <td>Minimum Qualification:</td><td><input class="form-control" type="text" name="qualification" id="qualification" value="{{$deman->qualification}}">@if ($errors->has('qualification')) <p class="help-block">{{ $errors->first('qualification') }}</p> @endif</td>
                                        </tr>
                                        <tr>
                                        <td>Location:</td><td><input class="form-control" type="text" name="location" id="location" value="{{$deman->location}}">@if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif</td>
                                        </tr>
                                        <tr>
                                        <td>Description:</td><td> <textarea class="form-control" id="description" name="description" index="1" rows="10">{{$deman->description}}</textarea></td>
                                        </tr>
                                                                          
                                         <tr>
                                       <td>{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}</td>
                                        </tr>
                                  {!! Form::close() !!}
                                  
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
