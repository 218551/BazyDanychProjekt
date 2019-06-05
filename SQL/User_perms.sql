GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'pracownik'@'localhost' IDENTIFIED BY PASSWORD '*05A8A1A73083F816772592F13D11C8AA5CCD9681';

GRANT ALL PRIVILEGES ON `obsluga_hotelu`.* TO 'pracownik'@'localhost';

GRANT SELECT ON `obsluga_hotelu`.`hotel` TO 'pracownik'@'localhost';

GRANT SELECT, INSERT (KoniecZameldowania, PoczatekZameldowania, FkRezerwacja, FkPokoj, FkKlient), UPDATE (KoniecZameldowania, PoczatekZameldowania, FkRezerwacja, FkPokoj, FkKlient), DELETE ON `obsluga_hotelu`.`pobyt` TO 'pracownik'@'localhost';

GRANT SELECT, INSERT (NazwiskoKlienta, ImieKlienta, Obywatelstwo, ImieDrugie, FkAdres, DataUrodzenia, Email), UPDATE (NazwiskoKlienta, ImieKlienta, Obywatelstwo, ImieDrugie, FkAdres, DataUrodzenia, Email), DELETE ON `obsluga_hotelu`.`klient` TO 'pracownik'@'localhost';

GRANT SELECT, INSERT (KodPocztowy, Miejscowosc, NrTelefonu, NrDomu, Ulica, NrMieszkania), UPDATE (KodPocztowy, Miejscowosc, NrTelefonu, NrDomu, Ulica, NrMieszkania), DELETE ON `obsluga_hotelu`.`adres` TO 'pracownik'@'localhost';

GRANT SELECT, INSERT (KoniecRezerwacji, PoczatekRezerwacji, FkKlient, DataOperacji), UPDATE (KoniecRezerwacji, PoczatekRezerwacji, FkKlient, DataOperacji), DELETE ON `obsluga_hotelu`.`rezerwacja` TO 'pracownik'@'localhost';

GRANT SELECT, INSERT (FkNazwa, LiczbaMiejsc, DostepnyTeraz, Pietro, TypPokoju, CenaPokoju), UPDATE (FkNazwa, LiczbaMiejsc, DostepnyTeraz, Pietro, TypPokoju, CenaPokoju) ON `obsluga_hotelu`.`pokoj` TO 'pracownik'@'localhost';

GRANT SELECT, INSERT (CzasPobytu, Oplata, FkKlient), UPDATE (CzasPobytu, Oplata, FkKlient), DELETE ON `obsluga_hotelu`.`rachunek` TO 'pracownik'@'localhost';