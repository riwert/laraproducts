# Produkty w Laravel 5.4

CRUD produktów z wieloma cenami.

## Cechy
* Widoki:
  * wstępna strona powitalna,
  * lista produktów z cenami,
  * podgląd szczegółów produktu z cenami,
  * formularz dodawnia produktu z cenami,
  * formularz edycji produktu z cenami,
  * potwierdzenie usunięcia produktu z cenami.
* Produkty z polami:
  * nazwa,
  * uniklany url,
  * opis,
  * data utowrzenia,
  * data modyfikacji.
* Ceny z polami:
  *  nazwa,
  *  wartość,
  *  jednostka,
  *  data utowrzenia,
  *  data modyfikacji.
* Walidacja frontendowa i backendowa pól produktów i cen.

## Technologie
* Laravel 5.4
* MySQL
* Bootstrap
* jQuery

## Instalacja i uruchomienie
* `git clone <repo>`
* `composer install`
* `php artisan migrate`
* `php artisan serve`
