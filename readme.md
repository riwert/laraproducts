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
  * unikalny url,
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
1. `git clone <repo>`
1. `composer install`
1. `cp .env.example .env` (uzupełnij dane dostępowe do bazy danych w pliku .env)
1. `php artisan migrate`
1. `php artisan serve`
