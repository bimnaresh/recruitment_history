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
                            <a href="{{url()}}"><i class="fa fa-dashboard fa-fw"></i> Admin-Dashboard</a>
                        </li>
                       <li>
                            <a href="{{url()}}/password/create"><i class="fa fa-lock fa-fw"></i>Change Password</a>
                        </li>
                        <li>
                            <a href="{{url()}}/member"><i class="glyphicon glyphicon-user"></i> Admin-Members</a>
                        </li>
                         <li>
                            <a href="{{url()}}/member/{{2}}"><i class="glyphicon glyphicon-user"></i> Employer-member</a>
                        </li>
                       <!-- <li>
                            <a href="{{url()}}/resume"><i class="fa fa-edit fa-fw"></i>Resume</a>
                        </li>-->
                        <li>
                            <a href="{{url()}}/member/{{3}}"><i class="glyphicon glyphicon-user"></i> Agent-member</a>
                        </li>
                       
                        <li>
                            <a href="{{url()}}/notification"><i class="fa fa-edit fa-fw"></i>Notification and Email</a>
                        </li>
                        <li>
                            <a href="{{url()}}/approval"><i class="fa fa-edit fa-fw"></i>Employer Approval </a>
                        </li>
                        <li>
                            <a href="{{url()}}/resume"><i class="fa fa-edit fa-fw"></i>Resume</a>
                        </li>
                         <li>
                            <a href="{{url()}}/history"><i class="fa fa-book fa-fw"></i>History</a>
                        </li>
                        <li>
                            <a href="{{url()}}/"><i class="fa fa-cog fa-fw"></i>Setting</a>
                        </li>



                        <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>Switch as  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <li><a href="{{url()}}/agent"><i class="fa fa-sign-out fa-fw"></i> Agent</a>
                        </li>
                        <li><a href="{{url()}}/employer"><i class="fa fa-sign-out fa-fw"></i> Employer</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                  </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>