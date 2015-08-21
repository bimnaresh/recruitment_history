<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recruitment Agency CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url()}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url()}}/css/bootstrapvalidator.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url()}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{url()}}/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url()}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url()}}/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url()}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="{{url()}}/css/datepicker.css" rel="stylesheet" type="text/css">
<!------------------------------->
<script type="text/javascript" src="{{url()}}/js/jquery-ui.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
<script type="text/javascript">//<![CDATA[ 
$(document).ready(function()
{

   
});
</script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @section('header')
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
                 <a class="navbar-brand" href="">Recruitment Agency CMS</a>
             
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                       @if(Auth::check())
                        {{Auth::user()->name}}
                        @endif
                          <i class="fa fa-caret-down"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li> -->
                        <li><a href="{{url()}}/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                  </ul>
            @if(Auth::check())
               @section('leftSidebar')
            @if((Auth::user()->type==2 || Auth::user()->type==1) && Auth::user()->loginas==2 && Auth::user()->status==1)
           @include('includes.dashboard_employer')
            @endif
            @if((Auth::user()->type==3 || Auth::user()->type==1) && Auth::user()->loginas==3 && Auth::user()->status==1)
           @include('includes.dashboard_agent')
           @endif
           @if(Auth::user()->type==1 && Auth::user()->loginas==1 && Auth::user()->status==1)
           @include('includes.dashboard_admin')
            @endif
            @endif
            <!-- /.navbar-top-links -->
           
            @if(Auth::check())
                @show
            @else
                @endsection
            @endif
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')

    </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="{{url()}}/bower_components/jquery/dist/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="{{url()}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="{{url()}}/js/bootstrapvalidator.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="{{url()}}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="{{url()}}/bower_components/raphael/raphael-min.js"></script>
            <!-- <script src="{{url()}}/bower_components/morrisjs/morris.min.js"></script> -->
            <!-- <script src="{{url()}}/js/morris-data.js"></script> -->

            <!-- Custom Theme JavaScript -->
            <script src="{{url()}}/dist/js/sb-admin-2.js"></script>
            <script src="{{url()}}/js/bootstrap-datepicker.js"></script>
            <script src="{{url()}}/js/custom.js"></script>
            <script type="text/javascript">
               
                $(document).ready(function () {
                
                $('.calendar').datepicker({
                    format: "mm/dd/yyyy"
                });  
            
            });
                $('#addSkill').click(function(){
                    
                    var skillContainer = document.getElementById('skillContainer');
                    var skillCount = document.getElementById('skillCount').value;
                    skillCount = parseInt(skillCount) + 1;
                    document.getElementById('skillCount').value = skillCount;
                    var add = "<div class='form-group'><div class='col-sm-6 parent-box '><div class='row'><label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Skills</label>" +
                                     "<div class='col-xs-12'>" +
                                         "<input class='form-control'  name='skill_" + skillCount +"' type='text'>" +
                                     "</div>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                         "<div class='form-group'>" +
                             "<div class='col-sm-6 parent-box '>" +
                                 "<div class='row'>" +
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'> Proficiency</label>" +
                                     "<div class='col-xs-12'>" +
                                         "<select class='form-control' name='proficiency_" + skillCount +"' >" +
                                             "<option selected disabled value=''>Select </option>" +
                                             "<option value='Beginner' >Beginner</option>" +
                                             "<option value='novice'>novice</option>" +
                                             "<option value='expert'>expert</option>" +
                                         "</select> </div>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                         "<div class='form-group col-sm-12'>" +
                             "<div class='col-sm-6 parent-box '>" +
                                 "<div class='row'>" +
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Upload your Skills Certificate</label>" +
                                     "<div class='col-xs-12'>" +
                                         "<input class='form-control'  name='skills_certificate_" + skillCount +"' type='file'>" +
                                     "</div>" +
                                 "</div>" +
                             "</div>" +
                         "</div>";
                         
//                    skillContainer.innerHTML = skillContainer.innerHTML + add;
                        skillContainer.insertAdjacentHTML('beforeend',add);
                    
                });
                $('#addLanguage').click(function(){
                
                var languagaContainer = document.getElementById('languagaContainer');
                var languageCount = document.getElementById('languageCount').value;
                languageCount = parseInt(languageCount) + 1;
                document.getElementById('languageCount').value = languageCount;
                var add = "<div class='form-group'><div class='col-sm-4 parent-box '><div class='row'><label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Language</label>" +
                                 "<div class='col-xs-12'>" +
                                     "<input class='form-control'  name='language_" + languageCount +"' type='text'>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                     "</div>" +
                     "<div class='form-group'>" +
                         "<div class='col-sm-4 parent-box '>" +
                             "<div class='row'>" +
                                 "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Spoken</label>" +
                                 "<div class='col-xs-12'>" +
                                     "<select class='form-control' name='lspoken_" + languageCount +"' >" +
                                         "<option selected disabled value=''>Select </option>" +
                                         "<option value='Excellent' >Excellent</option>" +
                                         "<option value='good'>good</option>" +
                                         "<option value='average'>expert</option>" +
                                     "</select> </div>" +
                             "</div>" +
                         "</div>" +
                     "</div>" +
                     "<div class='form-group '>" +
                         "<div class='col-sm-4 parent-box '>" +
                             "<div class='row'>" +
                                 "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Spoken</label>" +
                                 "<div class='col-xs-12'>" +
                                     "<select class='form-control' name='lwritten_" + languageCount +"' >" +
                                          "<option selected disabled value=''>Select </option>" +
                                          "<option value='Excellent' >Excellent</option>" +
                                          "<option value='good'>good</option>" +
                                          "<option value='average'>average</option>" +
                                      "</select>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                     "</div>";
                     
//                languagaContainer.innerHTML +=  add;
                    languagaContainer.insertAdjacentHTML('beforeend',add);
                
            });
                </script>
                <script>
                    jQuery(window).load(function(){
               $('[data-toggle=tab]').click(function(){
  if ($(this).parent().hasClass('active')){
	$($(this).attr("href")).toggleClass('active');
  }
});
});
                </script>

</body>
</html>
