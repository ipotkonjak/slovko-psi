<?php
//Iva Potkonjak 19/0301


class TestGost extends \CodeIgniter\Test\CIUnitTestCase {
    
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
        $result = $this->call('get', 'Gost/index');
        $result->assertOK();
    }
    
    public function testIgra() {
        $result = $this->call('get', 'Gost/igra');
        $result->assertOK();
    }
    
    public function testLogin() {
        $result = $this->call('get', 'Gost/login');
        $result->assertOK();
        //echo var_dump($result);
    }
    
    public function testRegistracija() {
        $result = $this->call('get', 'Gost/registracija');
        $result->assertOK();
    }
    
    public function testLoginSubmitNepostojeciKorisnik() {
        $result = $this->call('post', '/Gost/loginRequest', [
            'korisnickoIme' => 'iva1',
            'sifra' => '123'
        ]);
        $result->assertOK();
        
        //echo var_dump($result);
        $result->assertSee("Корисник не постоји");

    }
    
    public function testLoginSubmitLosaSifra() {
        $result = $this->call('post', 'Gost/loginRequest', [
            'korisnickoIme' => 'iva',
            'sifra' => '1234'
        ]);
        $result->assertOK();
        $result->assertSee("Погрешна лозинка");
    }
    
    public function testLoginSubmitPraznoKorIme() {
        $result = $this->call('post', 'Gost/loginRequest', [
            'korisnickoIme' => '',
            'sifra' => '123'
        ]);
        $result->assertOK();
        $result->assertSee("Унесите корисничко име");
    }
    
    public function testLoginSubmitPraznaSifra() {
        $result = $this->call('post', 'Gost/loginRequest', [
            'korisnickoIme' => 'iva',
            'sifra' => ''
        ]);
        $result->assertOK();
        $result->assertSee("Унесите лозинку");
    }
    
    public function testLoginSubmitSuspendovan() {
        $result = $this->call('post', 'Gost/loginRequest', [
            'korisnickoIme' => 'nikola',
            'sifra' => '123'
        ]);
        $result->assertOK();
        $result->assertSee("Ваш налог је суспендован!");
    }
    
    public function testLoginSubmitUspeh() {
        $result = $this->call('post', 'Gost/loginRequest', [
            'korisnickoIme' => 'iva',
            'sifra' => '123'
        ]);
        //echo var_dump($result);
        $result->assertOK();
        $result->assertRedirectTo('Admin/index');
    }
    
    public function testRegisterZauzetoKorisnicko() {
        $result = $this->call('post', 'Gost/registracijaRequest', [
            'korisnickoIme' => 'iva',
            'sifra' => '123',
            'ime' => 'iva',
            'prezime' => 'iva',
            'mejl' => 'iva@mejl.com',
            'ponovljenaSifra' => '123'
        ]);
        //echo var_dump($result);
        $result->assertOK();
        $result->assertSee('Корисничко име је заузето.');
    }
    
    public function testRegisterNepoklapajuceSifre() {
        $result = $this->call('post', 'Gost/registracijaRequest', [
            'korisnickoIme' => 'iva1',
            'sifra' => '123',
            'ime' => 'iva',
            'prezime' => 'iva',
            'mejl' => 'iva@mejl.com',
            'ponovljenaSifra' => '1234'
        ]);
        //echo var_dump($result);
        $result->assertOK();
        $result->assertSee('Лозинка и поновљена лозинка се не поклапају.');
    }
    
    /*public function testRegisterUspeh() {
        $result = $this->call('post', 'Gost/registracijaRequest', [
            'korisnickoIme' => 'kaca1',
            'sifra' => '123',
            'ime' => 'iva',
            'prezime' => 'iva',
            'mejl' => 'iva@mejl.com',
            'ponovljenaSifra' => '123'
        ]);
        //echo var_dump($result);
        $result->assertOK();
        $result->assertRedirectTo('Korisnik/index');
    }*/
}

