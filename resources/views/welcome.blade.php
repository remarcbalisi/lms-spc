<!DOCTYPE html>
<html id="startup">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> St. Peter's College | ILIGAN </title>
    <link rel="icon" href="{{ asset('spc/assets/icon/SPC.png') }}">
    <!--<link rel="stylesheet" href="assets/bootstrap/css/bootsrap4/bootstrap.min.css" />-->
    <link rel="stylesheet" href="{{ asset('spc/assets/css/slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('spc/assets/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('spc/assets/bootstrap/css/bootstrap.min.css') }}" />
</head>'[

<body id="bg">
<nav class="navbar navbar-inverse navbar-fixed-top" id="header-navbar">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="http://localhost/spc/">St. Peter's College</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li role="presentation"><a href="about.html">About</a></li>
                <li role="presentation"><a href="admissions.html">Admission</a></li>
                <li role="presentation"><a href="academics.html">Academics</a></li>
                <li role="presentation"><a href="faculty.html">Faculty & Staff</a></li>
                <li role="presentation"><a href="research.html">Research</a></li>
                <li role="presentation"><a href="news.html">News</a></li>
                <li role="presentation"><a href="opportunities.html">Opportunities</a></li>
                <li role="presentation"><a href="students-life.html">Student Life</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="myspc">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My.Spc <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="ul-dropdown">
                        <li><a href="login.html"> Login </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6300">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" id="active" style="background-image: url('{{ asset('spc/assets/img/slider2.png') }}')">
            <div class="carousel-caption d-none d-md-block">
                <h1>St. Peter's College</h1>
                <p>SABAYLE ST, ILIGAN CITY</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('{{ asset('spc/assets/img/slider3.png') }}')">
            <div class="carousel-caption d-none d-md-block">
                <h1>St. Peter's College1</h1>
                <p>SABAYLE ST, ILIGAN CITY</p>
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('{{ asset('spc/assets/img/slider3.png') }}')">
            <div class="carousel-caption d-none d-md-block">
                <h1>St. Peter's College2</h1>
                <p>SABAYLE ST, ILIGAN CITY</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-menu-left" style="font-size: 30px;" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="glyphicon glyphicon-menu-right" style="font-size: 30px;" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid">

    <div id="devider-line"></div>
    <div class="row">

        <!-- NEWS -->
        <div class="col-md-9">
            <div class="panel" id="panels">
                <div class="panel-footer text-center" onclick="location.href='announcements.html'" role="button" id="annspanel">
                    <h4> Announcements </h4>
                </div>

                <div class="list-group" id="ann">

                    <div class="list-group-item">
                        <div onclick="location.href='#'" id="panelsann" role="button">
                            <div class="panel-heading">Submission of SPC Website Proposal</div>
                            <div class="panel-footer" id="panelfooter1">
                                <span class="label label-warning">SPC Website</span>
                                <span class="label label-warning">Proposal</span>
                            </div>
                            <div class="panel-body">
                                Announcement content... Perspiciatis unde omnis iste natus error sit voluptatem.
                            </div>
                            <div class="panel-footer" id="panelfooter1">
                                <small class="pull-right">Date posted: Wednesday, February 27</small>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <div onclick="location.href='#'" id="panelsann" role="button">
                            <div class="panel-heading">Recollection Day!</div>
                            <div class="panel-footer" id="panelfooter1">
                                <span class="label label-warning">Recollection</span>
                                <span class="label label-warning">4th year</span>
                                <span class="label label-warning">Graduating</span>
                                <span class="label label-warning">Students</span>
                            </div>
                            <div class="panel-body">
                                Announcement content... Perspiciatis unde omnis iste natus error sit voluptatem.
                            </div>
                            <div class="panel-footer" id="panelfooter1">
                                <small class="pull-right">Date posted: Tuesday, February 26</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /SPC NEWS -->
            <div id="devider-line"></div>
            <!-- SPC JOBS AND ANNOUNCEMENT  -->
            <div class="row">

                <div class="col-md-12">
                    <div class="panel" id="panels">
                        <div onclick="location.href='news.html'" class="panel-footer text-center" role="button" id="jobspanel">
                            <h4> News </h4>
                        </div>
                        <div class="panel-body" id="spc-news-max-height">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="panel" id="panels">
                                        <div class="panel-body">
                                            <img src="{{ asset('spc/assets/img/slider4.jpg') }}" class="img-responsive">
                                        </div>
                                        <div class="panel-footer">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href="#">see more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="panel" id="panels">
                                        <div class="panel-body">
                                            <img src="{{ asset('spc/assets/img/slider4.jpg') }}" class="img-responsive">
                                        </div>
                                        <div class="panel-footer">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href="#">see more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="panel" id="panels">
                                        <div class="panel-body">
                                            <img src="{{ asset('spc/assets/img/slider4.jpg') }}" class="img-responsive">
                                        </div>
                                        <div class="panel-footer">
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href="#">see more</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel" id="panels">
                        <div class="panel-footer text-center" onclick="location.href='jobs.html'" role="button" id="jobspanel">
                            <h4> Jobs </h4>
                        </div>

                        <ul class="panel-body" id="jobslist">
                            <a href="#"><li> Two(2) faculty members for statistics: </li></a>
                            <a href="#"><li> Legal Researcher </li></a>
                            <a href="#"><li> Hiring of Laboratory Technicians in the Department of Physics </li></a>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- /SPC JOBS AND ANNOUNCEMENT -->

        <!-- EVENTS -->
        <div class="col-md-3">
            <div class="panel" id="panels">
                <div onclick="location.href='#'" class="panel-heading text-center" role="button" id="eventhover">
                    <h4> Events </h4>
                </div>
                <div onclick="location.href='//bootsnipp.com/snippets/ZVZZy'" class="panel-footer" id="panelfooter" role="button">
                    <span class="glyphicon glyphicon-calendar"></span> Calendar
                </div>
                <div class="panel-body" id="spc-events-max-height">

                    <div class="panel" id="panels">
                        <div id="imghover">
                            <div class="panel-heading text-center">
                                Saturday, February 24
                            </div>
                            <div class="panel-body" id="i1">
                                <img src="{{ asset('spc/assets/img/slider4.jpg') }}" class="img-responsive">

                                <div id="textblock">
                                    <h4><span class="glyphicon glyphicon-search"> </span> View</h4>
                                </div>
                            </div>
                            <div class="panel-footer">
                                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href="#">see more</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel" id="panels">
                        <div class="panel-heading text-center">
                            Monday, February 27
                        </div>
                        <div class="panel-body">
                            <img src="{{ asset('spc/assets/img/slider2.png') }}" class="img-responsive">
                        </div>
                        <div class="panel-footer">
                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href="#">see more</a>
                        </div>
                    </div>

                    <div class="panel" id="panels">
                        <div class="panel-heading text-center">
                            Tuesday, February 28
                        </div>
                        <div class="panel-body">
                            <img src="{{ asset('spc/assets/img/slider3.png') }}" class="img-responsive">
                        </div>
                        <div class="panel-footer">
                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href="#">see more</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div id="devider-line1"></div>

