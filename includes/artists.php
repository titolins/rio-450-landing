<?php
function __autoload($DBConf) {
    set_include_path(dirname(__FILE__));
    include __DIR__.'/'.$DBConf . '.php';
}


$db = new DBConf();
$conn = $db->connect();

$shirt_stmt = $conn->prepare(GET_SHIRT);
$shirt_stmt->bind_param("s", $artist_id);

$res = $conn->query(SELECT_ARTISTS);

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

$i = 1;

while ($row = $res->fetch_assoc()) {
    $row_end = false;
    $artist_id = $row['id'];
    $artist_name = $row['name'];
    $artist_site = $row['website'];
    $artist_about = $row['about'];

    $shirt_stmt->execute();
    $shirt_stmt->bind_result($id, $shirt_thumb, $shirt_img, $a_id);
    $shirt_stmt->fetch();

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
                        captionOverlay: { position: 'below' },
                        align: 'center', slideshowGroup: 'shirts'})">
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
    $artist .= "<a href=\"".$artist_site."\">".$artist_name."</a>";
    $artist .= "</h4>\n\t\t\t<p>".$artist_about."</p>\n\t\t  </div>";
    $artist .= "<div id=\"".$artist_id."\" class=\"vote-btn\">";
    $artist .= <<<'EOF'
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
    }
    $i += 1;
    $artists .= $artist;
}

// after, we must remember to close both artists div 
$artists .= <<<'EOF'

            </div> <!-- closes the artists-container div -->
        </div> <!-- closes the artists div -->
EOF;

$shirt_stmt->close();
$conn->close();

echo $artists;
?>
