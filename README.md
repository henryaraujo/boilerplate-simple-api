
# Boilerplate Simple API

This boilerplate was designed to facilitate the swift creation of APIs with utmost simplicity.


## Installation
Getting started with the boilerplate-simple-api is a breeze

Navigate to the `boilerplate-simple-api` directory.  
Execute the command: 
```bash
composer install
```

To launch the boilerplate-simple-api:  
```bash
composer start
```

Access the API at: [http://127.0.0.1:8000](http://127.0.0.1:8000)  
Explore the sample endpoint: [http://127.0.0.1:8000/api/welcome](http://127.0.0.1:8000/api/welcome) 
## Libraries Utilized
This project harnesses the power of the following libraries:

[pecee/simple-router](https://github.com/skipperbent/simple-php-router.git)  
[php-di/php-di](https://github.com/PHP-DI/PHP-DI.git)  
[doctrine/orm](https://github.com/doctrine/orm.git)  
[vlucas/phpdotenv](https://github.com/vlucas/phpdotenv.git)  
[lcobucci/jwt](https://github.com/lcobucci/jwt.git)


## Configuration
Configure your environment effortlessly:

Rename `.env.sample` to `.env`



## Folder Structure

#### Feel free to adapt the folder structure as needed:

| folder   |  description                           |
| :----------  | :---------------------------------- |
| `bootstrap`  | Contains files to initiate the API.|
| `public`  | Home to the index file; composer designates this folder as the root |
| `setup`  | Houses configuration files. |
| `src`  | Customize this space to suit your requirements. Remember to update setup files if folder names change. |

