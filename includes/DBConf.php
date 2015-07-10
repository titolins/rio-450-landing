<?php

define(HOST, "rio450.mysql.uhserver.com");
define(USER, "rio450");
define(PASS, "promo-450");
define(DB, "rio450");
define(SELECT_ARTISTS, "SELECT * FROM artist");
define(GET_SHIRT, "SELECT * FROM shirt WHERE artist_id = ?");
define(VOTE, "INSERT INTO vote (ip, artist_id) VALUES (?, ?)");
define(SELECT_VOTES, "SELECT * FROM vote");

/*
global $host = "rio450.mysql.uhserver.com";
global $user = "rio450";
global $pass = "promo-450";
global $db = "rio450";

global $select_artists = "SELECT * FROM artist";
global $get_shirt = "SELECT * FROM shirt WHERE artist_id = ?";
*/

class DBConf {
    function connect() {
        $conn = new mysqli(HOST, USER, PASS, DB)
            or die("Unable to connect to MySQL");

        return $conn;
    }

}



?>


