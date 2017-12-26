<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Movie_store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="/moban/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="/moban/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="/moban/js/jquery-1.11.1.min.js"></script>
    <link href='http://fonts.useso.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <style>
        i.icon4{
            top:-278px;
        }

        i.icon6 {
            top: -243px;
        }

        ul.list_3{
            top: -280px;
        }
        ul.list_5{
            top: -243px;
        }

        .m_3img{
            width: 189px;
            height: 257px;
        }
    </style>
    <script src="/moban/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="container_wrap">
        <div class="header_top">
            <div class="col-sm-3 logo"><a href="index.html"><img src="/moban/images/logo.png" alt=""/></a></div>
            <div class="col-sm-6 nav">
                <ul>
                    <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.html"> </a> </span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.html"> </a></span></li>
                </ul>
            </div>
            <div class="col-sm-3 header_right">
                <ul class="header_right_box">
                    <li><img src="/moban/images/p1.png" alt=""/></li>
                    <li><p><a href="login.html">Carol Varois</a></p></li>
                    <li class="last"><i class="edit"> </i></li>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li><img src="/moban/images/banner.jpg" class="img-responsive" alt="test ceshi"/>
                        <div class="button">
                            <a href="{{ route('movies.show', $banners[0]->id) }}" class="hvr-shutter-out-horizontal">下 载</a>
                        </div>
                    </li>
                    <li><img src="/moban/images/banner1.jpg" class="img-responsive" alt=""/>
                        <div class="button">
                            <a href="{{ route('movies.show', $banners[1]->id) }}" class="hvr-shutter-out-horizontal">下 载</a>
                        </div>
                    </li>
                    <li><img src="/moban/images/banner2.jpg" class="img-responsive" alt=""/>
                        <div class="button">
                            <a href="{{ route('movies.show', $banners[2]->id) }}" class="hvr-shutter-out-horizontal">下 载</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="banner_desc">
                <div class="col-md-9">
                    <ul class="list_1">
                        <li>Published <span class="m_1">Feb 20, 2015</span></li>
                        <li>Updated <span class="m_1">Feb 20 2015</span></li>
                        <li>Rating <span class="m_1"><img src="/moban/images/rating.png" alt=""/></span></li>
                    </ul>
                </div>
                <div class="col-md-3 grid_1">
                    <ul class="list_1 list_2">
                        <li><i class="icon1"> </i><p>2,548</p></li>
                        {{--<li><i class="icon2"> </i><p>215</p></li>--}}
                        <li><i class="icon3"> </i><p>546</p></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="box_1">
                <h1 class="m_2">Featurd Movies</h1>
                <div class="search">
                    <form>
                        <input type="text" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="box_2">
                <div class="col-md-5 grid_3">
                    <div class="row_1">
                        <div class="col-md-6 grid_4">
                            <a href="{{ route('movies.show', $goods[0]->id) }}">
                                <div class="grid_2">
                                    <img src="{{ $goods[0]->cover }}" class="img-responsive" style="width: 210px;height: 290px" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_3">
                                            <li><i class="icon5"> </i><p>3,548</p></li>
                                        </ul>
                                        <i class="icon4"> </i>
                                        <p class="m_3">{{ $goods[0]->name }}</p>
                                    </div>
                                </div>
                            </a>
                                <div class="grid_2 col_1">
                                    <a href="{{ route('movies.show', $smalls[0]->id) }}"><img src="/moban/images/pic8.jpg" class="img-responsive" alt=""/></a>
                                    <div class="caption1">
                                        <ul class="list_3">
                                            {{--<li><i class="icon5"> </i><p>3,548</p></li>--}}
                                        </ul>
                                        {{--<i class="icon4"> </i>--}}
                                        <p class="m_3">{{ $smalls[0]->name }}</p>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6 grid_7">
                            <a href="{{ route('movies.show', $goods[5]->id) }}">
                                <div class="col_2">
                                    <ul class="list_4">
                                        <li><i class="icon1"> </i><p>2,548</p></li>
                                        {{--<li><i class="icon2"> </i><p>215</p></li>--}}
                                        <li><i class="icon3"> </i><p>546</p></li>
                                        <li>Rating : &nbsp;&nbsp;<p><img src="/moban/images/rating1.png" alt=""/></p></li>
                                        <li>{{ $goods[5]->name }}</li>
                                        <div class="clearfix"> </div>
                                    </ul>
                                    <div class="m_5"><a href="{{ route('movies.show', $goods[5]->id) }}"><img src="{{ $goods[5]->cover }}" class="img-responsive" alt=""/></a></div>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="row_2">
                        <a href="{{ route('movies.show', $banners[3]->id) }}"><img src="/moban/images/banner1.jpg" class="img-responsive" alt=""/></a>
                    </div>
                </div>
                <div class="col-md-5 content_right">
                    <div class="row_3">
                        <div class="col-md-6 content_right-box"><a href="{{ route('movies.show', $goods[1]->id) }}">
                                <div class="grid_2">
                                    <img src="{{ $goods[1]->cover }}" class="img-responsive m_3img" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_5">
                                            <li><i class="icon5"> </i><p>3,5481</p></li>
                                        </ul>
                                        <i class="icon4 icon6"> </i>
                                        <p class="m_3">{{ $goods[1]->name }}</p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-md-6 grid_5"><a href="{{ route('movies.show', $goods[2]->id) }}">
                                <div class="grid_2">
                                    <img src="{{ $goods[2]->cover }}" class="img-responsive m_3img" alt=""/>
                                    <div class="caption1">
                                        <ul class="list_5">
                                            <li><i class="icon5"> </i><p>3,548</p></li>
                                        </ul>
                                        <i class="icon4 icon6"> </i>
                                        <p class="m_3">{{ $goods[2]->name }}</p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="video">
                        <iframe width="100%" height="" src="http://player.youku.com/embed/XMzI1Mzk5NTEzMg==" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="row_5">
                        <div class="col-md-6">
                            <div class="col_2">
                                <ul class="list_4">
                                    <li><i class="icon1"> </i><p>2,548</p></li>
                                    {{--<li><i class="icon2"> </i><p>215</p></li>--}}
                                    <li><i class="icon3"> </i><p>546</p></li>
                                    <li>Rating : &nbsp;&nbsp;<p><img src="/moban/images/rating1.png" alt=""></p></li>
                                    <div class="clearfix"> </div>
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-6 m_6"><a href="{{ route('movies.show', $smalls[1]->id) }}">
                                <img src="/moban/images/pic8.jpg" class="img-responsive" alt=""/>
                            </a></div>
                    </div>
                </div>
                <div class="col-md-2 grid_6">
                    <div class="m_7"><a href="{{ route('movies.show', $goods[3]->id) }}"><img src="{{ $goods[3]->cover }}" class="img-responsive m_3img" alt=""/></a></div>
                    <div class="caption1">
                        <ul class="list_5">
                            <li><i class="icon5"> </i><p>3,5481</p></li>
                        </ul>
                        <i class="icon4 icon6"> </i>
                        <p class="m_3">{{ $goods[3]->name }}</p>
                    </div>
                    <div class="col_2 col_3">
                        <ul class="list_4">
                            <li><i class="icon1"> </i><p>2,548</p></li>
                            {{--<li><i class="icon2"> </i><p>215</p></li>--}}
                            <li><i class="icon3"> </i><p>546</p></li>
                            <li>Rating : &nbsp;&nbsp;<p><img src="/moban/images/rating1.png" alt=""></p></li>
                            <li><span class="m_4">{{ $goods[4]->name }}</span> </li>
                            <div class="clearfix"> </div>
                        </ul>
                        <div class="m_8"><a href="{{ route('movies.show', $goods[4]->id) }}"><img src="{{ $goods[4]->cover }}" class="img-responsive" alt=""/></a></div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <footer id="footer">
        <div id="footer-3d">
            <div class="gp-container">
                <span class="first-widget-bend"></span>
            </div>
        </div>
        <div id="footer-widgets" class="gp-footer-larger-first-col">
            <div class="gp-container">
                <div class="footer-widget footer-1">
                    <div class="wpb_wrapper">
                        <img src="/moban/images/f_logo.png" alt=""/>
                    </div>
                    <br>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                    <p class="text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
                </div>
                <div class="footer_box">
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Categories</h3>
                        <ul class="first">
                            <li><a href="#">Dance</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Information</h3>
                        <ul class="first">
                            <li><a href="#">New products</a></li>
                            <li><a href="#">top sellers</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Follow Us</h3>
                        <ul class="first">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                        <div class="copy">
                            <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>