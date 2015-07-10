<?php
global $select_artists = "SELECT * FROM artist";

global $dbname = "rio450";

function connect() {
    $hostname = "rio450.mysql.uhserver.com";
    $username = "rio450";
    $password = "promo-450";

    $dbhandle = mysql_connect($hostname, $username, $password)
        or die("Unable to connect to MySQL");

    return $dbhandle;
};

?>


