<?php session_start(); ?>

<!doctype html>
<html lang="en">
	
	<head>
		
		<title>Simple Proof of Concept</title>
		<style>

			body {
				background: #f5f5f5;
				font-family: arial;
				color: #555;
				padding: 0;
				margin: 5px;
				width: 500px;
			}
			.tweet {
				padding-top: 5px;
				padding-left: 5px;
				margin: 5px;
				background: #ddd;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;
				border-bottom: 1px dotted #222;

			}

			.tweet h3 {
				color: #700000;
				padding: 0;
				margin: 0;
			}
			.source {
				padding: 0;
				margin: 0;
			}

			.text {
				padding: 0;
				margin: 0;
				color: #222;
				font: 1em/1.5 sans-serif;
			}
		</style>

	</head>

	<body>

	<h1>Proof of Concept</h1>
	<h2>Twitter API</h2>
	<p>The following posts are generated by my twitter account using the Twitter API.</p>
	<?php
	require_once('../libraries/codebird.php');
	Codebird::setConsumerKey('bRBf6HXWy80oKlZImw2B8A','2TScn4tEcaKcHXekxSDWlVzQrUtWuMBFkQqyOvgAk'); 
	$cb = Codebird::getInstance();
	$cb->setToken('383326679-XIgNYymbgyzELmep16EbSLr8xlvWBmuO4CT76wOo', 'CjuPclaOSP1gFPN5nranp5Mj1SQwzjER2zljeMlvT7Y');

	
	$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
	$utls = $cb->statuses_userTimeline();

	foreach($utls as $utl){

		if(isset($utl['source'])){
			echo '<div class="tweet">';
			echo '<h3>Twitter Status </h2>';
			echo '<h4 class="source">Source: '.$utl['source'].'<br />';
			echo '<p class="text">'.$utl['text'].'<br />'.$utl['user']['name'].'</p>';
			echo '</div>';	
		}

	}

?>
		
		
</body>

</html>




	

