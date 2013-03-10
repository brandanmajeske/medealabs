<?php 
	session_start();

	require_once('libraries/codebird.php');
	Codebird::setConsumerKey('bRBf6HXWy80oKlZImw2B8A','2TScn4tEcaKcHXekxSDWlVzQrUtWuMBFkQqyOvgAk'); 
	
	$cb = Codebird::getInstance();
	$cb->setToken('383326679-XIgNYymbgyzELmep16EbSLr8xlvWBmuO4CT76wOo', 'CjuPclaOSP1gFPN5nranp5Mj1SQwzjER2zljeMlvT7Y');

	$reply = $cb->account_verifyCredentials();
	print_r($reply);

	/*$params = array(
		'status' => 'Here are some Chaise lounge chairs for your viewing pleasure',
		'media[]' => 'assets/testimg/poolchairs.jpg'
	);
	$post = $cb->statuses_updateWithMedia($params);
	echo '<pre>', print_r($post), '</pre>';*/
	
	//$reply = (array) $cb->statuses_homeTimeline();
	//print_r($reply);
	//$reply = $cb->statuses_update('status=Whats up Hiroshi? Lets light this candle!');
	//print_r($reply);

	/*$params = array(
   	 'status' => 'Some more pool chairs!',
   	 'media[]' => 'assets/testimg/poolchairs.jpg'
	);
	
	$reply = $cb->statuses_updateWithMedia($params);
	*/

	$userTimeLine = (array) $cb->statuses_userTimeline();
	echo '<pre>', print_r($userTimeLine), '</pre>';



?>