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

<style>
#map {
width: 500px;
height: 400px;
}
</style>

    <script>
      function initMap() {
        var uluru = {lat: -7.2932357, lng: 112.8040983};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBavXz79ERuvwE8ppyozR1KodgHD_jJQpY&callback=initMap">
    </script>

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
                        <li>
                            <a href="{{url('')}}/modify-account"><i class="fa fa-edit fa-fw"></i>MODIFY ACCOUNT</a>
                        </li>
                        {{-- <li>
                            <a href="{{url('')}}/input-report"><i class="fa fa-edit fa-fw"></i> INPUT REPORT</a>
                        </li> --}}
                        <li>
                            <a href="{{url('')}}/display-report"><i class="fa fa-table fa-fw"></i>DISPLAY REPORT</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>OALAH</h3>
                    <div id="map"></div>
                    <h3>END OALAH</h3>
                                
                    @foreach($report as $report)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>{{$report->title}}</h3>
                            <p>{{$report->description}}</p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Time Created
                                            </th>
                                            <th>
                                                Location
                                            </th>
                                            <th>
                                                Validation Status
                                            </th>
                                            <th>
                                                Staff
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$report->created_at}}</td>
                                            <td>{{$report->longitude}} {{$report->latitude}}</td>
                                            <td>{{$report->isvalidated == 1 ? "Validated" : "Not Validated"}}</td>
                                            <td>{{$report->name}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>

                            </div>
                            <div>
                                <img src="{{url('')}}/{{$report->imagepath}}">
                                <br>
                                @if($report->isvalidated == 0)
                                    <br>
                                    <a href="{{url('')}}/validate-report/{{$report->id}}" class="button"><button>Validate this report</button></a>
                                    <br>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->








        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
