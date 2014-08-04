create_testing_data
===================

create testing data

Usage
-------------------
安装php扩展 extension
```php
phpize
./configure
make | make install
```


生成yaml文件
```php
Usage: createYamlConfig data-length db-host db-user db-password db-name outfile
```

```php
<?php
    use createTextData\create\Create; 
    $loader = require 'vendor/autoload.php';
    $create = new Create;
    $create->set('file', '/path/to/yaml')
        ->set('dbHost', '127.0.0.1')
        ->set('dbUser', 'root')
        ->set('dbPass', '') 
        ->set('dbName', 'test')
        ->exec();
```
