<?php

/* 
 * the following lines are needed in init.js of the Less Compiler Plugin for Codiad:
 *
 *  // place around line 153 before:  -- return _this.codiad.message.success('Less compiled successfully.'); --
 *	var theurl = fileName.split('/').slice(0, -1).join('/') + '/update.php';
 *	this.jQuery.get(_this.workspaceUrl + theurl);
 *
 */


	$target_url = 'http://yourdomain.com/accept/index.php';
	
	// This needs to be the full path to the file you want to send.
	$file_name_with_full_path = realpath('./korova.css');

	// Get all CSS files in same directory
	$files = glob('./*.css');

	foreach($files as $file) {
		$file_name_with_full_path = realpath($file);
		 /* curl will accept an array here too.
		 * Many examples I found showed a url-encoded string instead.
		 * Take note that the 'key' in the array will be the key that shows up in the
		 * $_FILES array of the accept script. and the at sign '@' is required before the
		 * file name.
		 */
		
		$post = array('extra_info' => '123456','file_contents'=>'@'.$file_name_with_full_path);
	 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$target_url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		
		$result = curl_exec ($ch);
		
		curl_close ($ch);
		
		echo $result;
	   
		
	}