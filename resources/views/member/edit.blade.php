@extends('index')

@section('content')
<div id="page-wrapper">
    <div class="row">
    	<!-- <div class="col-lg-6 col-lg-offset-2">
            <h1 class="page-header">Add Member</h1>
         </div> -->
                  
                    <div class="col-lg-6 col-lg-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Edit Member
                            </div>
                            @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                       {!! Form::model($memb, ['method' => 'PATCH','route' => ['member.update', $memb->id]]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" id="name" value="{{ $memb->name }}">
                                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Email</label>
                                                 <input class="form-control" type="email" name="email" id="email" value="{{ $memb->email }}">
                                                <p class="form-control-static">email@example.com</p>
                                            </div>
                                            <!-- <div class="form-group"> -->
                                                <!-- <label>Password</label> -->
                                                 <!-- <input class="form-control" type="password" name="password" id="password" value="{{ $memb->password }}"> -->
                                            <!-- </div> -->
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" type="text" name="address" id="address" value="{{ $memb->address }}">
                                            </div>
                                             <div class="form-group">
                                                <label>Contact Number</label>
                                                <input class="form-control" type="text" name="phone" id="phone" value="{{ $memb->contactNumber }}">
                                            </div>
                                            <div class="form-group">
                                                 <label>Member Type</label>
                                                <select class="form-control" name="mtype" id="mtype">
                                                	<option value="{{ $memb->type }}">Select</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Employer</option>
                                                    <option value="3">Agent</option>
                                                </select>
                                            </div>
                                            
                                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                            <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                                            
                                  {!! Form::close() !!}
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
</div>
@endsection
