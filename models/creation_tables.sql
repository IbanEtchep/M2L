CREATE TABLE LIGUE(
idL integer AUTO_INCREMENT,
nomLigue varchar(255),
siteLigue varchar(255),
descriptifLigue varchar(255),
PRIMARY KEY (idL)
);

CREATE TABLE CLUB(
idCl integer AUTO_INCREMENT,
nomClub varchar(255),
adresseClub varchar(255),
idL integer,
PRIMARY KEY (idCl),
FOREIGN KEY (idL) REFERENCES LIGUE(idL)
);

CREATE TABLE FORMATION(
idFo integer AUTO_INCREMENT,
descriptif varchar(255),
dateDebut date,
ouvertureInscriptions date,
clotureInscriptions date,
duree integer,
effectifMax integer,
PRIMARY KEY (idFo)
);

CREATE TABLE FONCTION (
idF integer AUTO_INCREMENT,
libelleF varchar(255),
PRIMARY KEY(idf)
);

CREATE TABLE INTERVENANT (
idI integer AUTO_INCREMENT,
nom varchar(255),
prenom varchar(255),
statut varchar(255),
idf integer,
email varchar(150) UNIQUE,
mdp varchar(50),
PRIMARY KEY(idI),
FOREIGN KEY(idF) REFERENCES FONCTION(idF)
);

CREATE TABLE ETAT_DEMANDE(
idED integer,
libelleED varchar(50),
PRIMARY KEY (idED)
);

CREATE TABLE PARTICIPATION_FORMATION(
    idFo integer,
    idI integer,
    idED integer,
    PRIMARY KEY (idFo, idI, idED),
    FOREIGN KEY (idFo) REFERENCES FORMATION(idFo),
    FOREIGN KEY (idI) REFERENCES INTERVENANT(idI),
    FOREIGN KEY (idED) REFERENCES ETAT_DEMANDE(idED)
);

CREATE TABLE CONTRAT(
idC integer AUTO_INCREMENT,
dateDebut date,
dateFin date,
typeContrat varchar(255),
idI integer,
PRIMARY KEY (idC),
FOREIGN KEY (idI) REFERENCES INTERVENANT(idI)
);

CREATE TABLE BULLETIN (
idB integer AUTO_INCREMENT,
mois date,
annee date,
bulletinPDF varchar(255),
idC integer,
PRIMARY KEY (idB),
FOREIGN KEY (idC) REFERENCES CONTRAT(idc)
);

CREATE TABLE DEPARTEMENT(
codeDepartement varchar(10),
nomDepartement varchar(50),
PRIMARY KEY (codeDepartement)
);

CREATE TABLE VILLE(
codePostal varchar(10),
nomVille varchar(50),
codeDepartement varchar(10),
PRIMARY KEY (codePostal),
FOREIGN KEY (codeDepartement) REFERENCES DEPARTEMENT(codeDepartement)
);

CREATE TABLE BATIMENT(
codeBat varchar(10),
ageBat smallint,
nbEtages smallint,
PRIMARY KEY (codeBat)
);

CREATE TABLE TYPE_ESPACE(
idTE integer,
libelleTE varchar(50),
PRIMARY KEY (idTE)
);

CREATE TABLE ESPACE_MUTUALISE(
codeSalle varchar(10),
nbPlaces smallint,
libelleEspace varchar(50),
idTE integer,
codeBat varchar(10),
PRIMARY KEY (codeSalle),
FOREIGN KEY (idTE) REFERENCES TYPE_ESPACE(idTE),
FOREIGN KEY (codeBat) REFERENCES BATIMENT(codeBat)
);

CREATE TABLE BUREAU(
codeBureau varchar(10),
idL integer,
codeBat varchar(10),
PRIMARY KEY (codeBureau),
FOREIGN KEY (idL) REFERENCES LIGUE(idL),
FOREIGN KEY (codeBat) REFERENCES BATIMENT(codeBat)
);
