<?
header('Content-type: application/json');

function __autoload($DBConf) {
    set_include_path(dirname(__FILE__));
    include __DIR__.'/includes/'.$DBConf.'.php';
}

/*
$users_ip = $_SERVER['REMOTE_ADDR'];
print_r($users_ip);
//print_r($_POST); // for viewing it as an array
//var_dump($_POST); // for viewing all info of the array
die();
 */

$id = $_POST['id'];
$ip = $_POST['ip'];


$response = array();
$response['status'] = null;

$db = new DBConf();

if(!($conn = $db->connect())) {
    $response['status'] = 'error';
    $response['msg'] = "error connecting to db";
};

$has_voted = false;

$res = $conn->query(SELECT_VOTES);

while ($row = $res->fetch_assoc()) {
    $row_ip = $row['ip'];
    if ($ip == $row_ip) {
        if((time()-(60*60*24)) < strtotime($row['timestamp'])) {
            $has_voted = true;
            break;
        }
    }
}

if ($has_voted) {
    $response['status'] = 'success';
    $response['msg'] = 'Voto para o ip: '.$ip.' ja registrado nas ultimas 24 horas';
} else {
    if(!($vote_stmt = $conn->prepare(VOTE))) {
        $response['status'] = 'error';
        $response['msg'] = "error preparing";
    };

    if(!($vote_stmt->bind_param("ss", $ip, $id))) {
        $response['status'] = 'error';
        $response['msg'] = $vote_stmt->error;
    };

    if(!($vote_stmt->execute())) {
        $response['status'] = 'error';
        $response['msg'] = $vote_stmt->error;
    };

    $vote_stmt->close();

    if($response['status'] === null ) {
        $response['status'] = 'success';
        $response['msg'] = 'Voto computado!';
    };
}

$conn->close();

//print_r(json_encode($response)); // for viewing it as an array
////var_dump(json_encode($response)); // for viewing all info of the array
//die();

echo(json_encode($response));

?>
