GeoCalculator - instrukcja użytkowania i TDD

===========================================

Opis projektu

Aplikacja webowa do obliczania odległości między punktami geograficznymi.

Funkcjonalności:

Formularz do wprowadzania współrzędnych jednego lub wielu punktów

Walidacja współrzędnych (latitude: -90…90, longitude: -180…180)

Obliczanie odległości w kilometrach i metrach dla każdej pary punktów

Oddzielny komponent ResultDisplay do wyświetlania wyników

Technologie

Backend: PHP 8+, PSR-4 autoloading

Frontend: Vue.js 3 + TypeScript + Vite

Testy: PHPUnit (backend)

Struktura projektu

GeoCalculator/
├─ backend/
│ ├─ public/index.php # punkt wejścia API
│ ├─ src/Service/DistanceCalculator.php
│ ├─ composer.json
│ └─ vendor/
├─ frontend/
│ ├─ src/components/CoordinateForm.vue
│ ├─ src/components/CoordinatePairsForm.vue
│ ├─ src/components/ResultDisplay.vue
│ ├─ src/style.css
│ └─ src/main.ts
└─ readme.txt

Uruchomienie backendu

Przejdź do katalogu backend:
cd backend

Zainstaluj autoload Composer i zależności:
composer install
composer dump-autoload

Uruchom serwer PHP:
php -S localhost:8000 -t public

Backend API dostępny jest pod:
http://localhost:8000

Uruchomienie frontendu

Przejdź do katalogu frontend:
cd frontend

Zainstaluj zależności NPM:
npm install

Uruchom serwer deweloperski Vite:
npm run dev

Frontend dostępny będzie pod adresem podanym przez Vite, np. http://localhost:5173

Użycie aplikacji

Wprowadź współrzędne punktów w formularzu:

Latitude: -90…90

Longitude: -180…180

Kliknij Oblicz

Wyniki dla każdej pary punktów wyświetlą się w komponencie ResultDisplay w formacie:
X km Y m

Pola niepoprawne są podświetlone na czerwono

Formularz sparowania punktów

Możesz dodać wiele punktów

Wszystkie możliwe pary punktów zostaną sparowane i dla każdej wyliczona odległość

Wyniki wyświetlane są w ResultDisplay

Walidacja danych

Latitude musi być w zakresie -90…90

Longitude musi być w zakresie -180…180

Przycisk Oblicz jest blokowany, jeśli dane są niepoprawne

Projekt wykorzystuje Test Driven Development (TDD) przy tworzeniu backendu w PHP:

Każda funkcja w DistanceCalculator ma dedykowany test PHPUnit

Przykładowo test tests/DistanceCalculatorTest.php sprawdza, czy obliczona odległość między punktami jest poprawna w km i m.

Testy uruchamiane są automatycznie przed każdym wdrożeniem lub zmianą kodu

Polecenie: vendor/bin/phpunit

Frontend wykorzystuje mocki fetch w testach komponentów Vue (Vitest/Jest)

Testy sprawdzają walidację, renderowanie formularza, wyświetlanie wyników w ResultDisplay oraz poprawne wywołania API.

Dzięki temu każda zmiana kodu jest natychmiast weryfikowana testami, co minimalizuje błędy i utrzymuje spójność działania.

Przykładowe dane testowe

Lat A | Lng A | Lat B | Lng B | Wynik
52 | 21 | 50 | 19 | 262 km 739.816 m
41 | 2 | 40 | 3 | 145 km 585.321 m