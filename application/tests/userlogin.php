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
	"name" => "User Login ",
);
$web_driver = RemoteWebDriver::create(
	"https://johnnybrian1:xEmBhGyQSEP7adERqx1k@hub-cloud.browserstack.com/wd/hub",
	$caps
);
$web_driver->manage()->window()->maximize();
$web_driver->get("https://yentna.com/login");

$element = $web_driver->findElement(WebDriverBy::id("email_login1"));
if($element){
	$element->sendKeys("mark.hanson9888@gmail.com");
	$submit_user = $web_driver->findElement(WebDriverBy::id("login-me"))->click();
	if($submit_user){
		sleep(5);
		$element2 = $web_driver->findElement(WebDriverBy::id("password_login"));
		if($element2){
			$element2->sendKeys("Passwor!");
			$submit_pass = $web_driver->findElement(WebDriverBy::id("login-me"))->click();
			if($submit_pass){
				sleep(2);
				$web_driver->get("https://yentna.com/guide/dashboard");
				
			}
		}
	}
}
print $web_driver->getTitle();
$web_driver->quit();
?>