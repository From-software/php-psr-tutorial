# PHP PSR tutorial

PHP PSR tutorial. Building a PSR-compliant microframework from scratch.

## Running the application

Note, we use the PHP built-in server for development purposes.
This is not recommended for production use, but makes it easy to run and develop the application locally.

To run the application, run the following composer script in the root directory of the project:

```bash
composer run dev
```

or manually start the PHP built-in server:

```bash
php -S localhost:8000 -t public/
```

This will start a local server at `http://localhost:8000` which will serve static files from the `public/` directory and route requests to the `public/index.php` front
controller.