# TEST PLAN ZA SSU ARCADE

Arcade režim igre koristi isti kod za igru pojedinačnog režima, te će u testovima biti akcenat na azuriranju broja pogođenih reči, proveri isticanja
vremena i prelasku na sledeću reč nakon 6 loših pokušaja.

### TP1 Uspešno pokretanje igre i pogođena jedna reč
Preduslov: Korisnik je već registrovan.
1. Korisnik klikće dugme "Započni igru!"
:white_check_mark: VT Pojavljuje se brojač pogođenih reči.
2. Korisnik unosi reč lopta.
3. Korisnik klikće dugme "Unesi".
:white_check_mark: VT Pojavljuje se brojač pogođenih reči i broj pogođenih je 1.

### TP2 Uspešno pokretanje igre i isteklo vreme
Preduslov: Korisnik je već registrovan.
1. Korisnik klikće dugme "Započni igru!"
:white_check_mark: VT Pojavljuje se brojač pogođenih reči.
2. Korisnik čeka da istekne 3 minuta.
:white_check_mark: VT Vreme na brojaču je isteklo.

### TP3 Uspešno pokretanje igre i 6 promasaja
Preduslov: Korisnik je već registrovan i reč nije lopta.
1. Korisnik klikće na dugme "Započni igru"
2. Korisnik 5 puta unosi reč lopta i klikće dugme "Unesi".
3. Korisnik unosi reč lopta.
:white_check_mark: VT Popunjeno prvo polje
:white_check_mark: VT Popunjeno poslednje polje
4. Korisnik klikće dugme "Unesi"
:white_check_mark: VT Prazno prvo polje
:white_check_mark: VT Prazno poslednje polje

### TP4 Uspešno pokretanje igre i unos nepostojeće reči
Preduslov: Korisnik je već registrovan.
1. Korisnik klikće dugme "Započni igru!"
2. Korisnik unosi nepostojeću reč.
:white_check_mark: VT Poppup da uneta reč nije u bazi.