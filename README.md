# Installatie-instructies

## Stap 1: Clone de repository
```bash
git clone https://github.com/nielskoster2000/HuisProject.git
```

## Stap 2: Navigeer naar de projectmap
```bash
cd HuisProject
```

## Stap 3: Installeer de afhankelijkheden
```bash
composer install
npm install
```

## Stap 4: Configureer de omgeving
- Maak een kopie van het `.env.example`-bestand en hernoem het naar `.env`

- Genereer een nieuwe APP_KEY:
  ```bash
  php artisan key:generate
  ```
- Voer dit commando uit om een koppeling te maken met de storage (nodig voor fallback afbeelding):
  ```bash
  php artisan storage:link
  ```

## Stap 5: Start de frontend
```bash
npm run dev
```

## Stap 6: Start de backend-server
- Open een nieuwe terminal en ga naar de root van het project:
  ```bash
  cd HuisProject
  ```
- Start de server:
  ```bash
  php artisan serve
  ```

## Stap 7: Open de applicatie in je browser
Ga naar [http://127.0.0.1:8000/](http://127.0.0.1:8000/) of het adres dat `php artisan serve` aangeeft.


# Aanpak
Ik heb eerst een laravel project opgezet en een repository op Github gemaakt. Vervolgens was ik begonnen met de header zodat ik al een begin had van de paginastructuur. Hierna heb ik de huiskaarten gemaakt. Ik wou hier OOP implementeren:
- Een base class `Card`
    - `HouseCard` voor de huizen
    - `CTACard` voor de Call to Action die ertussen komt

Hierna heb ik met een GET requests gefilterd op een stad/straat en de min en max prijzen. Dit was met javascript niet heel fijn, maar heb het uiteindelijk aan de praat gekregen. 

Toen het filteren en de huiskaarten klaar waren, heb ik als laatst nog gewerkt aan pagination. 

## Terugblik
Ik ben best blij met het eindresultaat, maar er zijn wel dingen die ik anders zou willen doen:
- Ik zou nog Inertia.js willen toevoegen ipv pagination met javascript regelen
- Het gebruik van Templates en components is nog niet optimaal
- De HomeController is nog te rommelig
- Te veel tijd besteed aan pagination ipv template en component gebruik
- Heb tijdens het maken van alle componenten al meteen gekeken naar responsive design: compleet buiten de scope van de opdracht
- Laat in het project pas echt github branches gebruikt
