<?php
require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\LocalFileDetector;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\WebDriverBy;

$caps = array(
	"browser" => "Chrome",
	"browser_version" => "71.0",
	"os" => "Windows",
	"os_version" => "10",
	"resolution" => "2048x1536",
	"deviceOrientation" => "landscape",
	"size" => "maximize",
	"networkLogs" => true,
	"name" => "Trip Checkout Page",
);
$web_driver = RemoteWebDriver::create(
	"https://johnbrian3:pzm5DMACirVbHoFLgqRH@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/search/trip/fishing/fishy-stripshow");
date_default_timezone_set('UTC');
$random_date = rand(10,28);
$thismonth = date('m');	if(intval($thismonth) < 10){ $thismonth = '0'.intval($thismonth); }

$cookieconsent_accept = $web_driver->findElement(WebDriverBy::id("cookieconsent_accept"))->click();
if($cookieconsent_accept){
	sleep(1);
	$calendar_button = $web_driver->findElement(WebDriverBy::id("open-calendar-button"))->click();
	if($calendar_button){
		sleep(1);
		$calendar_date = $web_driver->findElement(WebDriverBy::id("date-".$random_date."-".$thismonth."-2019"))->click();
		if($calendar_date){
			sleep(1);
			$time_dropdown = $web_driver->findElement(WebDriverBy::id('cal-trip-duration-input'))->findElement(WebDriverBy::cssSelector("option[value='320']"))->click();
			if($time_dropdown){
				sleep(1);
				$guest_dropdown = $web_driver->findElement(WebDriverBy::id('cal-guest-input'))->findElement(WebDriverBy::cssSelector("option[value='1']"))->click();
				if($guest_dropdown){
					sleep(1);
					// $request_booking_button = $web_driver->findElement(WebDriverBy::id("cal-request-booking-btn"));
					$request_booking_button = $web_driver->findElement(WebDriverBy::cssSelector("#cal-request-booking-btn"))->click();
					if($request_booking_button){
						sleep(2);
						// $request_booking_button->click();
					}
				}
			}
		}
	}
}
print $web_driver->getTitle();
$web_driver->quit();
?>