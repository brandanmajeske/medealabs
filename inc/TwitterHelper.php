<?php 

require_once('libraries/codebird.php');

class TwitterHelper {


	public static function tweet_it($post_data){

		Codebird::setConsumerKey('bRBf6HXWy80oKlZImw2B8A','2TScn4tEcaKcHXekxSDWlVzQrUtWuMBFkQqyOvgAk');
		$cb = Codebird::getInstance();

		$cb->setToken('383326679-XIgNYymbgyzELmep16EbSLr8xlvWBmuO4CT76wOo', 'CjuPclaOSP1gFPN5nranp5Mj1SQwzjER2zljeMlvT7Y');

		echo '<pre>',print_r($post_data, true),'</pre>';


		$status = 'status='.$post_data['post_title'].' '.$post_data['post_text'];

		echo '<pre>',print_r($status, true),'</pre>';

		
		//$reply = (array) $cb->statuses_update($status);

		//echo '<pre>',print_r($reply, true),'</pre>';


	}// end tweet_it
	
} // end TwitterHelper