# TEST PLAN ZA SSU RUKOVODJENJE KORISNICIMA
Koriscena je postojeca baza(baza_v2_popunjena.sql). Testira se funkcionalnost suspendovanja korisnika.

### Test1_SuspendovanjeKorisnika
Preduslov: Postoji adminski nalog 'luka' sa sifrom 123(postoji u postojecoj bazi), ne postoji nalog sa korisnickim imenom 'suspendovani'.
Registruje se nalog sa korisnickim imenom suspendovani. Odjavljuje se. Prijavljuje se na adminski nalog luka. Ulazi se na rukovodjenje korisnicima.
Verifikaciona tacka: u korisnicima se nalazi nalog suspendovani. Suspenduje se nalog suspendovani. Odjavljuje se se naloga luka. Pokusava se prijava
na nalog suspendovani. Verifikaciona tacka: ispisuje se poruka vas nalog je suspendovan.
