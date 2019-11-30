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
	"name" => "User/Guide Login ",
);
$web_driver = RemoteWebDriver::create(
	"https://colbyculbertson1:mmqj6tXgx8vqHSiPWZWM@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://plandstudios.com/project101/login");

$element = $web_driver->findElement(WebDriverBy::id("email_login"));
if($element){
	$element->sendKeys("jcgalleries.testemail1@gmail.com");
	$submit_user = $web_driver->findElement(WebDriverBy::id("login-me"))->click();
	if($submit_user){
		sleep(5);
		$element2 = $web_driver->findElement(WebDriverBy::id("password_login"));
		if($element2){
			$element2->sendKeys("123456");
			$submit_pass = $web_driver->findElement(WebDriverBy::id("login-me"))->click();
		}
	}
}
print $web_driver->getTitle();
$web_driver->quit();
?>