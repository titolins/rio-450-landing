<?php
$scripts = <<<'EOF'

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


    <!-- counter site js 
    <script src="assets/js/modernizr.custom.js"
type="text/javascript"></script>-->
    <script src="assets/js/soon/plugins.js"></script>
<!--     causing me errors with jquery (and considering i am not using it for
    now)
    <script src="assets/js/jquery.themepunch.revolution.min.js"></script>-->
    <script src="assets/js/soon/custom.js"></script>

    <!-- lightbox js 
    <script src="assets/js/ekko-lightbox.js" type="text/javascript"></script>
    <script src="assets/js/ekko-lightbox.min.js"
type="text/javascript"></script>-->
    <!-- highslide lightbox -->
    <script src="assets/highslide/highslide-full.js" type="text/javascript"></script>
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
EOF;

echo $scripts;
?>
