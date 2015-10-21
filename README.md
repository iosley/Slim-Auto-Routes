# Slim-Auto-Routes

The middleware for auto load routes to [Slim Framework][slim]

## Installation

### Using [Composer][composer] (*Recommended*)

    $ composer require iosley/slim-auto-routes

## Usage

Just add your routes path to 'routes.path' in Slim config and add AutoRoutesMiddleware to slim middlerares stack.

#### Example

    <?php
    // index.php

    $app = new \Slim\Slim();
    $yourRoutesPath = 'routes';
    $app->config('routes.path',$yourRoutesPath);
    $app->add( new \Iosley\Slim\Provider\AutoRoutesMiddleware );
    $app->run();

##

    <?php
    // routes/index.php

    $app = \Slim\Slim::getInstance(); // need this, just if you change the variable name
    $app->get('/', function() use ($app) {
        echo 'Example of auto load routes to Slim Framework.'
    });

## License

The code is available at github [project][home] under [MIT licence][licence].


[home]: https://github.com/iosley/Slim-Auto-Routes
[slim]: http://slimframework.com/
[composer]: https://getcomposer.org
[licence]: https://raw.githubusercontent.com/iosley/Slim-Auto-Routes/master/LICENSE
