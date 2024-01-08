# OpenRecipes

OpenRecipes is a webapp to search for recipies.

## Getting started

1. Download XAMPP and start it in Administrator mode. When open, only start the Apache server.  
That's because the default MySQL server will be used if not started in XAMPP, and that's what we want.

2. Clone the repo inside the `htdocs` directory inside the xampp folder (remove any existing files)

```bash
git clone https://github.com/novaotp/open-recipies
```

3. Install the dependencies

```bash
composer update
```

4. Create an `.env` file to match real data for the database (example data below)

```bash
DB_HOST="localhost:3306"
DB_NAME="openrecipesdb"
DB_USER="root"
DB_PASS="Pa$$w0rd"
```

5. Mount the database in MySQL using the `/database/script.sql` file.

5. By launching `localhost`, you should see the app running.

## Sources

Building a basic MVC pattern : https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/  
Meals come from TheMealDB API : https://www.themealdb.com/api.php

## Author

Sajidur Rahman
