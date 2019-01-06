<?php
/*
Plugin Name: Rotation Clock Image
Author: Patrick J NERNA
Description: This plugin will automatically display the current areas rotation image on a page, Simply add [rotationclock] shortcode to your page.
Version: 1.0
Install: Drop this directory into the "wp-content/plugins/" directory and activate it.
*/
/* Disallow direct access to the plugin file */
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	die('Sorry, but you cannot access this page directly.');
}

function rotationclock_func( $atts ){

	$dir = plugin_dir_url(__FILE__);

	date_default_timezone_set("America/New_York");

	$month = date("m");
	$yeardate = date("Y");
	$day = date("d");
	
	$secondsat = date('d',strtotime('Second Saturday '.date('F o', @mktime(0,0,0, $month, 1, $yeardate))));
	$secondsun = $secondsat +1;
		
	$thirdsat = date('d',strtotime('Third Saturday '.date('F o', @mktime(0,0,0, $month, 1, $yeardate))));
	$thirdsun = $thirdsat +1;

	if (($yeardate % 2) == 0){
		$year = "even";
	}
	else {
		$year= "odd";
	}

	if ( $month==12 && $year=="odd" && ($day > $secondsun) || $month==1 && $year=="even" || $month==2 && $year=="even" && ($day <= $thirdsun) ) {
		$pic = $dir . "img/WesternMass.jpg";
	}

	else if ( $month==2 && $year=="even" && ($day > $thirdsun) || $month==3 && $year=="even" || $month==4 && $year=="even" && ($day <= $secondsun) ) {
		$pic = $dir . "img/SouthShore.jpg";
	}

	else if ( $month==4 && $year=="even" && ($day > $secondsun) || $month==5 && $year=="even" || $month==6 && $year=="even" && ($day <= $secondsun) ) {
		$pic = $dir . "img/Boston.jpg";
	}

	else if ( $month==6 && $year=="even" && ($day > $secondsun) || $month==7 && $year=="even" || $month==8 && $year=="even" && ($day <= $secondsun) ) {
		$pic = $dir . "img/PioneerValley.jpg";
	}

	else if ( $month==8 && $year=="even" && ($day > $secondsun) || $month==9 && $year=="even" || $month==10 && $year=="even" && ($day <= $secondsun) ) {
		$pic = $dir . "img/NortheastMass.jpg";
	}

	else if ( $month==10 && $year=="even" && ($day > $secondsun) || $month==11 && $year=="even" || $month==12 && $year=="even" && ($day <= $secondsun) ) {
		$pic = $dir . "img/MetroWest.jpg";
	}

	else if ( $month==12 && $year=="even" && ($day > $secondsun) || $month==1 && $year=="odd" || $month==2 && $year=="odd" && ($day <= $secondsun) ) {
		$pic = $dir . "img/GreaterWorcester.jpg";
	}

	else if ( $month==2 && $year=="odd" && ($day > $secondsun) || $month==3 && $year=="odd" || $month==4 && $year=="odd" && ($day <= $secondsun) ) {
		$pic = $dir . "img/IslandsAlt.jpg"; 
	}

	else if ( $month==4 && $year=="odd" && ($day > $secondsun) || $month==5 && $year=="odd" || $month==6 && $year=="odd" && ($day <= $secondsun) ) {
		$pic = $dir . "img/SoutheastMass.jpg";
	}

	else if ( $month==6 && $year=="odd" && ($day > $secondsun) || $month==7 && $year=="odd" || $month==8 && $year=="odd" && ($day <= $secondsun) ) {
		$pic = $dir . "img/CentralMass.jpg";
	}

	else if ( $month==8 && $year=="odd" && ($day > $secondsun) || $month==9 && $year=="odd" || $month==10 && $year=="odd" && ($day <= $secondsun) ) {
		$pic = $dir . "img/CapeCod.jpg";
	}

	else if ( $month==10 && $year=="odd" && ($day > $secondsun) || $month==11 && $year=="odd" || $month==12 && $year=="odd" && ($day <= $secondsun) ) {
		$pic = $dir . "img/GreaterProvidence.jpg"; 
	}

	else {
		$pic = $dir . "img/RotationClockNoHands.jpg";
	}

	echo "<img src=\"{$pic}\" style=\"float: right\">";

}

// create [rotationclock] shortcode
add_shortcode( 'rotationclock', 'rotationclock_func' );
?>