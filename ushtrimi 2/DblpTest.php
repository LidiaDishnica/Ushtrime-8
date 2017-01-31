<?php

class DblpTest extends PHPUnit_Framework_TestCase
{
       protected $driver;
    protected $session;

    protected function setUp()
    {
        
        //You can get the key and secret here: https://testingbot.com/members/user/edit
        $key = '7ed7acdf88b306184cc99627d3134d94';
        $secret = '6b6c2626432a096e6e6841d7972c734c';
        
        $testingBotApiUrl = "http://{$key}:{$secret}@hub.testingbot.com/wd/hub";
        
        $this->driver = new \Behat\Mink\Driver\Selenium2Driver('chrome',
            array("platform"=>"LINUX", "browserName"=>"chrome", "name" => "BehatTest"), $testingBotApiUrl);
        $this->session = new \Behat\Mink\Session($this->driver);
        $this->session->start();
    }
    public function testSearch()
    {
        $this->session->visit("https://duckduckgo.com/");
        
        $page = $this->session->getPage();
        
        $page->fillField('q', 'Klesti Hoxha');
        
        $page->find("css", "#search_button_homepage")->submit();
        
        $this->assertTrue($this->session->getPage()->hasContent("Klesti Hoxha at DuckDuckGo"));
    }
  public function testSearch2()
    {
        
        
        $this->session->visit("http://gjirafa.com/");
        
        $page = $this->session->getPage();
        
        $page->fillField('q', 'Klesti Hoxha');
        
        $this->assertTrue($this->session->getPage()->hasContent("Kerkim mbi Klesti Hoxha"));
    }
     public function tearDown()
    {
        $this->session->stop();
    }
    
}