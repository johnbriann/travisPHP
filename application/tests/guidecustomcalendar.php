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
	"name" => "Calendar Custom Booking",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/login");


$random_date = rand(10,28);

$element = $web_driver->findElement(WebDriverBy::cssSelector("#email_login"));
if($element){
	$element->sendKeys("jcgalleries.testemail1@gmail.com");
	$submit_user = $web_driver->findElement(WebDriverBy::cssSelector("#login-me"))->click();
	if($submit_user){
		sleep(2);
		$element2 = $web_driver->findElement(WebDriverBy::cssSelector("#password_login"));
		if($element2){
			$element2->sendKeys("123456");
			$submit_pass = $web_driver->findElement(WebDriverBy::cssSelector("#login-me"))->click();
			if($submit_pass){
				sleep(2);
				try{
					$cookieconsent_accept = $web_driver->findElement(WebDriverBy::cssSelector("#cookieconsent_accept"))->click();
					if($cookieconsent_accept){
						sleep(1);
					}
				}catch(Exception $e){}
				$button_calendarnavclick = $web_driver->findElement(WebDriverBy::cssSelector("#view_calendar_tour a"))->click();
				if($button_calendarnavclick){
					sleep(3);
					$button_calendarnextmonthclick = $web_driver->findElement(WebDriverBy::cssSelector(".dhx_cal_next_button"))->click();
					if($button_calendarnextmonthclick){
						sleep(1);
						$button_calendardateclick = $web_driver->findElement(WebDriverBy::xpath("//td/div[text() = '".$random_date."']/following-sibling::div"))->click();
						if($button_calendardateclick){
							sleep(1);
							$button_calendarbookingclick = $web_driver->findElement(WebDriverBy::cssSelector("#booking-button"))->click();
							if($button_calendarbookingclick){
								sleep(2);
								$radio_calendarcustombookingclick = $web_driver->findElement(WebDriverBy::cssSelector(".outside-radio"))->click();
								if($radio_calendarcustombookingclick){
									sleep(1);
									$input_tripname = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_trip_id"))->sendKeys("Custom Trip for John Doe on ".$random_date);
									$input_tripamount = $web_driver->findElement(WebDriverBy::cssSelector("#outside_transaction_amount"))->sendKeys("120.00");
									$dropdown_tripduration = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_trip_duration"))->findElement(WebDriverBy::cssSelector("option[value='2']"))->click();
									if($dropdown_tripduration){
										sleep(2);
										$dropdown_triptime = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_trip_time"))->findElement(WebDriverBy::cssSelector("option[value='12:00']"))->click();
										if($dropdown_triptime){
											sleep(2);
											$dropdown_tripguest = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_trip_guests"))->findElement(WebDriverBy::cssSelector("option[value='2']"))->click();
											if($dropdown_tripguest){
												// sleep(2);
												$input_tripnotes = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_trip_comments"))->sendKeys("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
												$input_tripcustomername = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_customer_name"))->sendKeys("John Doe");
												$input_tripcustomeremail = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_customer_email"))->sendKeys("testcustomer".$random_date."@gmail.com");
												$input_tripcustomermobile = $web_driver->findElement(WebDriverBy::cssSelector("#outside_booking_customer_mobile"))->sendKeys("1234567890");
												$button_calendarbookingokay = $web_driver->findElement(WebDriverBy::cssSelector("#custom-booking-save-button"))->click();
												if($button_calendarbookingokay){
													sleep(3);
													$button_calendarbookingnotificationokay = $web_driver->findElement(WebDriverBy::cssSelector("#notification-form-button"))->click();
													if($button_calendarbookingokay){
														sleep(5);
													}
												}
												
											}
										}
									}
								}
							}
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