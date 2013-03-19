<?php

class View {

	public function show($template, $data = array(), $msg = null) {
		$templatePath = "views/${template}.inc";
		if (file_exists($templatePath)){
			
			$pageTitle = '';
			$subHeading = '';

			include $templatePath;
		}
	}


}