<?php
require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\LocalFileDetector;
use Facebook\WebDriver\WebDriverBy;
$caps = array(
	"browser" => "Chrome",
	"browser_version" => "71.0",
	"os" => "Windows",
	"os_version" => "10",
	"resolution" => "2048x1536",
	"deviceOrientation" => "landscape",
	"size" => "maximize",
	// "name" => "Guide Signup"
	"name" => "Test"
);

$web_driver = RemoteWebDriver::create(
	"https://johnbrian2:MLRpKpxwL3MDH1MUYG6X@hub-cloud.browserstack.com/wd/hub",
	$caps
);

$web_driver->get("https://plandstudios.com/project101/test/wbtest");
$web_driver->manage()->window()->maximize();
// $allOptions = $web_driver->findElement(WebDriverBy::cssSelector(".image_div_img_bg img"))->getAttribute('data-id');
echo "<pre>";print_r($allOptions);echo "</pre>";
// $input_file = $web_driver->executeScript('abcd();');
// $web_driver->findElement(WebDriverBy::cssSelector(""))->click();
// $web_driver->findElement(WebDriverBy::cssSelector("#show_on_map"))->click();
// $allOptions = $web_driver->findElement(WebDriverBy::xpath("//a[@id='show_on_map']"))->click();
// $allOptions = $web_driver->findElement(WebDriverBy::xpath("//input[@class='other']"));
// $web_driver->findElement(WebDriverBy::cssSelector(".chosen-choices"))->click();
// $allOptions = $web_driver->findElement(WebDriverBy::xpath("//div[@class='pac-container']/div[@class='pac-item']/span[@class='pac-item-query']/span[@class='pac-matched']"))->click();
// $allOptions = $web_driver->findElement(WebDriverBy::xpath("//li[@data-option-array-index='1']"))->click();
// echo "<pre>";print_r($allOptions);echo "</pre>";
// $allOptions[0]->click();
// foreach ($allOptions as $option) {
	// $option->click();
  // echo "Value is:" . $option->getText()."<br />";
  // $option->click();
// }
sleep(2);
$web_driver->quit();
?>