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
	"name" => "Calendar Shared Booking with Group",
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
				// try{
					// $cookieconsent_accept = $web_driver->findElement(WebDriverBy::cssSelector("#cookieconsent_accept"))->click();
					// if($cookieconsent_accept){
						// sleep(1);
					// }
				// }catch(Exception $e){}
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
								sleep(1);
								$radio_calendarsharedbookingclick = $web_driver->findElement(WebDriverBy::cssSelector(".shared-radio"))->click();
								if($radio_calendarsharedbookingclick){
									sleep(1);
									$dropdown_tripname = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_trip_id"))->findElement(WebDriverBy::cssSelector("option[value='37']"))->click();
									if($dropdown_tripname){
										sleep(2);
										$dropdown_tripduration = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_trip_rates"))->findElement(WebDriverBy::cssSelector("option[value='320']"))->click();
										if($dropdown_tripduration){
											sleep(2);
											$button_calendarcashbookingclick = $web_driver->findElement(WebDriverBy::cssSelector(".custom_price_radio"))->click();
											$input_tripbaseprice = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_base_price"))->sendKeys("200.00");
											$input_tripadditionalguestprice = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_addtional_price"))->sendKeys("150.00");
											$dropdown_triptime = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_trip_time"))->findElement(WebDriverBy::cssSelector("option[value='12:00']"))->click();
											if($dropdown_triptime){
												// sleep(2);
												$dropdown_tripguest = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_trip_guests"))->findElement(WebDriverBy::cssSelector("option[value='2']"))->click();
												if($dropdown_tripguest){
													// sleep(2);
													$input_tripnotes = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_trip_comments"))->sendKeys("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");
													$input_tripcustomername = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_customer_name"))->sendKeys("John Doe");
													$input_tripcustomeremail = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_customer_email"))->sendKeys("testcustomer".$random_date."@gmail.com");
													$input_tripcustomermobile = $web_driver->findElement(WebDriverBy::cssSelector("#shared_booking_customer_mobile"))->sendKeys("1234567890");
													$button_calendarbookingokay = $web_driver->findElement(WebDriverBy::cssSelector("#shared-booking-save-button"))->click();
													if($button_calendarbookingokay){
														sleep(3);
														$button_calendarbookingnotificationokay = $web_driver->findElement(WebDriverBy::cssSelector("#notification-form-button"))->click();
														if($button_calendarbookingokay){
															$web_driver->executeScript("browserstack_function('testcustomer".$random_date."@gmail.com');");
															sleep(5);
															// $reload_page = $web_driver->get("https://plandstudios.com/project101/guide/calendar");
															// if($reload_page){
																// sleep(2);
																$button_calendarnextmonthclick = $web_driver->findElement(WebDriverBy::cssSelector(".dhx_cal_next_button"))->click();
																if($button_calendarnextmonthclick){
																	sleep(1);
																	$button_calendarbookingclick = $web_driver->findElement(WebDriverBy::cssSelector(".createcustomclass"))->click();
																	if($button_calendarbookingclick){
																		sleep(1);
																		$button_calendarbookingaddgroupclick = $web_driver->findElement(WebDriverBy::cssSelector(".add-group-to-booking"))->click();
																		if($button_calendarbookingaddgroupclick){
																			sleep(2);
																			$button_calendarbookingaddgroupbtnclick = $web_driver->findElement(WebDriverBy::cssSelector(".add-group-btn"))->click();
																			if($button_calendarbookingaddgroupbtnclick){
																				sleep(2);
																				$input_tripgroupname = $web_driver->findElement(WebDriverBy::cssSelector("#shared-name-10000000"))->sendKeys("John Doe Group 1");
																				$input_tripgroupemail = $web_driver->findElement(WebDriverBy::cssSelector("#shared-email-10000000"))->sendKeys("testgroup1@gmail.com");
																				$input_tripgroupmobile = $web_driver->findElement(WebDriverBy::cssSelector("#shared-phone-10000000"))->sendKeys("1234567890");
																				$input_tripgroupmobile = $web_driver->findElement(WebDriverBy::cssSelector("#shared-people-10000000"))->sendKeys("1");
																				// $input_trippeoplemobile = $web_driver->executeScript("document.getElementById('shared-people-10000000')[0].setAttribute('value', '3');");
																				$button_calendarbookingaddgrupsavebtn = $web_driver->findElement(WebDriverBy::cssSelector(".shared-save-btn"))->click();
																				if($button_calendarbookingaddgrupsavebtn){
																					sleep(3);
																				}
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