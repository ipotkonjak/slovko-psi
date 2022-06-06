<?php
//Luka Hrvacevic 19/0353


class TestKorisnik extends \CodeIgniter\Test\CIUnitTestCase {
    
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
        $values = ['korisnickoIme' => 'aleks', 'vip' => 0];
        $result = $this->withSession($values)->call('get', 'Korisnik/index');
        $result->assertSee("SINGLEPLAYER");
    }
    
    public function testVIPIndex() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/index');
        $result->assertOK();
        $result->assertSee("Hardmode");
    }
    
    public function testArcade() {
        $values = ['korisnickoIme' => 'aleks', 'vip' => 0];
        $result = $this->withSession($values)->call('get', 'Korisnik/arcade');
        $result->assertSee("ARCADE");
    }
    
    public function testHardmode() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/hardmode');
        $result->assertSee("HARDMODE");
    }
    
    public function testLogout() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/logout');
        $result->assertRedirectTo('Gost/igra');
    }
    
    public function testPregled() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/pregled');
        $result->assertSee('Преглед профила');
    }
    
    public function testPrijavaGreske() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/prijavaGreske');
        $result->assertSee('Пријава грешке');
    }
    
    public function testGreskaSubmit() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/greskaSubmit');
        $result->assertSee('Успешно сте пријавили грешку!');
    }
    
    public function testPravila() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/pravila');
        $result->assertSee('Добродошли на игру Словко');
    }
    
    public function testRanglista() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/rangLista');
        $result->assertSee('РАНГ ЛИСТА');
    }
    
    public function testVIPZahtevBezPartija() {
        $values = ['korisnickoIme' => 'multi1', 'vip' => 0];
        $result = $this->withSession($values)->call('get', 'Korisnik/posaljiVipZahtev');
        $result->assertSee('Морате имати минимум 50 партија да бисте послали ВИП захтев!');
    }
    
    public function testVIPZahtevVecPoslat() {
        $values = ['korisnickoIme' => 'telma', 'vip' => 0];
        $result = $this->withSession($values)->call('get', 'Korisnik/posaljiVipZahtev');
        $result->assertSee('Већ сте послали ВИП захтев.');
    }
    
    /*public function testVIPZahtevUspesan() {
        $values = ['korisnickoIme' => 'aleks', 'vip' => 0];
        $result = $this->withSession($values)->call('get', 'Korisnik/posaljiVipZahtev');
        $result->assertSee('Успешно сте послали ВИП захтев.');
    }*/
    
    public function testMultiplayer() {
        $values = ['korisnickoIme' => 'petar', 'vip' => 1];
        $result = $this->withSession($values)->call('get', 'Korisnik/multiplayer');
        $result->assertSee("MULTIPLAYER");
    }
}

