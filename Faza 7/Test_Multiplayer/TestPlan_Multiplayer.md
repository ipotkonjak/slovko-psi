# TEST PLAN ZA SSU MULTIPLAYER

Multiplayer režim igre koristi isti kod za igru pojedinačnog režima, te će u testovima biti akcenat na ostvarivanju 
konekcije sa drugim korisnikom i krajnjem rezultatu.

Rezultat se računa po formuli: 
- pobednik/nerešeno  
`(7 - brPokusaja) * 500 * (1 - 0.05 * vreme // 15)`
- poražen  
`(7 - brPokusaja) * 500 * (1 - 0.05 * vreme // 15) // 2`

### TP1 Uspešno pokretanje igre i pobeda
Preduslov: Korisnik je već registrovan, prvi je završio. Preostalo vreme je 1:30 i pogodio je u 2. pokušaju.
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč pre protivnika.  
:white_check_mark: VT Sistem ispisuje "Čeka se da protivnik završi...".   
4. Kada protivnik završi prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Korisnik je pobednik.  
:white_check_mark: VT Korisnik je osvojio 2250 poena.  
:white_check_mark: VT U "Pregledu profila" prethodna statistika se menja za 2250.

### TP2 Uspešno pokretanje igre i poraz
Preduslov: Korisnik je već registrovan, drugi je završio. Preostalo vreme je 0:31 i pogodio je u 6. pokušaju.
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč nakon protivnika.
4. Prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Korisnik nije pobednik.  
:white_check_mark: VT Korisnik je osvojio 187 poena.  
:white_check_mark: VT U "Pregledu profila" prethodna statistika se menja za 187.

### TP3 Uspešno pokretanje igre i nerešen rezultat
Preduslov: Korisnik je već registrovan, nerešen ishod. Preostalo vreme je 1:50 i pogodili su u 1. pokušaju.
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč nakon protivnika.
4. Prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Ishod je nerešen.  
:white_check_mark: VT Oba korisnika su osvojila 3000 poena.  
:white_check_mark: VT U "Rang lista" prethodna statistika se menja za 3000 za oba korisnika.


### TP4 Uspešno pokretanje igre i nasilni izlazak iz igre potivnika
Preduslov: Korisnik je već registrovan. Preostalo vreme je 1:40 i pogađa reč u 1. pokušaju.
1. Korisnik klikće dugme "Traži protivnika".
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč.
4. Prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Korisnik je pobednik.  
:white_check_mark: VT Korisnik je osvojio 2850 poena.  
:white_check_mark: VT Protivnik je osvojio 0 poena.  
:white_check_mark: VT U "Rang lista" prethodna statistika se menja za 2850, a protivniku za 0.

### TP4 Neuspešno pokretanje igre 
Preduslov: Korisnik je već registrovan.
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Korisnik klikće odustani.  
:white_check_mark: VT Sistem zaustavlja traženje protivnika.


