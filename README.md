# OpenRecipies

OpenRecipies is a webapp to search for or create recipies.

Features :

- Create/modify/delete your own recipies
- Favorite recipies
- Discuss with people around the globe

## Getting started

1. Clone the repo

```bash
git clone https://github.com/novaotp/open-recipies
```

2. Install the dependencies

```bash
npm install
```

3. Set the `.env` file to match real data

```bash
DB_HOST="<address>:<port>"
DB_NAME="openrecipiesdb"
DB_USER="<user>"
DB_PASSWORD="<password>"
```

4. Compile the css in a terminal (watch mode enabled)

```bash
npm run css
```

5. Launch the development server in another terminal

```bash
npm run dev
```

6. Open http://127.0.0.1:3000 in your browser to see the app.

## Data sources

Ingredients : https://corgis-edu.github.io/corgis/csv/ingredients/
Read for [MVC Pattern](https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/)
Meals : https://www.themealdb.com/api.php

## Author

Sajidur Rahman
