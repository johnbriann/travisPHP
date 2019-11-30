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
	"name" => "User Signup",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/");


$signupbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#homepagesignupbutton"))->click();
if($signupbuttonclick){
	sleep(1);
	$usersignupbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#usersignupbutton"))->click();
	if($usersignupbuttonclick){
		sleep(1);
		$randomid = rand(10,1000);
		$inputfirstname = $web_driver->findElement(WebDriverBy::cssSelector("#fname_customer"))->sendKeys("JohnTest");
		$inputlastname = $web_driver->findElement(WebDriverBy::cssSelector("#lname"))->sendKeys("DoeTest");
		$inputemail = $web_driver->findElement(WebDriverBy::cssSelector("#email_cus"))->sendKeys("testemail".$randomid."@gmail.com");
		$inputphone = $web_driver->findElement(WebDriverBy::cssSelector("#phone2"))->sendKeys("1234567890");
		$inputpass = $web_driver->findElement(WebDriverBy::cssSelector("#password_cus"))->sendKeys("Passwor!");
		$inputpassconfirm = $web_driver->findElement(WebDriverBy::cssSelector("#password_confirm_cus"))->sendKeys("Passwor!");
		$tos_checkbox = $web_driver->findElement(WebDriverBy::cssSelector("#userregistercheckboxlabel"))->click();
		if($tos_checkbox){
			sleep(1);
			$userregisterbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector(".registernewbutton"))->click();
			if($userregisterbuttonclick){
				sleep(3);
				$opencustomerdashboard = $web_driver->get("https://plandstudios.com/project101/customer/dashboard/");
				if($opencustomerdashboard){
					sleep(3);
					$cookieconsent_accept = $web_driver->findElement(WebDriverBy::cssSelector("#cookieconsent_accept"))->click();
					if($cookieconsent_accept){
						sleep(1);
						$viewcustomerprofilebuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#viewcustomerprofilebutton"))->click();
						if($viewcustomerprofilebuttonclick){
							sleep(1);
							$editcustomerprofilebuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#editcustomerprofilebutton"))->click();
							if($editcustomerprofilebuttonclick){
								sleep(1);
									$inputfirstname = $web_driver->findElement(WebDriverBy::cssSelector("#firstname"))->sendKeys("JohnTest 1");
									$inputlastname = $web_driver->findElement(WebDriverBy::cssSelector("#lastname"))->sendKeys("DoeTest 1");
									$inputemail = $web_driver->findElement(WebDriverBy::cssSelector("#address"))->sendKeys("Freeway Drive, Mount Vernon, WA, USA");
									$inputphone = $web_driver->findElement(WebDriverBy::cssSelector("#mobile"))->sendKeys("9987654321");
									$inputpass = $web_driver->findElement(WebDriverBy::cssSelector("#about"))->sendKeys("This is a test description for user signup process...");
									$web_driver->executeScript("window.scrollBy(0,800);");
									$savebutton = $web_driver->findElement(WebDriverBy::cssSelector(".savebtn"))->click();
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