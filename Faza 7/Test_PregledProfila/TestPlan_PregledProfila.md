# TEST PLAN ZA SSU RUKOVODJENJE KORISNICIMA
Koriscena je postojeca baza(baza_v2_popunjena.sql). Testira se funkcionalnost pregleda profila korisnika.

### Test1_SuspendovanjeKorisnika
Preduslov: Postoji korisnicki nalog 'iva' sa sifrom 123(postoji u postojecoj bazi).
1. Prijavljuje se na adminski nalog luka.  
2. Ulazi se na pregled profila.
Verifikaciona tacka: Odlazi se na stranicu za pregled profila korisnika.
