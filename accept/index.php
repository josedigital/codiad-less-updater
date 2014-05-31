<?php
	// $uploaddir = realpath('./') . '/';  // <-- for same directory this script is in
	$uploaddir = realpath('../') . '/site/templates/css/'; // <-- for css directory in pw templates directory
	
	$uploadfile = $uploaddir . basename($_FILES['file_contents']['name']);
	echo '<pre>';
		if (move_uploaded_file($_FILES['file_contents']['tmp_name'], $uploadfile)) {
		    echo "File is valid, and was successfully uploaded.\n";
		} else {
		    echo "Possible file upload attack!\n";
		    mail('your@email.add', 'Possible file upload attack!', 'somone is trying to reach this file: ' . realpath('./'));
		}
		echo 'Here is some more debugging info:';
		print_r($_FILES);
		echo "\n<hr />\n";
		print_r($_POST);
	echo "</pre>\n";