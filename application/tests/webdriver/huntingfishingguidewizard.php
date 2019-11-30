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
	"name" => "Fishing-Hunting Guide Signup",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/");

try{
$signupbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#homepagesignupbutton"))->click();
if($signupbuttonclick){
	sleep(1);
	$usersignupbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#guidesignupbutton"))->click();
	if($usersignupbuttonclick){
		sleep(1);
		$web_driver->executeScript("window.scrollBy(0,1000);");
		$standardsubscriptionbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#standard-btn"))->click();
		if($standardsubscriptionbuttonclick){
			sleep(1);
			$registerwithemailbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#register-with-email"))->click();
			if($registerwithemailbuttonclick){
				sleep(1);
				$randomid = rand(10,1000);
				$input_firstname = $web_driver->findElement(WebDriverBy::cssSelector("#fname"))->sendKeys("Guide".$randomid);
				$input_lastname = $web_driver->findElement(WebDriverBy::cssSelector("#lname"))->sendKeys("Wizard");
				$input_companyname = $web_driver->findElement(WebDriverBy::cssSelector("#company_name"))->sendKeys("TestCompany");
				$input_email = $web_driver->findElement(WebDriverBy::cssSelector("#email"))->sendKeys("guidetestemail".$randomid."@gmail.com");
				$input_phone = $web_driver->findElement(WebDriverBy::cssSelector("#phone1"))->sendKeys("1234567890");
				$input_pass = $web_driver->findElement(WebDriverBy::cssSelector("#password"))->sendKeys("Passwor!");
				$input_passconfirm = $web_driver->findElement(WebDriverBy::cssSelector("#password_confirm"))->sendKeys("Passwor!");
				$dropdown_guidetype = $web_driver->findElement(WebDriverBy::cssSelector("#user_type"))->findElement(WebDriverBy::cssSelector("option[value='3']"))->click();
				$checkbox_tos = $web_driver->findElement(WebDriverBy::cssSelector("#guide-tos-checkbox"))->click();
				if($checkbox_tos){
					sleep(1);
					$guideregisterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector(".continue-button"))->click();
					if($guideregisterbuttonclick){
						sleep(3);
						$input_licenseno = $web_driver->findElement(WebDriverBy::cssSelector("#license_no"))->sendKeys("License#".$randomid);
						$input_about = $web_driver->findElement(WebDriverBy::cssSelector("#about"))->sendKeys("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
						$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
						if($submit_form_btn){
							sleep(2);
							$input_address = $web_driver->findElement(WebDriverBy::cssSelector("#address"))->sendKeys("Los Angeles, CA, USA");
							$input_experience = $web_driver->findElement(WebDriverBy::cssSelector("#exp"))->sendKeys("5");
							$input_dob = $web_driver->findElement(WebDriverBy::cssSelector("#dob"))->sendKeys("01-01-1985");
							$dropdown_timezone = $web_driver->findElement(WebDriverBy::cssSelector("#timezone"))->findElement(WebDriverBy::cssSelector("option[value='Etc/Greenwich']"))->click();
							// $input_daystart = $web_driver->findElement(WebDriverBy::cssSelector("#day_start"))->sendKeys("08:00:00");
							$input_daystart = $web_driver->executeScript("document.getElementById('day_start').setAttribute('value', '08:00:00');");
							// $input_dayend = $web_driver->findElement(WebDriverBy::cssSelector("#day_end"))->sendKeys("18:00:00");
							$input_dayend = $web_driver->executeScript("document.getElementById('day_end').setAttribute('value', '18:00:00');");
							$dropdown_preptime = $web_driver->findElement(WebDriverBy::cssSelector("#prep_time"))->findElement(WebDriverBy::cssSelector("option[value='15']"))->click();
							$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
							if($submit_form_btn){
								sleep(2);
								$image = file_get_contents('https://yentna.com/assets/images/logo.png');
								$image_put = file_put_contents("C:\\Users\\yentna.png", $image);
								if($image_put){
									$file_input = $web_driver->findElement(WebDriverBy::cssSelector("#my_file"));
									$file_input->setFileDetector(new LocalFileDetector());
									$file_input->sendKeys("C:\\Users\\yentna.png");
									// $input_file = $web_driver->findElement(WebDriverBy::xpath("//input[@name='file_check']"))->setAttribute("value", "yentna.png");
									$input_file = $web_driver->executeScript("document.getElementsByName('file_check')[0].setAttribute('value', 'yentna.png');");
									sleep(2);
									$rotaterightbutton = $web_driver->findElement(WebDriverBy::cssSelector("#right_rotate"))->click();
									if($rotaterightbutton){
										sleep(2);
										$rotateleftbutton = $web_driver->findElement(WebDriverBy::cssSelector("#left_rotate"))->click();
										if($rotateleftbutton){
											sleep(2);
											$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
											if($submit_form_btn){
												sleep(2);
												$file_input = $web_driver->findElement(WebDriverBy::cssSelector("#cert_1_file"));
												$file_input->setFileDetector(new LocalFileDetector());
												$file_input->sendKeys("C:\\Users\\yentna.png");
												// $web_driver->findElement(WebDriverBy::cssSelector("#left_menu"))->executeScript("window.scrollBy(0,1000);");
												sleep(2);
												$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
												if($submit_form_btn){
													sleep(2);
													$dropdown_triptype = $web_driver->findElement(WebDriverBy::cssSelector("#trip_type"))->findElement(WebDriverBy::cssSelector("option[value='2']"))->click();
													$input_triptitle = $web_driver->findElement(WebDriverBy::cssSelector("#title"))->sendKeys("Guide".$randomid." Hunting Trip");
													$input_tripdesc = $web_driver->findElement(WebDriverBy::cssSelector("#desc"))->sendKeys("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
													$input_tripwhattobring = $web_driver->findElement(WebDriverBy::cssSelector("#what_to_bring"))->sendKeys("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
													$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
													if($submit_form_btn){
														sleep(2);
														$radio_tripseason = $web_driver->findElement(WebDriverBy::cssSelector("#season_yes"))->click();
														if($radio_tripseason){
															$dropdown_seasonstartmonth = $web_driver->findElement(WebDriverBy::cssSelector(".season_start_month_0"))->findElement(WebDriverBy::cssSelector("option[value='2']"))->click();
															$dropdown_seasonstartdate = $web_driver->findElement(WebDriverBy::cssSelector(".season_start_date_0"))->findElement(WebDriverBy::cssSelector("option[value='15']"))->click();
															$dropdown_seasonendmonth = $web_driver->findElement(WebDriverBy::cssSelector(".season_end_month_0"))->findElement(WebDriverBy::cssSelector("option[value='3']"))->click();
															$dropdown_seasonenddate = $web_driver->findElement(WebDriverBy::cssSelector(".season_end_date_0"))->findElement(WebDriverBy::cssSelector("option[value='15']"))->click();
															$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
															if($submit_form_btn){
																sleep(2);
																$input_tripcost = $web_driver->findElement(WebDriverBy::cssSelector("#rate_np"))->sendKeys("750");
																$input_tripguest = $web_driver->findElement(WebDriverBy::cssSelector("#guest"))->sendKeys("5");
																$input_tripadditionguest = $web_driver->findElement(WebDriverBy::cssSelector("#additional_guest"))->sendKeys("5");
																$input_tripadditionguestcost = $web_driver->findElement(WebDriverBy::cssSelector("#additional_guest_cost"))->sendKeys("250");
																$input_triphours = $web_driver->findElement(WebDriverBy::cssSelector("#hours"))->sendKeys("1");
																$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																if($submit_form_btn){
																	sleep(2);
																	$radio_tripdeposit = $web_driver->findElement(WebDriverBy::cssSelector("#deposit_yes"))->click();
																	sleep(1);
																	$radio_tripdeposit = $web_driver->findElement(WebDriverBy::cssSelector("#deposit_no"))->click();
																	$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																	if($submit_form_btn){
																		sleep(2);
																		$radio_tripmultiple = $web_driver->findElement(WebDriverBy::cssSelector("#multiple_yes"))->click();
																		if($radio_tripmultiple){
																			$button_addmultiple = $web_driver->findElement(WebDriverBy::cssSelector(".durationbuttonnew"))->click();
																			if($button_addmultiple){
																				$input_tripmulhours = $web_driver->findElement(WebDriverBy::cssSelector("[name='hours[]']"))->sendKeys("2");
																				$input_tripmulcost = $web_driver->findElement(WebDriverBy::cssSelector("[name='rate[]']"))->sendKeys("1000");
																				$input_tripmuladditionguestcost = $web_driver->findElement(WebDriverBy::cssSelector("[name='additional_guest_cost[]']"))->sendKeys("300");
																				// $web_driver->findElement(WebDriverBy::cssSelector("#left_menu"))->executeScript("window.scrollBy(0,1000);");
																				$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																				if($submit_form_btn){
																					sleep(2);
																					$dropdown_species = $web_driver->findElement(WebDriverBy::xpath("//ul[@class='chosen-choices']"))->click();
																					$dropdown_clickoption = $web_driver->findElement(WebDriverBy::xpath("//li[@data-option-array-index='0']"))->click();
																					$dropdown_species = $web_driver->findElement(WebDriverBy::xpath("//ul[@class='chosen-choices']"))->click();
																					$dropdown_clickoption = $web_driver->findElement(WebDriverBy::xpath("//li[@data-option-array-index='1']"))->click();
																					$checkbox_vehicle = $web_driver->findElement(WebDriverBy::xpath("//input[@value='Helicopter']"))->click();
																					$checkbox_weapon = $web_driver->findElement(WebDriverBy::xpath("//input[@value='Pistol']"))->click();
																					$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																					if($submit_form_btn){
																						sleep(2);
																						$input_address = $web_driver->findElement(WebDriverBy::cssSelector("#address"))->sendKeys("Los Angeles, CA, USA");
																						$button_clickshowaddress = $web_driver->findElement(WebDriverBy::xpath("//a[@id='show_on_map']"))->click();
																						sleep(3);
																						$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																						if($submit_form_btn){
																							sleep(2);
																							$input_boatname = $web_driver->findElement(WebDriverBy::cssSelector("#name"))->sendKeys("Guide".$randomid." Boat");
																							$input_boathlength = $web_driver->findElement(WebDriverBy::cssSelector("#area"))->sendKeys("2120");
																							$input_boathlength = $web_driver->findElement(WebDriverBy::cssSelector("#desc"))->sendKeys("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
																							$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																							if($submit_form_btn){
																								sleep(2);
																								$file_input = $web_driver->findElement(WebDriverBy::cssSelector("#my_file"));
																								$file_input->setFileDetector(new LocalFileDetector());
																								$file_input->sendKeys("C:\\Users\\yentna.png");
																								$input_file = $web_driver->executeScript("document.getElementsByName('file_check')[0].setAttribute('value', 'yentna.png');");
																								sleep(2);
																								// if($input_file){
																									$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																									if($submit_form_btn){
																										sleep(2);
																										$button_openphotomanager = $web_driver->findElement(WebDriverBy::cssSelector("#open_manager_btn"))->click();
																										sleep(2);
																										if($button_openphotomanager){
																											$image = file_get_contents('https://yentna.com/assets/images/yentna-wizard-right.jpg');
																											$image_put = file_put_contents("C:\\Users\\yentna-wizard-right.jpg", $image);
																											sleep(1);
																											$file_input = $web_driver->findElement(WebDriverBy::cssSelector("#file_input"));
																											$file_input->setFileDetector(new LocalFileDetector());
																											$file_input->sendKeys("C:\\Users\\yentna-wizard-right.jpg");
																											sleep(8);
																											$button_closephotomanager = $web_driver->findElement(WebDriverBy::cssSelector(".photo_manager_close"))->click();
																											sleep(2);
																											if($button_closephotomanager){
																												$submit_form_btn = $web_driver->findElement(WebDriverBy::cssSelector("#submit-form-btn"))->click();
																												if($submit_form_btn){
																													sleep(2);
																													$button_openphotomanager = $web_driver->findElement(WebDriverBy::cssSelector("#open_manager_btn"))->click();
																													sleep(2);
																													// $button_opencropper = $web_driver->findElement(WebDriverBy::cssSelector(".image_div_img_bg img"))->click();
																													$imgid = $web_driver->findElement(WebDriverBy::xpath("//img[@class='cropper_image']"))->getAttribute('data-imgid');
																													$img = $web_driver->findElement(WebDriverBy::xpath("//img[@class='cropper_image']"))->getAttribute('data-img');
																													$web_driver->executeScript("open_cropper('".$img."','".$imgid."');");
																													sleep(5);
																													$button_openphotomanager = $web_driver->findElement(WebDriverBy::cssSelector("#done_crop_new"))->click();
																													sleep(3);
																													$button_openphotomanager = $web_driver->findElement(WebDriverBy::cssSelector("#finish"))->click();
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
								}
							}
						}
					}
				}
			}
			
		}

	}
}
}catch(Exception $e){
	// echo "<pre>";print_r($e);echo "</pre>";
	$web_driver->quit();
}
print $web_driver->getTitle();
$web_driver->quit();
?>