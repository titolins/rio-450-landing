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

$response = array();
$response['status'] = null;

$db = new DBConf();

if(!($conn = $db->connect())) {
    $response['status'] = 'error';
    $response['msg'] = "error connecting to db";
};

if(!($vote_stmt = $conn->prepare(VOTE))) {
    $response['status'] = 'error';
    $response['msg'] = "error preparing";
};

if(!($vote_stmt->bind_param("s", $id))) {
    $response['status'] = 'error';
    $response['msg'] = $vote_stmt->error;
};

if(!($vote_stmt->execute())) {
    $response['status'] = 'error';
    $response['msg'] = $vote_stmt->error;
};

$vote_stmt->close();
$conn->close();

if($response['status'] === null ) {
    $response['status'] = 'success';
    $response['msg'] = 'voto computado';
};

//print_r(json_encode($response)); // for viewing it as an array
////var_dump(json_encode($response)); // for viewing all info of the array
//die();

echo(json_encode($response));

?>
