# TEST PLAN ZA SSU MULTIPLAYER

Multiplayer režim igre koristi isti kod za igru pojedinačnog režima, te će u testovima biti akcenat na ostvarivanju 
konekcije sa drugim korisnikom i krajnjem rezultatu.

Rezultat se računa po formuli: 
- pobednik/nerešeno  
`(7 - brPokusaja) * 500 * (1 - 0.05 * vreme // 15)`
- poražen  
`(7 - brPokusaja) * 500 * (1 - 0.05 * vreme // 15) // 2`

### TP1 Uspešno pokretanje igre i pobeda
Preduslov: Korisnik je već registrovan, prvi je završio. 
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč pre protivnika.  
:white_check_mark: VT Sistem ispisuje "Čeka se da protivnik završi...".   
4. Kada protivnik završi prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Korisnik je pobednik.  
:white_check_mark: VT U "Pregledu profila" broj pobeda nije 0.

### TP2 Uspešno pokretanje igre i poraz
Preduslov: Korisnik je već registrovan, drugi je završio. 
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč nakon protivnika.
4. Prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Korisnik je poražen.   
:white_check_mark: VT U "Pregledu profila" broj poraza nije 0.

### TP3 Uspešno pokretanje igre i nerešen rezultat
Preduslov: Korisnik je već registrovan, nerešen ishod. 
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč nakon protivnika.
4. Prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Ishod je nerešen.  
:white_check_mark: VT U "Pregledu profila" broj nerešenih nije 0.


### TP4 Uspešno pokretanje igre i nasilni izlazak iz igre potivnika
Preduslov: Korisnik je već registrovan. 
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Kada se pojavi novi protivnik, pokreće se Multiplayer igra i ispisuje korisničko ime protivnika.
3. Korisnik pogađa reč.
4. Prikazuje se poruka sa rezultatom i pobednikom.   
:white_check_mark: VT Korisnik je pobednik.  
:white_check_mark: VT U "Pregledu profila" broj pobeda nije 0.

### TP5 Neuspešno pokretanje igre 
Preduslov: Korisnik je već registrovan.
1. Korisnik klikće dugme "Traži protivnika".  
:white_check_mark: VT Sistem ispisuje "Čeka se protivnik...".
2. Korisnik klikće odustani.  
:white_check_mark: VT Sistem zaustavlja traženje protivnika.


