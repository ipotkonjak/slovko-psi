# TEST PLAN ZA SSU LOGOVANJE

## Uspešan scenario 

### TP1 Uspešno logovanje 
Preduslov: Korisnik je već registrovan.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi odgovarajuću lozinku.
3. Korisnik klikće dugme "Prijavi se!"  
:white_check_mark: VT Korisnik je ulogovan na sistem.

## Neuspešan scenario 

### TP2 Neuspešno logovanje - loša šifra
1. Korisnik unosi korisničko ime.
2. Korisnik unosi pogrešnu lozinku.
3. Korisnik klikće dugme "Prijavi se!"  
:white_check_mark: VT Korisnik nije ulogovan na sistem.

### TP3 neuspešno logovanje - nepostojeći korisnik
1. Korisnik unosi pogrešno korisničko ime.
2. Korisnik unosi neku lozinku.
3. Korisnik klikće dugme "Prijavi se!"  
:white_check_mark: VT Korisnik nije ulogovan na sistem.

### TP4 neuspešno logovanje - suspendovan
Preduslov: Korisnik je suspendovan.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi neku lozinku.
3. Korisnik klikće dugme "Prijavi se!"  
:white_check_mark: VT Korisnik nije ulogovan na sistem.

### TP5 neuspešno logovanje - prazan korisnik
1. Korisnik ne korisničko ime.
2. Korisnik unosi neku lozinku.
3. Korisnik klikće dugme "Prijavi se!"  
:white_check_mark: VT Korisnik nije ulogovan na sistem.

### TP6 neuspešno logovanje - prazna šifra
1. Korisnik unosi korisničko ime.
2. Korisnik ne unosi lozinku.
3. Korisnik klikće dugme "Prijavi se!"  
:white_check_mark: VT Korisnik nije ulogovan na sistem.