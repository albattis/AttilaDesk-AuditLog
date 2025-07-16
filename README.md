# AttilaDesk AuditLog

<img width="300" height="200" alt="attiladesk" src="https://github.com/user-attachments/assets/9ca1ba93-7abf-427e-8c61-d24d5181698e" />

**AttilaDesk AuditLog** egy nyílt forráskódú, modulárisan bővíthető naplófájl-elemző rendszer, amelyet Laravel-alapon fejlesztettünk. Célja, hogy átláthatóbbá és visszakövethetővé tegye az alkalmazások működését a logfájlok strukturált feldolgozása és vizualizálása révén.

## 🔧 Főbb jellemzők

- Laravel-alapú, modulárisan bővíthető architektúra
- `app.log` fájl valós idejű figyelése vagy manuális feltöltés
- Szűrés típus, dátum, kulcsszó szerint
- Letisztult UI/UX fejlesztők és rendszergazdák számára
- Egyszerűen integrálható bármilyen Laravel- vagy más PHP-alapú rendszerbe

## 📦 Telepítés (hamarosan)

```bash
git clone https://github.com/albattis/AttilaDesk-AuditLog.git
cd AttilaDesk-AuditLog
composer install
cp .env.example .env
php artisan key:generate
