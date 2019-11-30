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
	"name" => "Stripe Bank Account Form",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/login");


$type_email = $web_driver->findElement(WebDriverBy::cssSelector("#email_login"))->sendKeys("mark.hanson9888@gmail.com");
if($type_email){
	$submit_user = $web_driver->findElement(WebDriverBy::cssSelector("#login-me"))->click();
	if($submit_user){
		sleep(2);
		$type_password = $web_driver->findElement(WebDriverBy::cssSelector("#password_login"))->sendKeys("Passwor!");
		if($type_password){
			$submit_pass = $web_driver->findElement(WebDriverBy::cssSelector("#login-me"))->click();
			if($submit_pass){
				sleep(1);
				$wallet_button_click = $web_driver->findElement(WebDriverBy::cssSelector("#view_wallet_tour a"))->click();
				if($wallet_button_click){
					sleep(1);
					$update_stripe_button_click = $web_driver->findElement(WebDriverBy::cssSelector("#update-stripe-button"))->click();
					if($update_stripe_button_click){
						sleep(1);
						/*--- update stripe page ---*/
						$enter_business_name = $web_driver->findElement(WebDriverBy::cssSelector("#business_name"))->sendKeys("JohnDoeCompany");
						$enter_business_tax_id = $web_driver->findElement(WebDriverBy::cssSelector("#business_tax_id"))->sendKeys("12-3456789");
						$enter_first_name = $web_driver->findElement(WebDriverBy::cssSelector("#fname"))->sendKeys("Mark");
						$enter_last_name = $web_driver->findElement(WebDriverBy::cssSelector("#lname"))->sendKeys("Hanson");
						$enter_address = $web_driver->findElement(WebDriverBy::cssSelector("#address"))->sendKeys("3310 Old Gamber Road, 1233");
						$enter_city = $web_driver->findElement(WebDriverBy::cssSelector("#citi"))->sendKeys("Finksburg");
						$enter_state = $web_driver->findElement(WebDriverBy::cssSelector("#state"))->findElement(WebDriverBy::cssSelector("option[value='MD']"))->click();
						$enter_postal = $web_driver->findElement(WebDriverBy::cssSelector("#postal_code"))->sendKeys("21048");
						$enter_dob = $web_driver->findElement(WebDriverBy::cssSelector("#dob"))->sendKeys("01-01-1990");
						$enter_ss_number = $web_driver->findElement(WebDriverBy::cssSelector("#ss_number"))->sendKeys("3578");
						$enter_acc_name = $web_driver->findElement(WebDriverBy::cssSelector("#acc_holder_name"))->sendKeys("Mark Hanson");
						$enter_rounting_no = $web_driver->findElement(WebDriverBy::cssSelector("#routing_number"))->sendKeys("111000025");
						$enter_acc_no = $web_driver->findElement(WebDriverBy::cssSelector("#account_number"))->sendKeys("000123456789");
						$update_stripe_form_buttton = $web_driver->findElement(WebDriverBy::cssSelector("#submit_form_button"))->click();
						if($update_stripe_form_buttton){
							sleep(2);
							$enter_pass_code_from_email = $web_driver->findElement(WebDriverBy::cssSelector("#pass_code"))->sendKeys("x1a2z");
							$update_stripe_form_buttton = $web_driver->findElement(WebDriverBy::cssSelector("#authorize"))->click();
							if($update_stripe_form_buttton){
								sleep(3);
							}
						}
						/*--- update stripe page ---*/
					}
				}
			}
		}
	}
}
print $web_driver->getTitle();
$web_driver->quit();
?>