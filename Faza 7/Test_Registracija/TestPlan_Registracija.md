# TEST PLAN ZA SSU LOGOVANJE

## Uspešan scenario 

### TP1 Uspešna registracija
Preduslov: Korisnik sa unetim korisničkim imenom ne postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik je registrovan na sistem.

## Neuspešan scenario

### TP2 Neuspešna registracija - korisničko ime zauzeto
Preduslov: Korisnik sa unetim korisničkim imenom postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP3 Neuspešna registracija - korisničko ime prazno
1. Korisnik unosi lozinku.
2. Korisnik unosi ponovljenu lozinku.
3. Korisnik unosi ime.
4. Korisnik unosi prezime.
5. Korisnik unosi mejl adresu.
6. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP4 Neuspešna registracija - lozinka prazna
Preduslov: Korisnik sa unetim korisničkim imenom postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi ponovljenu lozinku.
3. Korisnik unosi ime.
4. Korisnik unosi prezime.
5. Korisnik unosi mejl adresu.
6. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP5 Neuspešna registracija - ponovljena lozinka prazna
Preduslov: Korisnik sa unetim korisničkim imenom postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ime.
4. Korisnik unosi prezime.
5. Korisnik unosi mejl adresu.
6. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP6 Neuspešna registracija - lozinka i ponovljena lozinka različite
Preduslov: Korisnik sa unetim korisničkim imenom postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku različitu od lozinke.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP7 Neuspešna registracija - ime prazno
Preduslov: Korisnik sa unetim korisničkim imenom ne postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP8 Neuspešna registracija - prezime prazno
Preduslov: Korisnik sa unetim korisničkim imenom ne postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### TP9 Neuspešna registracija - mejl prazan
Preduslov: Korisnik sa unetim korisničkim imenom ne postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.

## Neuspešan scenario

### T10 Neuspešna registracija - mejl u lošem formatu
Preduslov: Korisnik sa unetim korisničkim imenom ne postoji.
1. Korisnik unosi korisničko ime.
2. Korisnik unosi lozinku.
3. Korisnik unosi ponovljenu lozinku.
4. Korisnik unosi ime.
5. Korisnik unosi prezime.
6. Korisnik unosi mejl adresu.
7. Korisnik klikće dugme "Registruj se!".
:white_check_mark: VT Korisnik nije registrovan na sistem.