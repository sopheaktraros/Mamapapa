# Sombath Express System

## To in stall this project


1. ``git clone https://gitlab.com/mengsengoeng.camsolution/sambath-express.git``
2. config .env and ``php artisan key:generate``
3. go to AppServiceProvider.php and comment code 
``//session(['app.settings' => Setting::all()]);``
4. ``composer install``
5. ``npm install``
6. ``php artisan migrate --seed``
7. ``npm run dev``
8. ``php artisan serve``