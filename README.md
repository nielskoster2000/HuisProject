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
