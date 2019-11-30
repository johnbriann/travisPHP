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
	"name" => "Trip Stripe Checkout",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/search/trip/fishing/fishy-stripshow");
date_default_timezone_set('UTC');
$random_date = rand(10,28);
$thismonth = date('m');	if(intval($thismonth) < 10){ $thismonth = '0'.intval($thismonth); }
sleep(1);
$cookieconsent_accept = $web_driver->findElement(WebDriverBy::cssSelector("#cookieconsent_accept"))->click();
if($cookieconsent_accept){
	sleep(1);
	$calendar_button = $web_driver->findElement(WebDriverBy::cssSelector("#open-calendar-button"))->click();
	if($calendar_button){
		sleep(1);
		$calendar_date = $web_driver->findElement(WebDriverBy::cssSelector("#date-".$random_date."-".$thismonth."-2019"))->click();
		if($calendar_date){
			sleep(1);
			$time_dropdown = $web_driver->findElement(WebDriverBy::cssSelector("#cal-trip-duration-input"))->findElement(WebDriverBy::cssSelector("option[value='320']"))->click();
			if($time_dropdown){
				sleep(1);
				$guest_dropdown = $web_driver->findElement(WebDriverBy::cssSelector("#cal-guest-input"))->findElement(WebDriverBy::cssSelector("option[value='1']"))->click();
				if($guest_dropdown){
					sleep(1);
					$request_booking_button = $web_driver->findElement(WebDriverBy::cssSelector("#cal-request-booking-btn"));
					if($request_booking_button){
						$web_driver->executeScript("window.scrollBy(0,800);");
						$request_booking_button_click = $request_booking_button->click();
						if($request_booking_button_click){
							sleep(2);
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
						}
					}
				}
			}
		}
	}
}
print $web_driver->getTitle();
$web_driver->quit();
?>