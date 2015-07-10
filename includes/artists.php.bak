<?php
include 'dbconf.php';

function makeArtists() {
    $artists = <<<'EOF'
    <div id="artists">
        <a name="artists"></a>
        <div class="fixed-navbar container" id="artists-navbar">
            <span>
                <h1 class="navbar-title">Artistas</h1>
            </span>
        </div>

        <div class="container content" id="artists-container">
EOF;

    $dbhandle = connect();
    $conn = mysql_select_db($dbname, $dbhandle);
    $result = mysql_query($select_artists);
    $i = 1;
    while ($row = mysql_fetch_array($result)) {
        $row_end = false;
        $artist_id = $row{ 'id' };
        $artist_name = $row{ 'name' };
        $artist_site = $row{ 'website' };
        $artist_about = $row{ 'about' };

        $shirt_query = "SELECT * FROM shirt WHERE artist_id = '$artist_id'";
        $shirt_row = mysql_fetch_array(mysql_query($shirt_query));
        $shirt_thumb = $shirt_row{ 'thumbPath' };
        $shirt_img = $shirt_row{ 'imgPath' };

        // if its the first round in a row, you start the row and add the first guy
        if ($i % 3 === 1) {
            $artist = <<<'EOF'

        <div class="row row-centered"> 
            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 
                        col-sm-4 col-md-offset-0 col-md-4">
                <div class="row">
                    <div class="col-sm-10 col-md-10 col-outline">
                        <h3 class="col-title">
EOF;
        // if its the second round, we just add the guy
        } elseif ($i % 3 === 2) {
            $artist = <<<'EOF'

            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 
                        col-sm-4 col-md-offset-0 col-md-4">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10 
                                col-md-offset-1 col-md-10 col-outline">
                        <h3 class="col-title">

EOF;
        /* if its the third round, we add the guy and set the flag so we remember
            to close the row after adding the rest of the content */
        } else {
            $row_end = true;
            $artist = <<<'EOF'

            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0 
                        col-sm-4 col-md-offset-0 col-md-4">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 
                                col-md-10 col-outline">
                        <h3 class="col-title">
EOF;
        }

        $artist .= $artist_name;
        $artist .= <<<'EOF'
    </h3>
                        <a class="highslide" 
                        href="
EOF;
        $artist .= $shirt_img;
        $artist .= <<<'EOF'
    "
                            onclick="return hs.expand(this, {
                            wrapperClassName: 'wide-border',
                            captionOverlay: { position: 'rightpanel' },
                            align: 'center'})">
                            <img class="img-responsive shirt-img"
                            alt="Highslide JS"
                            title="Clique para expandir"
                            src="
EOF;
        $artist .= $shirt_thumb;
        $artist .= <<<'EOF'
    ">
                            </img>
                        </a>
                        <div class="highslide-caption">
                            <h4 class="lightbox-title">
EOF;
        $artist .= "".$artist_name;
        $artist .= "</h4>\n\t\t\t<p>".$artist_about."</p>\n\t\t  </div>";
        $artist .= <<<'EOF'

                        <div class="vote-btn">
                            <span class="vote-text">Votar</span>
                        </div>
                        <div class="fb-like"
                        data-show-faces="true" 
                        data-width="200"
                        data-share="true"
                        data-layout="button"
                        data-href="
EOF;
        $artist .= $artist_site;
        $artist .= <<<'EOF'
    "></div>
                    </div>
                </div>
            </div>
EOF;

        if ($row_end) {
            $artist .= "\n</div> <!-- closes row -->";
            $i = 1;
        } else {
            $i += 1;
        }
        $artists .= $artist;
    }
    mysql_close($dbhandle);

    // after, we must remember to close both artists div 
    $artists .= <<<'EOF'

                </div> <!-- closes the artists-container div -->
            </div> <!-- closes the artists div -->
EOF;
    return $artists;
}
?>
