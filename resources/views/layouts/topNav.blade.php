<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MRSB TPA System</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

@section('topNavBar')
    <div id = 'main_container' class="container" style="text-align:center;">
        <nav id = 'main_title' class="navbar navbar-default" >This is for the title of location<br> This is for the menu of the selection<br><br>
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" >MSRB TPA System</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Home</a></li>
                             <li>
                                <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                        <a href="/carriers" class="list-unstyled dropdown-item"  role="button" aria-haspopup="true" aria-expanded="false">Carriers Report</a><br>

                                       <a href="/agents" class="list-unstyled dropdown-item"  role="button" aria-haspopup="true" aria-expanded="false">Agents</a><br>

                                       <a href="/individuals" class="list-unstyled dropdown-item"  role="button" aria-haspopup="true" aria-expanded="false">Individuals</a><br>

                                        <a href="/policies" class="list-unstyled dropdown-item"  role="button" aria-haspopup="true" aria-expanded="false">Policies</a><br>

                                       <a href="/x12editor" class="list-unstyled dropdown-item"  role="button" aria-haspopup="true" aria-expanded="false">X12 Editing and Logging</a><br>

                                    </div>
                            </li>



                        </ul>

                    </div><!--/.nav-collapse -->

                </div><!--/.container-fluid -->
            </div>
        </nav>
     </div> <!-- /container -->
@show



<div id = "output" name = "output" class="container">
    @section('leftNavStart')

        <div id="menu_list" class="container">
            <div class="row">
                <div id = "output" class="col-md-12">
                    <div class="sidebar-nav-fixed fixed-left">
                        <div class="well">
                            <ul class="nav ">
    @show

    @section('leftNavEnd')

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


 </div>

    @show

<div class="container navbar-fixed-bottom">
    @section('footer')
        This is my master footer
        <!-- Bootstrap core JavaScript
   ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="{{asset('js/app.js')}}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    @show
</div>
</body>
</html>