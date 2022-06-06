# TEST PLAN ZA SSU SINGLEPLAYER
Koriscena je drugacija baza od postojece(test_baza_singleplayer.sql), kako bi broj reci bio manji i testiranje lakse.

### Test0_PripremaZaTestove - Login
Priprema za ostatak testova, prijavljujemo se na postojeci nalog i on ostaje u sesiji za ostatak testova.

### Test1_PogodjenaRec
Preduslov: Korisnik je prijavljen i nalazi se u sesiji.
Unosi se svaka od 4 reci u bazi, i ocekivan rezultat je da tajna rec bude pogodjena.

### Test2_NepostojecaRec
Preduslov: Korisnik je prijavljen i nalazi se u sesiji.
Unosi se rec koja se ne nalazi u bazi, ocekuje se poruka da rec ne postoji.

### Test3_PromasenaRec
Preduslov: Korisnik je prijavljen i nalazi se u sesiji, randomly izabrana rec nije avion.
Unosi se rec koja nije izabrana od strane sistema(avion) 6 puta, ocekuje se da se ispise poruka koja tajna rec je bila u pitanju.
Posto sistem randomly bira rec, moze se desiti da test padne ali ako je ispunjen preduslov da izabrana rec nije avion test prolazi.

### Test4_PokusajKracaRec
Preduslov: Korisnik je prijavljen i nalazi se u sesiji.
Unosi se rec od 4 slova i pokusava da se unese. Assertuje se da je ostalo prvih 4 slova i peto prazno.

### Test5_PokusajDuzaRec
Preduslov: Korisnik je prijavljen i nalazi se u sesiji.
Pokusava da se unese rec od 6 slova. Assertuje se da su prvih 5 slova ostala kakva su bila i da se sesto slovo nigde ne pojavljuje.

### Test6_Brisanje
Preduslov: Korisnik je prijavljen i nalazi se u sesiji.
Unosi se rec od 5 slova, a zatim se brisu svih 5 slova i assertuje se da nisu vise unesena.