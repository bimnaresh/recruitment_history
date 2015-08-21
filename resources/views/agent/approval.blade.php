@extends('index')

@section('content')
<div id="page-wrapper">
    
 
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Approved List</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <!--<a href="{{url()}}/member/create"><button  class="btn btn-primary">Add Member</button></a>-->
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
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 217px;">Employee Name</th>
                                                <th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 189px;">Employee Address</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262px;">Agent Name</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Employer Name</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Employer Address</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Date</th>
                                               <th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($approved as $approve)
                                        @if($approve->agent_approval_delete!=2 &&  $approve->agent_id==Auth::user()->id)
                                        <tr class="gradeA odd" role="row">
                                               <td class="sorting_1">{{$approve->fname}} {{$approve->lname}}</td>
                                               <?php $id = $approve->agent_id;
                                                $memb = DB::table('members')->whereId($id)->first();
                                                $idd = $approve->approved_by;
                                                $mem = DB::table('members')->whereId($idd)->first();
                                                ?>
                                               <td>{{$approve->raddress1}},{{$approve->country}},{{$approve->mobile}}</td>
                                                <td>{{$memb->name}}</td>
                                                <td>{{$mem->name}}</td>
                                                <td>{{$mem->address}},{{$mem->contactNumber}}</td>
                                                <td>{{$approve->updated_at}}</td>
                                                <td>
                                                    <a href="#"><button class="btn-xs btn-warning" onclick="window.open('{{url()}}/resume/{{$approve->id}}','newWin','width=800,height=600')">View Resume</button></a>                        
                                              
                                               {!! Form::open(['method' => 'DELETE','route' => ['agent.destroy', $approve->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
                                                     {!! Form::close() !!}
                                                 </td>
                                                 </tr>
                                          @endif 
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
