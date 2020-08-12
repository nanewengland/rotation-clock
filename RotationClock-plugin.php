<?php
/*
Plugin Name: Rotation Clock Image
Author: Patrick J NERNA
Description: This plugin will automatically display the current areas rotation image on a page, Simply add [rotationclock] shortcode to your page.
Version: 1.1
Install: Drop this directory into the "wp-content/plugins/" directory and activate it.
*/
/* Disallow direct access to the plugin file */
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('Sorry, but you cannot access this page directly.');
}

function rotation_clock_func($atts)
{

    $dir = plugin_dir_url(__FILE__);

    date_default_timezone_set("America/New_York");

    $month = date("m");
    $year_date = date("Y");
    $day = date("d");

    $second_sat = gmdate('j', strtotime('second saturday of this month'));
    $second_sun = gmdate('j', strtotime('second sunday of this month'));
    $third_sat = gmdate('j', strtotime('third saturday of this month'));
    $third_sun = gmdate('j', strtotime('third sunday of this month'));

    if (($year_date % 2) == 0) {
        $year = "even";
    } else {
        $year= "odd";
    }

    if ($month==12 && $year=="odd" && ($day > $second_sun) || $month==1 && $year=="even" || $month==2 && $year=="even" && ($day <= $third_sun)) {
        $pic = $dir . "img/WesternMass.jpg";             # February Even Years
    } elseif ($month==2 && $year=="even" && ($day > $third_sun) || $month==3 && $year=="even" || $month==4 && $year=="even" && ($day <= $second_sun)) {
        $pic = $dir . "img/GreaterProvidence.jpg";       # April Even Years
    } elseif ($month==4 && $year=="even" && ($day > $second_sun) || $month==5 && $year=="even" || $month==6 && $year=="even" && ($day <= $second_sun)) {
        $pic = $dir . "img/Boston.jpg";                  # June Even Years
    } elseif ($month==6 && $year=="even" && ($day > $second_sun) || $month==7 && $year=="even" || $month==8 && $year=="even" && ($day <= $second_sun)) {
        $pic = $dir . "img/CentralMass.jpg";             # August Even Years
    } elseif ($month==8 && $year=="even" && ($day > $second_sun) || $month==9 && $year=="even" || $month==10 && $year=="even" && ($day <= $second_sun)) {
        $pic = $dir . "img/Nantucket.jpg";               # October Even Years
    } elseif ($month==10 && $year=="even" && ($day > $second_sun) || $month==11 && $year=="even" || $month==12 && $year=="even" && ($day <= $second_sun)) {
        $pic = $dir . "img/SouthShore.jpg";              # December Even Years
    } elseif ($month==12 && $year=="even" && ($day > $second_sun) || $month==1 && $year=="odd" || $month==2 && $year=="odd" && ($day <= $second_sun)) {
        $pic = $dir . "img/NortheastMass.jpg";           # February Odd Years
    } elseif ($month==2 && $year=="odd" && ($day > $second_sun) || $month==3 && $year=="odd" || $month==4 && $year=="odd" && ($day <= $second_sun)) {
        $pic = $dir . "img/CapeCod.jpg";                 # April Odd Years
    } elseif ($month==4 && $year=="odd" && ($day > $second_sun) || $month==5 && $year=="odd" || $month==6 && $year=="odd" && ($day <= $second_sun)) {
        $pic = $dir . "img/SoutheastMass.jpg";           # June Odd Years
    } elseif ($month==6 && $year=="odd" && ($day > $second_sun) || $month==7 && $year=="odd" || $month==8 && $year=="odd" && ($day <= $second_sun)) {
        $pic = $dir . "img/MetroWest.jpg";               # August Odd Years
    } elseif ($month==8 && $year=="odd" && ($day > $second_sun) || $month==9 && $year=="odd" || $month==10 && $year=="odd" && ($day <= $second_sun)) {
        $pic = $dir . "img/Vineyard.jpg";                # October Odd Years
    } elseif ($month==10 && $year=="odd" && ($day > $second_sun) || $month==11 && $year=="odd" || $month==12 && $year=="odd" && ($day <= $second_sun)) {
        $pic = $dir . "img/GreaterWorcester.jpg";        # December Odd Years
    } else {
        $pic = $dir . "img/RotationClockNoHands.jpg";
    }

    echo "<img src=\"{$pic}\" style=\"float: right\">";
}

// create [rotationclock] shortcode
add_shortcode('rotationclock', 'rotation_clock_func');
