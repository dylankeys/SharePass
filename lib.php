<?php

//SharePass functions

function secretAccess($id) {
	include("config.php");
	
	$dbQuery=$db->prepare("update passwords set access_count = access_count - 1 where id=:id");
	$dbParams = array('id'=>$id);
	$dbQuery->execute($dbParams);
}

function removeSecret($id) {
	include("config.php");
	
	$dbQuery=$db->prepare("delete from passwords where id=:id");
	$dbParams = array('id'=>$id);
	$dbQuery->execute($dbParams);
}

function checkAccessCount($id) {
	include("config.php");
	
	$dbQuery=$db->prepare("select access_count from passwords where id=:id");
	$dbParams = array('id'=>$id);
	$dbQuery->execute($dbParams);

	$dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC);
		
	$accessCount = $dbRow["access_count"];

	return $accessCount;
}