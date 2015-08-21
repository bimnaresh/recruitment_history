@extends('index')

@section('content')
<div id="page-wrapper">
    

    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List of Resume Approved By Employer</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
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
                                                        {!! Form::open(['route' => 'approval.store','class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}   
                                        @if (Session::has('message'))
                                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                                        @endif
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th tabindex="1"></th>
                                            	<th>Employee Name</th>
                                                <th>Employee Address</th>
                                            	<th>Agent Name</th>
                                            	<th>Employer Name</th>
                                            	<th>Employer Address</th>
                                            	<th>Date</th>
                                               <th>Action</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($resump))
                                           
                                       @foreach($resump as $approve)
                                        <tr class="gradeA odd" role="row">
                                       <!--@if($approve->approval_status!=1 && $approve->approved_by!=0)-->
                                       <?php $id = $approve->agent_id;
                                                $memb = DB::table('members')->whereId($id)->first();
                                                $idd = $approve->empid;
                                                $mem = DB::table('members')->whereId($idd)->first();
                                         
                                                ?>
                                        <td>{!! Form::checkbox('resume[]',$approve->apid)!!}</td>
                                                <td class="sorting_1">{{$approve->fname}} {{$approve->lname}}</td>
                                               
                                               <td>{{$approve->raddress1}},{{$approve->country}},{{$approve->mobile}}</td>
                                                <td>{{$memb->name}}</td>
                                                <td>{{$mem->name}}</td>
                                                <td>{{$mem->address}},{{$mem->contactNumber}}</td>
                                                <td>{{date("Y-m-d",strtotime($approve->created_at))}}</td>
                                                <td>
                                               <a href="#"><button class="btn-xs btn-warning" onclick="window.open('{{url()}}/resume/{{$approve->id}}','newWin','width=800,height=600')">View</button></a>                        
                                               @if($approve->approval_status==1)
                                                <a href=""><button type="button" class="btn-xs btn-success">Approved</button></a>
                                                @else
                                                <!--<a href="{{url()}}/approval/{{{$approve->id}}}"><button type="button" class="btn-xs btn-primary">Approve</button></a>-->
                                                @endif
                                                <!--{!! Form::open(['method' => 'DELETE','route' => ['approval.destroy', $approve->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn btn-warning']) !!}
                                                     {!! Form::close() !!}-->
                                                 </td>
                                                 </tr>
                                            <!--@endif-->
                                        @endforeach
                                         <?php echo $resump->render(); ?>
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

