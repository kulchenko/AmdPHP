AmdPHP framework.
=============================================


Author: Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru  
Version: 1.0, 17.01.2020

---

The necessary files are located in composer.json:

```json
{
    "autoload": {
        "files": [
            "config/action.php",
            "config/system.php",
            "config/function.php"
        ]
    }
}
```
If you have changed files or added new ones, do not forget to run the `composer dump-autoload-o` command

---

Creating a module and connecting it
==================================================

In the modules folder, create a `test.php` file

```php
<?php
use core\App;

$app = App::getInstance();

$app->add('test', [], function (){
    return 'TEST';
});
```

Add the code to the `config/config.php` file:

```php
return [
    'modules' => [
        ...
        'test' => '/modules/test.php',
    ],
];
```

You can now output data in the main module by adding **test** as a required loading module:

```php
<?php
use core\App;

$app = App::getInstance();

$app->add('main', ['test'], function ($test){
    echo $test;
});
```