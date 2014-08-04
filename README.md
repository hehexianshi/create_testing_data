create_testing_data
===================

create testing data

Usage
-------------------
```php
<?php
    use createTextData\create\Create; 
    $loader = require 'vendor/autoload.php';
    $create = new Create;
    $create->set('file', '/usr/local/nginx/html/mytext/create_testing_data/bin/demo.yaml')
        ->set('dbHost', '127.0.0.1')
        ->set('dbUser', 'root')
        ->set('dbPass', '') 
        ->set('dbName', 'test')
        ->exec();
```
