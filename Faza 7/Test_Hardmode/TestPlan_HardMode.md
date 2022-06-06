# TEST PLAN ZA SSU HARDMODE

Za Hardmode režim igre biće testirano uspešno i neuspešno pogađanje reči, unos reči koja nije u bazi, unos reči koja ne sadrži slova koja smo otkrili u prethodnim pokušajima i one reči čija pogođena slova nisu na otkrivenom mestu.

### TP1 Uspešno pokretanje igre i pogođena jedna reč
Preduslov: Korisnik je već registrovan i reč za pogađanje je odmor.
1. Korisnik klikće dugme reč lopta
2. Korisnik klikće dugme "Unesi".
3. Korisnik unosi reč odmor.
4. Korisnik klikće dugme "Unesi".
:white_check_mark: VT Pojavljuje se poruka Svaka čast!

### TP2 Uspešno pokretanje igre i neuspešno pogađanje
Preduslov: Korisnik je već registrovan i reč za pogađanje nije oblak.
1. Korisnik 6 puta za redom unosi reč oblak.
:white_check_mark: VT Korisniku se ispisuje poruka koja nije Svaka čast!

### TP3 Uspešno pokretanje igre i unos reči koja nije u bazi
Preduslov: Korisnik je već registrovan i reč rampa nije u bazi.
1. Korisnik unosi reč rampa
:white_check_mark: VT Ispisuje se poruka da uneta reč nije o bazi, pokušaj nije prihvaćen.

### TP4 Uspešno pokretanje igre i unos reči koja ne poštuje mesta već otkrivenih slova
Preduslov: Korisnik je već registrovan i reč za pogađanje je odmor.
1. Korisnik unosi reč oblak.
2. Korisnik unosi reč lopta.
:white_check_mark: VT Korisnik dobija poruku da slovo O mora biti na prvom mestu.

### TP5 Uspešno pokretanje igre i unos reči koja ne poštuje koja su slova pronađena u reči
Preduslov: Korisnik je već registrovan i reč za pogađanje nije oblak, a ni sunce.
1. Korisnik unosi reč oblak.
2. Korisnik unosi reč sunce.
:white_check_mark: VT Korisnik dobija poruku da slovo O mora postojati u reči.