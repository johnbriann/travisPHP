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
	"name" => "Guide New Report",
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
				$reportbuttonnavclick = $web_driver->findElement(WebDriverBy::cssSelector("#view_report_tour a"))->click();
				if($reportbuttonnavclick){
					sleep(1);
					$addreportbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#addreportbutton"))->click();
					if($reportbuttonnavclick){
						sleep(1);
						$image = file_get_contents('https://yentna.com/assets/images/logo.png');
						$image_put = file_put_contents($_SERVER['DOCUMENT_ROOT'].'\\sample.png', $image);
						if($image_put){
							$enter_report_title = $web_driver->findElement(WebDriverBy::cssSelector("#report_title"))->sendKeys("John");
							$enter_address = $web_driver->findElement(WebDriverBy::cssSelector("#report_address"))->sendKeys("Freeway Drive, Mount Vernon, WA, USA");
							// $addreportbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#report_pic"))->sendKeys(@$_SERVER['DOCUMENT_ROOT'].'\\sample.png');
							$file_input = $web_driver->findElement(WebDriverBy::cssSelector("#report_pic"));
							$file_input->setFileDetector(new LocalFileDetector());
							$file_input->sendKeys("C:\\Users\\sample.png");
							
							$enter_desc = $web_driver->findElement(WebDriverBy::cssSelector("#report_desc"))->sendKeys("This is a test report");
							$addreportsubmitbuttonclick = $web_driver->findElement(WebDriverBy::cssSelector("#addreportsubmitbutton"))->click();
							if($addreportsubmitbuttonclick){
								// sleep(1);
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