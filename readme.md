# Produkty w Laravel 5.4

CRUD produktów z wieloma cenami.

## Cechy
* Widoki:
  * wstępna strona powitalna,
  * lista produktów z cenami,
  * podgląd szczegółów produktu z cenami,
  * formularz dodawania produktu z cenami,
  * formularz edycji produktu z cenami,
  * potwierdzenie usunięcia produktu z cenami.
* Produkty z polami:
  * nazwa,
  * unikalny URL,
  * opis,
  * data utworzenia,
  * data modyfikacji.
* Ceny z polami:
  *  nazwa,
  *  wartość,
  *  jednostka,
  *  data utworzenia,
  *  data modyfikacji.
* Walidacja frontendowa i backendowa pól produktów i cen.

## Technologie
* Laravel 5.4
* MySQL
* Bootstrap
* jQuery

## Instalacja, konfiguracja i uruchomienie
1. `git clone git@github.com:riwert/laraproducts.git` lub `git clone https://github.com/riwert/laraproducts.git` (skopiuj to repozytorium)
1. `cd laraproducts` (przejdź do skopiowanego repozytorium)
1. `composer install` (zainstaluj wszystkie zależności)
1. `mysql -u root -p -e 'create database laraproducts CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;'` (stwórz nową bazę danych MySQL)
1. `cp .env.example .env` (skopiuj plik ze zmiennymi lokalnymi i uzupełnij dane dostępowe do bazy)
1. `php artisan key:generate` (wygeneruj nowy klucz aplikacji)
1. `php artisan config:cache` (wyczyść cache konfiguracji)
1. `php artisan migrate` (wykonaj migrację struktury bazy danych)
1. `php artisan serve` (uruchom lokalny serwer PHP)
