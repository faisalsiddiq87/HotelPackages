# Project Title

Hotel Packages CRUD

## Project Setup Instructions

1. After downloading the git repository naviagte to directory samtest.
2. copy `.env.example` and rename it to `.env` and keep on same root as `composer.json`.
4. Run command `composer update` it will download all the composer dev dependencies and repositories.
5. Run command `php artisan migrate` for creating all tables in your database.
6. Run command `php artisan db:seed` for seeding the dummy data related to this test.
7. Run command `php artisan passport:install` for laravel passport key configurations.
8. Run commands `npm install` and `npm run dev` to install node packages for frontend.
7. Hit the URL `http://hotel.local` in your browser/POSTMAN.
9. If all installation steps done correctly you will see `Login Screen`

### Testing End Points

1. Run the Command `phpunit` on your project root.
5. All the test cases should return OK with assertions.

## ScreenShots

* Please review [screenshots](https://github.com/faisalsiddiq87/HotelPackages/tree/master/screenshots) for login, listing, add, update, detail, testCases etc