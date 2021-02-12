<?php
	//require('src/LassoLead.php');
	//require('src/RegistrantSubmitter.php');
	
/*
	$clientId = '1591';
	$projectId = $_REQUEST['project'];
	
	$apiKey = '';
*/
	
	//construct Lead
/*
	$lead = new LassoLead(
		$_REQUEST['fname'],
		$_REQUEST['lanme'],
		$projectId,
		$clientId,
		$_REQUEST['email']
		$_REQUEST['phone']
	);
*/
	
	//$lead->sendAssignementNotification();
	
	//$submitter = new RegistrantSubmitter();
	//$curl = $submitter->submit('https://api.lassocrm.com/registrant_signup/test', $lead);
	
	echo '<pre>';
	
	var_dump(
		'name: ' $_REQUEST['fname'] . ' ' . $_REQUEST['lanme'] . 
		'\n ProjectID: ' . $projectId .
		'\n client: ' . $clientId .
		'\n email: ' . $_REQUEST['email'] .
		'\n phone: ' . $_REQUEST['phone']
		
	);
	
	echo '</pre>';
	
	
	echo 'done';