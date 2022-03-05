<?php 
 include("../../../conn.php");


extract($_POST);

$delExmne = $conn->query("DELETE  FROM examinee_tbl WHERE exmne_id='$id'  ");
if($delExmne)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>