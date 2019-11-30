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
	"name" => "Start to Booking",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/");

try{
	date_default_timezone_set('UTC');
	$random_date = rand(10,28);
	$thismonth = date('m');	if(intval($thismonth) < 10){ $thismonth = '0'.intval($thismonth); }
	$web_driver->executeScript("window.scrollBy(0,2800);");
	sleep(1);
	$californiabuttonclick = $web_driver->findElement(WebDriverBy::xpath("//li[@id='famous_california']"))->click();
	// $californiabuttonclick = $web_driver->executeScript("document.getElementById('famous_california').click();");
	if($californiabuttonclick){
		sleep(3);
		$morefilterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#more-filters"))->click();
		if($morefilterbuttonclick){
			sleep(1);
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Trolling']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Kite_Fishing']"))->click();
			$moretypesfilterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#types_btn"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Live_Bait']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Cocktail_Service']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Bait_and_Tackle']"))->click();
			$moretypesfilterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#service_btn"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Breakfast']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Professional_Video']"))->click();
			$web_driver->executeScript("document.getElementById('search-side-bar').scrollTop = 1000;");
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='GPSs']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Insurance_Option']"))->click();
			$moretypesfilterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#feature_btn"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Outriggers']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Top_Drive']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Fresh_Water_Tank']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Fish_Box']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Cabin']"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Kitchen']"))->click();
			$moretypesfilterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#facility_btn"))->click();
			$checkbox_fishing = $web_driver->findElement(WebDriverBy::xpath("//label[@for='Restroom']"))->click();
			// $web_driver->executeScript("document.getElementsByClass('side-bar').scrollBy(0,0);");
			$web_driver->executeScript("document.getElementById('search-side-bar').scrollTop = 0;");
			$morefilterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#more-filters"))->click();
			if($morefilterbuttonclick){
				sleep(1);
				$tripbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#tripid37"))->click();
				if($tripbuttonclick){
					sleep(5);
					$web_driver->executeScript("window.scrollBy(0,400);");
					$calendar_button = $web_driver->findElement(WebDriverBy::xpath("//button[@id='open-calendar-button']"))->click();
					if($calendar_button){
						sleep(1);
						// $calendarnextbutton = $web_driver->findElement(WebDriverBy::cssSelector("#cal-next"))->click();
						// if($calendar_button){
							// sleep(3);
							$calendar_date = $web_driver->findElement(WebDriverBy::cssSelector("#date-".$random_date."-".$thismonth."-2019"))->click();
							if($calendar_date){
								sleep(2);
								$time_dropdown = $web_driver->findElement(WebDriverBy::cssSelector('#cal-trip-duration-input'))->findElement(WebDriverBy::cssSelector("option[value='320']"))->click();
								if($time_dropdown){
									sleep(2);
									$guest_dropdown = $web_driver->findElement(WebDriverBy::cssSelector('#cal-guest-input'))->findElement(WebDriverBy::cssSelector("option[value='1']"))->click();
									if($guest_dropdown){
										sleep(2);
										// $request_booking_button = $web_driver->findElement(WebDriverBy::id("cal-request-booking-btn"));
										$web_driver->executeScript("window.scrollBy(0,800);");
										$request_booking_button = $web_driver->findElement(WebDriverBy::cssSelector("#cal-request-booking-btn"))->click();
										if($request_booking_button){
											sleep(2);
											// $web_driver->executeScript("window.scrollBy(0,800);");
											// $request_booking_button_click = $request_booking_button->click();
											// if($request_booking_button_click){
												// sleep(2);
												/*--- checkout page ---*/
												$enter_first_name = $web_driver->findElement(WebDriverBy::cssSelector("#first_name"))->sendKeys("John");
												$enter_last_name = $web_driver->findElement(WebDriverBy::cssSelector("#last_name"))->sendKeys("Does");
												$enter_email = $web_driver->findElement(WebDriverBy::cssSelector("#trip_email"))->sendKeys("john_doe@gmail.com");
												$enter_phone = $web_driver->findElement(WebDriverBy::cssSelector("#trip_phone"))->sendKeys("+923465054043");
												$tos_checkbox = $web_driver->findElement(WebDriverBy::cssSelector("#cancel_policy"))->click();
												if($tos_checkbox){
													$form_button_click = $web_driver->findElement(WebDriverBy::cssSelector("#form-button"))->click();
													if($form_button_click){
														sleep(2);
														// $web_driver->wait(5, 500)->until(
															// $web_driver->WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::cssSelector("#stripe-button"))
														// );
														$stripe_button = $web_driver->findElement(WebDriverBy::cssSelector("#stripe-button"))->click();
														sleep(2);
													}
												}
												/*--- checkout page ---*/
											// }
										}
									}
								}
							}
						// }
					}
				}
			}
		}
	}
	// $web_driver->quit();
}catch(Exception $e){
	// echo "<pre>";print_r($e->getmessage());echo "</pre>";
	$web_driver->quit();
}

print $web_driver->getTitle();
$web_driver->quit();
?>