</div>

<button onclick="topFunction()" id="gotoTop" title="Go to top">Top</button>

</body>

<footer class="navbar-inverse" id="footer">
    <div class="container-fluid" id="footer-padding">

        <div class="col-xs-6" id="footer-cols">
            <p class="pull-right">
                <img src="{{ asset('spc/assets/icon/SPC.png') }}" class="img-responsive" width="110" height="110">
            </p>
        </div>

        <div class="col-xs-6 row" id="footer-cols">
            <p>
                <strong>
                    Contact Us: <br/> <br/>
                    St. Peter's College. <br/>
                    <small>
                        Sabayle St, Iligan City, <br/>
                        9200 Lanao del Norte <br/>
                        Phone: (063) 221 6246
                    </small>
                </strong>
            </p>
        </div>
    </div>
</footer>

<footer class="navbar-inverse" id="footer1">
    <div class="container-fluid" id="footer-padding1">

        <div class="col-md-4">
            <p>
                © 2018 St. Peter's College.
            </p>
        </div>

    </div>
</footer>

<script type="text/javascript" src="{{ asset('spc/assets/js/jquery.min.js') }}"></script>
<!--<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="{{ asset('spc/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            document.getElementById("gotoTop").style.display = "block";
        } else {
            document.getElementById("gotoTop").style.display = "none";
        }

    }

    function topFunction() {
        $('html, body').animate({scrollTop:0}, 1500);
    }
</script>
</html>
