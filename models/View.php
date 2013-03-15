<?php

class View {

	public function show($template, $data = array()) {
		$templatePath = "views/${template}.inc";
		if (file_exists($templatePath)){
			
			$pageTitle = '';
			$subHeading = '';

			include $templatePath;
		}
	}


}