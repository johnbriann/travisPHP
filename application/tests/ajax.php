<?php
require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
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
$web_driver->manage()->window()->maximize();
);
$web_driver->get("https://yentna.com/login");


// $element = $web_driver->findElement(WebDriverBy::name("q"));
// if($element) {
	// $element->sendKeys("Browserstack");
	// $element->submit();
// }
$element = $web_driver->findElement(WebDriverBy::id("email_login"));
if($element){
	$element->sendKeys("mark.hanson9888@gmail.com");
	$submit_user = $web_driver->findElement(WebDriverBy::id("login-me"))->click();
	if($submit_user){
		sleep(5);
		$element2 = $web_driver->findElement(WebDriverBy::id("password_login"));
		if($element2){
			$element2->sendKeys("Passwor!");
			$submit_pass = $web_driver->findElement(WebDriverBy::id("login-me"))->click();
		}
	}
}
print $web_driver->getTitle();
$web_driver->quit();
?>