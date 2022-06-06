<?php
//Katarina Jocic 19/0014


class TestAdmin extends \CodeIgniter\Test\CIUnitTestCase {
    
    use \CodeIgniter\Test\DatabaseTestTrait;
    use \CodeIgniter\Test\FeatureTestTrait;
    
    protected $backupGlobals = FALSE;
    
    protected function setUp(): void {
        parent::setUp();
    }
    
    protected function tearDown(): void {
        parent::tearDown();
    }
    
    public function testIndex() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/index');
        $result->assertSee("SINGLEPLAYER");
    }
    
    public function testArcade() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/arcade');
        $result->assertSee("ARCADE");
    }
    
    public function testHardmode() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/hardmode');
        $result->assertSee("HARDMODE");
    }
    
    public function testLogout() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/logout');
        $result->assertRedirectTo('Gost/igra');
    }
    
    public function testPregled() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/pregled');
        $result->assertSee('Преглед профила');
    }
    
    public function testPrijavaGreske() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/prijavaGreske');
        $result->assertSee('Пријава грешке');
    }
    
    public function testGreskaSubmit() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/greskaSubmit');
        $result->assertSee('Успешно сте пријавили грешку!');
    }
    
    public function testPravila() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/pravila');
        $result->assertSee('Добродошли на игру Словко');
    }
    
    public function testRanglista() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/rangLista');
        $result->assertSee('РАНГ ЛИСТА');
    }
    
    public function testMultiplayer() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/multiplayer');
        $result->assertSee("MULTIPLAYER");
    }
    
    public function testRukovodjenje() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/rukovodjenje');
        $result->assertSee("Руковођење системом");
    }
    
    public function testPregledKorisnika() {
        $values = ['korisnickoIme' => 'uros'];
        $result = $this->withSession($values)->call('get', 'Admin/pregledKorisnika/svirka');
        $result->assertSee("Преглед корисника за обраду");
    }
    
//    public function testVipObrada() {
//        $values = ['korisnickoIme' => 'uros'];
//        $result = $this->withSession($values)->call('get', 'Admin/vipObrada/svirka');
//        $result->assertRedirectTo("Admin/rukovodjenje"); 
//    }
}

