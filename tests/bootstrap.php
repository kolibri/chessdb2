<?php

    // executes the "php bin/console cache:clear" command
passthru(sprintf('php "%s/../bin/console" doctrine:database:drop --env=%s --force',__DIR__,$_ENV['APP_ENV']));
passthru(sprintf('php "%s/../bin/console" doctrine:database:create --env=%s ',__DIR__,$_ENV['APP_ENV']));
passthru(sprintf('php "%s/../bin/console" doctrine:schema:create --env=%s ',__DIR__,$_ENV['APP_ENV']));


require __DIR__.'/../vendor/autoload.php';