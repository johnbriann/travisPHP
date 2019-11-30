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
	"name" => "Calendar Attach Boat to Trip",
);
$web_driver = RemoteWebDriver::create(
	"https://johnbrian3:pzm5DMACirVbHoFLgqRH@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("http://webmatech.com/project101/login");


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
				$button_listingnavclick = $web_driver->findElement(WebDriverBy::cssSelector("#view_trip_tour a"))->click();
				if($button_listingnavclick){
					sleep(3);
					$button_boatlistingclick = $web_driver->findElement(WebDriverBy::cssSelector("#boats-listing-left-menu a"))->click();
					if($button_boatlistingclick){
						sleep(3);
						$button_firstboatattachclick = $web_driver->findElement(WebDriverBy::cssSelector("#boat-0"))->click();
						if($button_firstboatattachclick){
							sleep(1);
							$button_tripforboatclick = $web_driver->findElement(WebDriverBy::cssSelector(".trip-for-boat-1"))->click();
							if($button_tripforboatclick){
								sleep(1);
								$button_tripforboatclick = $web_driver->findElement(WebDriverBy::cssSelector(".trip-for-boat-0"))->click();
								if($button_tripforboatclick){
									sleep(2);
									$button_tripforboatclick = $web_driver->findElement(WebDriverBy::cssSelector(".trips-for-boat-close"))->click();
									if($button_tripforboatclick){
										sleep(2);
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