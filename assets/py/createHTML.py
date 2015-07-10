from sqlalchemy import create_engine
from sqlalchemy import Base, Artist, Shirt


beforeArtists = '''
<!DOCTYPE html>
<html> <!--lang="pt-br"> -->

<head>
    <meta charset="utf-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    <meta content="" name="description"></meta>
    <meta content="" name="author"></meta>

    <title>Rio 450</title>
	<!-- Core Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"></link>
    <!-- Bootstrap theme -->
    <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet"></link>
    <!-- Custom css -->
    <link href="../assets/css/style_header.css" rel="stylesheet"></link>

    <!-- highslide lightbox -->
    <link href="../assets/highslide/highslide.css" rel="stylesheet"></link>

    <!-- counter site css -->
    <link href="../assets/css/soon.css" rel="stylesheet"></link>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- counter site fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css"></link>
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,300,700" rel="stylesheet" type="text/css"></link>

 </head>

 <body>
     <div id="fb-root"></div>
     <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId   :   '864474466974209',
                xfbml   :   true,
                version :   'v2.3'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
     </script>


    <div id="page">
        <a name="top"></a>
        <section id="header">
            <div class="container content" id="timer-container">

                <div id="timer" class="animated FadeIn" data-animated="FadeIn">
                    <div id="days" class="timer_box">
                    </div>
                    <div id="hours" class="timer_box">
                    </div>
                    <div id="minutes" class="timer_box">
                    </div>
                    <div id="seconds" class="timer_box">
                    </div>
                    </div>
            </div> 
        </section>

        <!-- Content -->
        <div class="container content" id="about-container">
            <a name="about"></a>
            <h1>Sobre</h1>
            <div class="row row-centered" id="about-text">
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-4
                            col-md-offset-0 col-md-4">
                    <div class="row">
                        <div class="col-sm-10 col-md-10 col-outline">
                            <h2 class="col-title">Rio me</h2>
                            <p class="content-text">
                                Donec id elit non mi porta gravida at eget 
                                metus. Fusce dapibus, tellus ac cursus commodo, 
                                tortor mauris condimentum nibh, ut fermentum 
                                massa justo sit amet risus. Etiam porta sem 
                                malesuada magna mollis euismod. Donec sed odio 
                                dui.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-4
                            col-md-offset-0 col-md-4">
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10 col-md-offset-1 
                            col-md-10 col-outline">
                            <h2 class="col-title">Rio 450</h2>
                            <p class="content-text">
                                Donec id elit non mi porta gravida at eget 
                                metus. Fusce dapibus, tellus ac cursus commodo, 
                                tortor mauris condimentum nibh, ut fermentum 
                                massa justo sit amet risus. Etiam porta sem 
                                malesuada magna mollis euismod. Donec sed odio 
                                dui.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-4
                            col-md-offset-0 col-md-4">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 
                            col-md-10 col-outline">
                            <h2 class="col-title">Casa 20</h2>
                            <p class="content-text">
                                Donec id elit non mi porta gravida at eget 
                                metus. Fusce dapibus, tellus ac cursus commodo, 
                                tortor mauris condimentum nibh, ut fermentum 
                                massa justo sit amet risus. Etiam porta sem 
                                malesuada magna mollis euismod. Donec sed odio 
                                dui.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

'''

