<?php
require_once '../../../commons.php';
use ModelsNS\QueryModel;

if (!empty(getView())) {
    switch (getView()) {
        case "GET":
            getHome();
        break;
        default:
            echo "No action defined";
        break;
    }
}

function getHome() {
    $data = getPostData();
    $db = new QueryModel();
    if (!empty($data) && count($data)>0 && !empty($data['id'])) {
        $row = $db->query("SELECT * FROM users WHERE id=:id",[":id"=>$data['id']]);
        $response = json_encode($row);
    } else {
        $response = json_encode(['error'=>'Invalid format']);
    }
    $db->close();
    echo $response;
}
