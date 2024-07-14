# Arellano Law Website
# PHP -v 8.1^
# vue-easy-lightbox
# EmptyState | Timeline To Be Implemented (Vuetify)

# Things todo list

1. Clone this repository: `git clone `
2. Navigate to the folder: `cd "To the project folder"`
3. Run `composer isntall`
4. Run `cp .env.example .env`
5. Change with your DB credentials in your `.env` file
6. Run `php artisan key:generate`
7. Run `php artisan migrate`
8. Run `php artisan storage:link`
9. Run `npm install`
10. Run `npm run dev`
11. Run `php artisan serve`
12. Open your favorite browser: http://localhost:8000


# Hosting in cpanel


npm run build

Public folder content to public_html

configure index.html to navigate to the project folder
    require __DIR__.'/../arellano_law/vendor/autoload.php';
    $app = require_once __DIR__.'/../arellano_law/bootstrap/app.php';

copy the "build" folder from the "public" folder to the project folder

configure .env file
    APP_ENV=production
    APP_URL=https://yourdomain.com

you can use Terminal on cpanel for migration.

# .env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=ecaqrzsf_mapa
DB_USERNAME=ecaqrzsf_mapa
DB_PASSWORD=gu2vJnrburSLFWj

# For Images Link Storage
'Check your route'
'/storage-link'

Check the note on the route!!!


