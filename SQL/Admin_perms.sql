GRANT ALL PRIVILEGES ON *.* TO 'Administrator'@'localhost' IDENTIFIED BY PASSWORD '*05A8A1A73083F816772592F13D11C8AA5CCD9681' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `obsluga\_hotelu`.* TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (FkNazwa, LiczbaMiejsc, DostepnyTeraz, Pietro, TypPokoju, CenaPokoju), UPDATE (FkNazwa, LiczbaMiejsc, DostepnyTeraz, Pietro, TypPokoju, CenaPokoju), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`pokoj` TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (FkAdres, HotelNazwa, Email), UPDATE (FkAdres, HotelNazwa, Email), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`hotel` TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (CzasPobytu, Oplata, FkKlient), UPDATE (CzasPobytu, Oplata, FkKlient), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`rachunek` TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (KodPocztowy, Miejscowosc, NrTelefonu, NrDomu, Ulica, NrMieszkania), UPDATE (KodPocztowy, Miejscowosc, NrTelefonu, NrDomu, Ulica, NrMieszkania), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`adres` TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (KoniecRezerwacji, PoczatekRezerwacji, FkKlient, DataOperacji), UPDATE (KoniecRezerwacji, PoczatekRezerwacji, FkKlient, DataOperacji), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`rezerwacja` TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (NazwiskoKlienta, ImieKlienta, Obywatelstwo, ImieDrugie, FkAdres, DataUrodzenia, Email), UPDATE (NazwiskoKlienta, ImieKlienta, Obywatelstwo, ImieDrugie, FkAdres, DataUrodzenia, Email), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`klient` TO 'Administrator'@'localhost' WITH GRANT OPTION;

GRANT SELECT, INSERT (KoniecZameldowania, PoczatekZameldowania, FkRezerwacja, FkPokoj, FkKlient), UPDATE (KoniecZameldowania, PoczatekZameldowania, FkRezerwacja, FkPokoj, FkKlient), DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, SHOW VIEW, TRIGGER ON `obsluga_hotelu`.`pobyt` TO 'Administrator'@'localhost' WITH GRANT OPTION;