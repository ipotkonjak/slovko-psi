CREATE TABLE IGRA
(
	idI                  INTEGER NOT NULL AUTO_INCREMENT,
	brojPokusaja1        INTEGER NOT NULL,
	brojPokusaja2        INTEGER NOT NULL,
	vreme1               INTEGER NOT NULL,
	vreme2               INTEGER NOT NULL,
	idK1                 INTEGER NULL,
	idK2                 INTEGER NULL,
	pobeda1              boolean NULL,
    PRIMARY KEY(idI)
);

CREATE TABLE KORISNIK
(
	idK                  INTEGER NOT NULL AUTO_INCREMENT,
	username             VARCHAR(50) NOT NULL UNIQUE,
	lozinka              VARCHAR(50) NOT NULL,
	ime                  VARCHAR(50) NOT NULL,
	prezime              VARCHAR(50) NOT NULL,
	vip                  boolean NOT NULL,
	admin                boolean NOT NULL,
	email                VARCHAR(50) NOT NULL,
    PRIMARY KEY(idK)
);

CREATE TABLE PRIJAVA_GRESKE
(
	idP                  INTEGER NOT NULL AUTO_INCREMENT,
	idAdmin              INTEGER NULL,
	opis                 TEXT NULL,
	evidentirano         boolean NOT NULL,
	idK                  INTEGER NOT NULL,
    PRIMARY KEY(idP),
    FOREIGN KEY(idAdmin) REFERENCES korisnik(idK),
    FOREIGN KEY(idK) REFERENCES korisnik(idK)
);


CREATE TABLE RECI
(
	idR                  INTEGER NOT NULL AUTO_INCREMENT,
	rec                  CHAR(5) NOT NULL,
    PRIMARY KEY(idR)
);

CREATE TABLE STATISTIKA
(
	idS                  INTEGER NOT NULL AUTO_INCREMENT,
	brojPoena            INTEGER NOT NULL,
	brojPobeda           INTEGER NOT NULL,
	brojNeresenih        INTEGER NOT NULL,
	brojPoraza           INTEGER NOT NULL,
	arcadeRecord         INTEGER NOT NULL,
	idK                  INTEGER NOT NULL,
    PRIMARY KEY(idS),
    FOREIGN KEY(idk) REFERENCES korisnik(idK)
);

CREATE TABLE VIP_ZAHTEV
(
	idZ                  INTEGER NOT NULL AUTO_INCREMENT,
	opis                 TEXT NULL,
	status               VARCHAR(50) NOT NULL,
	idK                  INTEGER NULL,
    PRIMARY KEY(idZ),
    FOREIGN KEY(idK) REFERENCES korisnik(idK)
);

ALTER TABLE STATISTIKA
ADD CONSTRAINT R_17 FOREIGN KEY (idK) REFERENCES KORISNIK (idK)
		ON DELETE CASCADE;

ALTER TABLE VIP_ZAHTEV
ADD CONSTRAINT R_18 FOREIGN KEY (idK) REFERENCES KORISNIK (idK)
		ON DELETE CASCADE;