afterArtists = '''
    </div> <!-- closes page div -->

        <div id="contact">
            <a name="contact"></a>
    
            <div class="container content" id="contact-container">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-6"
                    id="contact-info">
                        <div class="row">
                            <h2 class="col-title">Contato</h2>
                            <div class="row">
                                <div class="col-xs-4 col-md-3">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="contact-name">
                                                <h4 class="col-title">
                                                    Nome
                                                </h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <input type="text" required 
                                            id="contact-name"></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="contact-email">
                                                <h4 class="col-title">
                                                    Email
                                                </h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <input type="email" required
                                            id="contact-email"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-offset-1 col-xs-6 
                                            col-md-3" id="msg">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="contact-message">
                                                <h4 class="col-title">
                                                    Mensagem
                                                </h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <textarea 
                                                id="contact-message"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="send-btn">
                                                <span class="send-text">Enviar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-6"
                    id="footer-info">
                        <div class="row">
                            <div class="col-xs-8 col-sm-4">
                                <h4 class="col-title">Ir para</h4>
                                <ul>
                                    <li><a href="#top">Topo da página</a></li>
                                    <li><a href="#about">Sobre</a></li>
                                    <li><a href="#artists">Artistas</a></li>
                                    <li><a href="#contact">Contato</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-8 col-sm-4">
                                <h4 class="col-title">Promoção</h4>
                                <ul>
                                    <li>
                                        <a class="highslide" 
                                           onclick="return hs.htmlExpand(this,
                                                    { objectType: 'ajax',
                                                    contentId:'highslide-html-8'
                                                    });"
                                            href="../assets/html/regulamento.html">
                                            Regulamento
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-8 col-sm-4">
                                <h4 class="col-title">Organizadores</h4>
                                <ul>
                                    <li>
                                    <a href="https://www.facebook.com/festariome?fref=ts">
                                            Rio Me</a>
                                    </li>
                                    <li><a href="http://www.casa20.com/">Casa 20</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr></hr>
                    <div class="row">
                        <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0">
                            <span id="copyright">
                                Copyright 2015 - Rio Me e Casa 20 - Todos os direitos 
                                reservados.
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- closes the contact div -->



    <!-- Footer 
    <div class="container content" id="footer-container">
        <a name="footer"></a>
        <footer class="footer">
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-4">
                    <h4 class="col-title">Ir para</h4>
                    <ul>
                        <li><a href="#top">Topo da página</a></li>
                        <li><a href="#about">Sobre</a></li>
                        <li><a href="#artists">Artistas</a></li>
                        <li><a href="#contact">Contato</a></li>
                    </ul>
                </div>
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-4">
                    <h4 class="col-title">Promoção</h4>
                    <ul>
                        <li><a href="#">Regulamento</a></li>
                    </ul>
                </div>
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-4">
                    <h4 class="col-title">Organizadores</h4>
                    <ul>
                        <li>
                        <a href="https://www.facebook.com/festariome?fref=ts">
                                Rio Me</a>
                        </li>
                        <li><a href="http://www.casa20.com/">Casa 20</a></li>
                    </ul>
                </div>
            </div>
            <hr></hr>
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0">
                    <span id="copyright">
                        Copyright 2015 - Rio Me e Casa 20 - Todos os direitos 
                        reservados.
                    </span>
                </div>
            </div>
        </footer> 
    </div>  closes the footer container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>


    <!-- counter site js 
    <script src="../assets/js/modernizr.custom.js"
type="text/javascript"></script>-->
    <script src="../assets/js/soon/plugins.js"></script>
<!--     causing me errors with jquery (and considering i am not using it for
    now)
    <script src="../assets/js/jquery.themepunch.revolution.min.js"></script>-->
    <script src="../assets/js/soon/custom.js"></script>

    <!-- lightbox js 
    <script src="../assets/js/ekko-lightbox.js" type="text/javascript"></script>
    <script src="../assets/js/ekko-lightbox.min.js"
type="text/javascript"></script>-->
    <!-- highslide lightbox -->
    <script src="../assets/highslide/highslide-full.js" type="text/javascript"></script>
    <script>
    window.onload = function() {
        getPositions();
    };


    $(document).ready(function() {
        $.ajaxSetup({ cache: true });
        document.onscroll = scroll;

        window.addEventListener("resize", function() {
            getPositions();
        }, false);

        var userIp = getIp();

    });

    /*
    $(document).delegate('*[data-toggle="lightbox"]','click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });*/


    $(window).scroll(function() {
        if ($(window).scrollTop() >= origOffsetYArtist) {
            if (($(window).scrollTop()+$(window).height()) >= origOffsetYContact) {
                $('#artists-navbar').removeClass('navbar navbar-fixed-top');
                $('#artists-container').removeClass('fixed-navbar-padding');
            } else {
                $('#artists-navbar').addClass('navbar navbar-fixed-top');
                $('#artists-container').addClass('fixed-navbar-padding');
            }
        } else {
            $('#artists-navbar').removeClass('navbar navbar-fixed-top');
            $('#artists-container').removeClass('fixed-navbar-padding');
        }
    });

    function getPositions() {
        artist_nav = $('#artists-navbar');
        contact_div = $('#contact');

        origOffsetYArtist = artist_nav.offset().top;
        origOffsetYContact = contact_div.offset().top;
    };

    function getIp() {
        $.getJSON("http://jsonip.com/?callback=?", function (data) {
            return data.ip;
        });
    };

    </script>


    </body>

</html>
'''

