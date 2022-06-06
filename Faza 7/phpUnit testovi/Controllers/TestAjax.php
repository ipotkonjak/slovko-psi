<?php
//Uros Mutavdzic 19/0378


class TestAjax extends \CodeIgniter\Test\CIUnitTestCase {
    
    use \CodeIgniter\Test\DatabaseTestTrait;
    use \CodeIgniter\Test\FeatureTestTrait;
    
    protected $backupGlobals = FALSE;
    
    protected function setUp(): void {
        parent::setUp();
    }
    
    protected function tearDown(): void {
        parent::tearDown();
    }
    
    public function testEvidencijaGreske() {
        $result = $this->call('post', 'Ajax/evidencijaGreske', [
            'admin' => 'iva',
            'idGreske' => '7'
        ]);
        $criteria = [
            'idP' => 7,
            'evidentirano' => 1
        ];
        $this->seeInDatabase("prijava_greske", $criteria);
    }
    
    /*public function testUkloniKorisnika() {
        $result = $this->call('post', 'Ajax/ukloniKorisnika', [
            'korime' => 'sladoled'
        ]);
        $criteria = [
            'username' => 'sladoled',
            'odobren' => 0
        ];
        $this->seeInDatabase("korisnik", $criteria);
    }*/
    
    public function testProveraReciDobra() {
        $result = $this->call('post', 'Ajax/proveraReci', [
            'word' => 'лопта',
        ]);
        $result->assertSee("true");
    }
    
    public function testProveraReciLosa() {
        $result = $this->call('post', 'Ajax/proveraReci', [
            'word' => 'ааааа',
        ]);
        $result->assertSee("false");
    }
    
    public function testGenerisiRec() {
        $result = $this->call('post', 'Ajax/generisiRec');
        $rec = json_decode($result->getJSON());
        $criteria = [
            'rec' => $rec
        ];
        $this->seeInDatabase("reci", $criteria);
    }
    
    /*public function testAzurirajRekord() {
        $result = $this->call('post', 'Ajax/azurirajRekord', [
            'username' => 'aleks',
            'result' => 11
        ]);
        $criteria = [
            'username' => 'aleks',
            'arcadeRecord' => 11
        ];
        $this->seeInDatabase("statistika", $criteria);
    }*/
    
}

