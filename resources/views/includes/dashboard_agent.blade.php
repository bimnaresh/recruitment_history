<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url()}}"><i class="fa fa-dashboard fa-fw"></i> Agent-Dashboard</a>
                        </li>
                       <li>
                            <a href="{{url()}}/password/create"><i class="fa fa-lock fa-fw"></i>Change Password</a>
                        </li>
                        <li>
                            <a href="{{url()}}/agent/{{Auth::user()->id}}"><i class="glyphicon glyphicon-user"></i> Profile</a>
                        </li>
                       <!-- <li>
                            <a href="{{url()}}/resume"><i class="fa fa-edit fa-fw"></i>Resume</a>
                        </li>-->
                       <!--<li>
                            <a href="{{url()}}/approval_view"><i class="fa fa-edit fa-fw"></i>View Approval</a>
                        </li>-->
                        <li>
                            <a href="{{url()}}/demand_view"><i class="fa fa-edit fa-fw"></i>View Demand</a>
                        </li>
                        <li>
                            <a href="{{url()}}/notification_email_view"><i class="fa fa-edit fa-fw"></i>Notification and Email</a>
                        </li>
                        <li>
                            <a href="{{url()}}/resume"><i class="fa fa-edit fa-fw"></i>Resume</a>
                        </li>
                        @if(\Auth::user()->type==1)
                            <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>Switch as  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <li><a href="{{url()}}/back_to_admin"><i class="fa fa-sign-out fa-fw"></i> Back to Admin</a>
                        </li>
                        <li><a href="{{url()}}/employer"><i class="fa fa-sign-out fa-fw"></i> Employer</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                @endif

                        </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>