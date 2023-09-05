<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"), true);
$txn_id = $data['txn-id'];
$txn_amount = $data['txn-amount'];

include "encdec_paytm.php";

//$icid = "T2308271602462115962313";

//$TXN_AMOUNT = "100";

$responseParamList = array();


$requestParamList = array();

//change this Mid Id 
$requestParamList = array("MID" => "lrl090197822476" , "ORDERID" => $txn_id); 

$responseParamList = getTxnStatusNew($requestParamList);


if (01 == $responseParamList["RESPCODE"]) {
    echo json_encode($responseParamList);
}else {
    echo json_encode(array('message' => 'Failed to add Fund', 'status' => false));
}
?>