<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

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
                        @if(Auth::user()->usertype == "Admin")
                        <li>
                            <a href="{{url('')}}/web/add-account"><i class="fa fa-edit fa-fw"></i>ADD ACCOUNT</a>
                        </li>
                        <li>
                            <a href="{{url('')}}/web/modify-account"><i class="fa fa-edit fa-fw"></i>MODIFY ACCOUNT</a>
                        </li>
                        @endif
                        {{-- <li>
                            <a href="{{url('')}}/web/input-report"><i class="fa fa-edit fa-fw"></i> INPUT REPORT</a>
                        </li> --}}
                        @if(Auth::user()->usertype == "Supervisor")
                        <li>
                            <a href="{{url('')}}/web/display-report"><i class="fa fa-table fa-fw"></i>DISPLAY REPORT</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Modify Account</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                            <p class="help-block">Please enter your fullname.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                            <p class="help-block">Please insert a valid email address.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                            <p class="help-block">Enter your password.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Retype Password</label>
                                            <input type="password" name="confirmpassword" class="form-control">
                                            <p class="help-block">Make sure you type a correct password.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios1" value="Male" {{$user->gender == 1 ? "checked" : ""}}>Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios2" value="Female" {{$user->gender == 2 ? "checked" : ""}}>Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <input type="date" name="dob" class="form-control" value="{{$user->dob}}">  
                                        </div>
                                        <br>

                                        <div id="authenticationModal" class="modal fade">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6 center">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Authenticate Yourself</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Input your current password</label>
                                                        <input type="password" name="currentpassword" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default">Confirm</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                        <button type="button" id="showModal" class="btn btn-default" data-toggle="modal" data-target="#authenticationModal">Save</button>

                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                <!--NOTHING HERE, JUST A SPACE-->
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <script type="text/javascript">
        var modal = document.getElementById('authenticationModal');
        var btn = document.getElementById('showModal');

        btn.onclick = function {
            modal.display = "block";
        }

        window.onclick = function(event) {
            if(event.target == modal) {
                modal.display = "none";
            }
        }
    </script>

    <!-- jQuery -->
    <script src="{{url('')}}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('')}}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('')}}/dist/js/sb-admin-2.js"></script>

</body>

</html>
