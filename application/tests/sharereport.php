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
	"name" => "Share Report on Yentna Social",
);
$web_driver = RemoteWebDriver::create(
	"https://johnbrian3:pzm5DMACirVbHoFLgqRH@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/login");


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
				$web_driver->get("https://plandstudios.com/project101/");
				sleep(2);
				$web_driver->executeScript("window.scrollBy(0,2000);");
				
				$homepagereportclick = $web_driver->findElement(WebDriverBy::cssSelector("#homepage-report-0"))->click();
				if($homepagereportclick){
					sleep(1);
					$sharereportbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#report-share-icon"))->click();
					if($sharereportbuttonclick){
						sleep(1);
						$yentnasharebuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#yentna_share_popup"))->click();
						if($sharereportbuttonclick){
							sleep(3);
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