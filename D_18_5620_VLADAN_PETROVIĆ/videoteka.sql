--Kreiranje baze
CREATE DATABASE videoteka
CHARACTER SET utf16 COLLATE utf16_slovenian_ci;

--Kreiranje tabele filmovi
CREATE TABLE filmovi(
	id INT PRIMARY KEY,
    naslov VARCHAR(255) NOT NULL,
    reziser VARCHAR(255) NOT NULL,
    god_izdavanja YEAR NOT NULL,
    zanr VARCHAR(255) NOT NULL,
    ocena FLOAT
);

--Unos novih filmova
INSERT INTO `filmovi`(`id`, `naslov`, `reziser`, `god_izdavanja`, `zanr`, `ocena`) 
VALUES 
(1, "Južni vetar", "Miloš Avramović", 2019, "triler", 9.3),
(2, "Montevideo, Bog te video!", "Dragan Bjelogrlić", 2010, "drama", 8.7),
(3, "Parada", "Srdjan Dragojević", 2011, "komedija", 3.9),
(4, "Šešir profesora Koste Vujića", "Zdravko Šotra", 2012, "komedija", 8.2),
(5, "Šavovi", "Miroslav Terzić", 2019, "drama", 5.6),
(6, "Crni bombarder", "Darko Bajić", 1992, "drama", 4.6),
(7, "Vojna akademija 5", "Dejan Zečević", 2019, "komedija", 7.5),
(8, "Bulevar revolucije", "Vladimir Blaževski", 1992, "ljubavni", 6.4),
(9, "Crna mačka, beli mačor", "Emir Kusturica", 1998, "komedija", 7.8),
(10, "Nebeska udica", "Ljubisa Samardžić", 2000, "ratni", 8.4);

--Selektovati sve filmove gde je žanr ljubavni, komedija ili drama.
SELECT `id`, `naslov`, `zanr` 
FROM `filmovi` 
WHERE `zanr` LIKE "ljubavni" OR `zanr` LIKE "komedija" OR `zanr` LIKE "drama";

--Selektovati sve filmove kojima je ocena između 5 i 10.
SELECT `id`, `naslov`, `ocena` 
FROM `filmovi` 
WHERE `ocena` BETWEEN 5 AND 10;

--Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2019. godine i poređati ih abecednim redom.
SELECT DISTINCT `reziser`, `god_izdavanja` 
FROM `filmovi` 
WHERE `god_izdavanja`="2019" 
ORDER BY `naslov` DESC;

--Selektovati sve filmove tako da im zanr nije komedija.
SELECT `id`, `naslov`, `zanr`
FROM `filmovi` 
WHERE `zanr`!= "komedija";

--Prikazati sve informacije o najbojle rangiranom filmu
SELECT `id`, `naslov`, `reziser`, `god_izdavanja`, `zanr`, `ocena` 
FROM `filmovi` 
ORDER BY `ocena` DESC
LIMIT 1;

--Prikazati sve informacije o najbolje rangiranoj drami.
SELECT `id`, `naslov`, `reziser`, `god_izdavanja`, `zanr`, MAX(`ocena`)  
FROM `filmovi`
WHERE `zanr`="drama";

--Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene.
SELECT DISTINCT `reziser`, `ocena`
FROM `filmovi` 
ORDER BY `ocena` DESC
LIMIT 3;

--Selektovati sve žanrove filmova, bez ponavljanja.
SELECT DISTINCT `zanr` 
FROM `filmovi` 

--Selektovati sve filmove u obliku naslov (režiser).
SELECT CONCAT(`naslov` , ' (' , `reziser` , ')') AS "Naziv filma (reziser)"
FROM `filmovi`;

--Selektovati sve filmove u obliku naslov (režiser) – godina izdanja. Selektovane filmove sortirati rastuće prema godini izdanja.
SELECT CONCAT(`naslov` , ' (' , `reziser` , ')', '-' ,`god_izdavanja`) AS "Naziv filma (reziser) - godina izdanja"
FROM `filmovi`
ORDER BY `god_izdavanja` ASC;

--Odrediti prosečnu ocenu fimova koji su izdati nakon 2000 godine
SELECT AVG(`ocena`) AS "Prosecna ocena filmova izdatih posle 2000. god." 
FROM `filmovi` 
WHERE `god_izdavanja`>"2000";