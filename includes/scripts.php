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

    <!-- highslide lightbox -->
    <script src="assets/highslide/highslide-full.js" type="text/javascript"></script>
    <script src="assets/highslide/mobile.js" type="text/javascript"></script>
    <script type="text/javascript">
        hs.align = 'center';

        hs.addSlideshow({
            slideshowGroup: 'shirts',
            interval: 5000,
            repeat: false,
            useControls: true,
            fixedControls: true,
            overlayOptions: {
                opacity: .6,
                position: 'top center',
                hideOnMouseOut: true
            }
        });

        // Optional: a crossfade transition looks good with the slideshow
        hs.transitions = ['expand', 'crossfade'];

    </script>
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

//        var userIp = getIp(); contato@xpromotion.com.br;
//        marketing@livinginrio.net

        $(".vote-btn").click(function(event) {
            getIp(event.target.id);
        });

    });

    $(window).scroll(function() {
    //    if (window.width > 479) {
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
     //   }
    });

    function getPositions() {
        artist_nav = $('#artists-navbar');
        contact_div = $('#contact');

        origOffsetYArtist = artist_nav.offset().top;
        origOffsetYContact = contact_div.offset().top;
    };

    function getIp(id) {
        $.getJSON("http://jsonip.com/?callback=?", function (data) {
            //alert(data.ip);
            vote(id, data.ip);
        });
    };

    function vote(id, ip) {
            //alert(event.target.id);
            $.ajax('ajax.php', 
                    {
                        type: 'POST',
                        dataType: 'text',
                        data: { id: id,
                                ip: ip },
                        success: function(response) {
                                /*console.log('debug: '+response);*/
                                    response = JSON.parse(response);
                                    if (response.status === 'success') {
                                        alert(response.msg);
                                        }
                                    }
                    });
    };

    </script>
EOF;

echo $scripts;
?>
