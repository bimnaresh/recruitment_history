@extends('index')

@section('content')
<div id="page-wrapper">
    
    
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">History Log</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            </div>                            
                            <!-- /.panel-heading -->
                            <!-----------search code------>
                             {!! Form::open(array('route' => 'history.create', 'id' => 'sign_up','class' => '','method'=> 'POST')) !!}
                <div class="form-group">
                   
                    
                    <div class="col-sm-6 parent-box top-row ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">From Date</label>
                                             <div class="col-xs-12">
                                                  <input type="text" class="form-control calendar"  data-date-format="mm/dd/yy" name="fromdate" id="dp2" value="">
                                              </div>
                                         </div>
                                      </div>        
                    <div class="col-sm-6 parent-box top-row ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">To Date</label>
                                             <div class="col-xs-12">
                                                  <input type="text" class="form-control calendar"  data-date-format="mm/dd/yy" name="todate" id="dp2" value="">
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
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		
                                    		</div>
                                    		</div>
                                    		<div class="row"><div class="col-sm-12">
                                                {!! Form::open(['route' => 'history.destroy','method' => 'DELETE', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger']) !!}    
                                                <table class="table table-striped table-bordered table-hover" style="font-size:0.85em">
                                        <thead>
                                            <tr role="row">
                                                <th width='4%'></th>
                                                <th width='2%'>S.N.</th>
                                                <th width='20%'>Date</th>
                                                <th width='30%'>Action</th>
                                                <th>Username</th>
                                                <th>Remarks</th>
                                               </tr>
                                        </thead>
                                        <tbody>
                                            @if($history)
                                            @foreach($history as $hist)
                                            <?php $i=1; ?>
                                           <tr>
                                                <td>{!! Form::checkbox('list[]',@$hist->id)!!}</td>
                                                 <td><?php echo $i; ?></td> 
                                                  <td>{{@$hist->updated_at}}</td> 
                                                   <td>{{@$hist->action}}</td> 
                                                    <td>{{@$hist->user}}</td> 
                                                     <td>{{@$hist->remark}}</td> 
                                            </tr>
                                            <?php $i=$i+1; ?>
                                            @endforeach
                                            <?php echo $history->render(); ?>
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


