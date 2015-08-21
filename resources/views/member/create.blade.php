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
                               New Member
                            </div>
                           <!-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif-->

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">

                                       {!! Form::open(['route' => 'member.store', 'class' => 'navbar-form']) !!}
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" id="name" value="{{{isset($input['name'])?$input['name']:''}}}" required >
                                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                             </div>
                                           
                                            <div class="form-group">
                                                <label>Email</label>
                                                 <input class="form-control" type="email" name="email" id="email" value="{{{isset($input['email'])?$input['email']:''}}}" required >
                                                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                 <p class="form-control-static">email@example.com</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                 <input class="form-control" type="password" name="password" id="password" required >
                                            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                 <input class="form-control" type="password" name="password_confirm" id="password_confirm" required >
                                            @if ($errors->has('password_confirm')) <p class="help-block">{{ $errors->first('password_confirm') }}</p> @endif
                                                </div>
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" type="text" name="address" id="address" value="{{{isset($input['address'])?$input['address']:''}}}" required >
                                            @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                            
                                             </div>
                                             <div class="form-group">
                                                <label>Contact Number</label>
                                                <input class="form-control" type="text" name="phone" id="phone" value="{{{isset($input['phone'])?$input['phone']:''}}}" required >
                                                @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                 <label>Member Type</label>
                                                <select class="form-control" name="mtype" id="mtype" required >
                                                	<option class='disabled' value=''>Select </option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Employer</option>
                                                    <option value="3">Agent</option>
                                                </select>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                            
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
