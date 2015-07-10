<?php
$fb = <<<'EOF'
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
EOF;
echo $fb;
?>
