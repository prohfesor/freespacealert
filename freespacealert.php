<?php

require_once('config.php');

$aFreeSpace = array();
foreach($aDisks as $disk){
	$aFreeSpace[$disk] = array(
			'Total' => disk_total_space( $disk ),
			'Free' => disk_free_space( $disk ),
			'%' => disk_free_space($disk) / disk_total_space($disk) *100 
	);	
}


$critical = false;
$stat = "";
foreach($aFreeSpace as $path=>$data){
	if($data['Free']<$minimumSpace || $data['%']<$mimimumPercent){
		$critical = true;		
	}
	$total = round( $data['Total'] /1024/1024);
	$free  = round( $data['Free'] /1024/1024);
	$stat .= "$path\t\t$total\t\t$free\t\t".round($data['%'], 2)."	\n";
}

$subject = "ALERT! Extremely LOW free space for server $server!";
$message = "
FREE SPACE ALERT!

This message has been sent to you to inform that free space on server
 *$server*
is critically low.
	
Please forward this message to responsible person ASAP and free some bytes, otherwise disastrous consequences can occur.

Disk space details:

Path   \t\tTotal Mb \t\tFree Mb \t\t%
-------\t\t---------\t\t--------\t\t-----
$stat

=====
Message was generated automatically by server.
Thank you.
";

if($critical){
	$to = implode(", ", $aEmails);
	echo "\n\n Free space CRITICAL! \n Emailing ".$to." \n\n";
	mail( $to, $subject, $message );	
} else {
	echo "\n\n Free space is OK \n\n";
}


//end
