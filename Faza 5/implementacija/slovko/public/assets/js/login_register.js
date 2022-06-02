//Iva Potkonjak 301/19 Luka Hrvacevic 353/19
let nizKorisnika = [
    {
        korisnickoIme : "admin",
        sifra : "123",
    },
    {
        korisnickoIme : "petar",
        sifra : "123",
    }
]

function resetujGreske() {
    document.getElementById("korisnickoIme").innerHTML = "";
    document.getElementById("sifra").innerHTML = "";
    document.getElementById("korisnickoImeGreska").innerHTML = "";
    document.getElementById("sifraGreska").innerHTML = "";
}

function prijava() {
    let korisnickoIme = document.getElementById("korisnickoIme").value;
    let sifra = document.getElementById("sifra").value;

    resetujGreske();

    for(let i = 0; i < nizKorisnika.length; i++) {
        if (korisnickoIme == nizKorisnika[i].korisnickoIme) {
            if (sifra == nizKorisnika[i].sifra) {
                resetujGreske();      
                if (korisnickoIme == "admin") window.location.href = "index.html";
                else window.location.href = "pregled_posle_login.html";
                        
                return;
            } 
            else {
                document.getElementById("sifraGreska").innerHTML = "Лозинка није исправна.";
                return;
            }
        }
    }
    document.getElementById("korisnickoImeGreska").innerHTML = "Корисничко име не постоји.";
}


function registracija() {
    let korisnickoIme = document.getElementById("korisnickoIme").value;
    let sifra = document.getElementById("sifra").value;
    let ponovljenaSifra = document.getElementById("ponovljenaSifra").value;
    let ime = document.getElementById("ime").value;
    let prezime = document.getElementById("prezime").value;
    let mejl = document.getElementById("mejl").value;

    if(sifra != ponovljenaSifra) {
        document.getElementById("sifraGreska").innerHTML = "Поља лозинке и поновљене лозинке се не подударају!";
    }

    // if (!proveriJedinstvenost(korisnickoIme)) {
    //     document.getElementById("korisnickoImeGreska").innerHTML = "Корисничко име је заузето!";
    //     return;
    // }
    // dodajKorisnika(korisnickoIme, sifra, ime, prezime, mejl);

}

