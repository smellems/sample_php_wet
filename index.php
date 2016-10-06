<?php
	// Database connections and user check
	require_once(dirname(__FILE__) . "/includes/database.php");
	require_once(dirname(__FILE__) . "/includes/lock.php");

	// Check language
	require_once(dirname(__FILE__) . "/includes/lang.php");

	// Include texts and header
	require_once(dirname(__FILE__) . "/includes/text/" . $lang . ".php");

	$pageTitle = $arrTxt['title'];
	require_once(dirname(__FILE__) . "/includes/header.php");

	// Content Start
	// Content end

	// Include footer
	$lastmod = getlastmod();
	require_once(dirname(__FILE__) . "/includes/footer.php");
