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
                               Change Your Password
                            </div>
                                <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">

                                       {!! Form::open(['route' => 'password.store', 'class' => 'navbar-form']) !!}
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input class="form-control" type="password" name="old_password" id="old_password" value="">
                                                @if ($errors->has('old_password')) <p class="help-block">{{ $errors->first('old_password') }}</p> @endif
                                           @if (Session::has('message'))
                                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                                            @endif
                                            </div>
                                           
                                            
                                            <div class="form-group">
                                                <label>New Password</label>
                                                 <input class="form-control" type="password" name="password" id="password">
                                            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                 <input class="form-control" type="password" name="password_confirm" id="password_confirm">
                                            @if ($errors->has('password_confirm')) <p class="help-block">{{ $errors->first('password_confirm') }}</p> @endif
                                                </div>                                            
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            
                                            
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
