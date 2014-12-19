<?php

//critical limits, whatever reached first
$minimumSpace = 1 *1024 *1024 *1024; 	//bytes
$mimimumPercent = 1;				 	//%

//checked disk drives 
$aDisks = array('/', '/tmp');

//emailed details
$server = php_uname("n");
$aEmails = array('user1@domain1.org', 'user2@domain2.org');