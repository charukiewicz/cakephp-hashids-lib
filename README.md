# cakephp-hashids-lib

[Hashids](http://www.hashids.org) Library for [CakePHP](http://cakephp.org/) 2.x

This is a modification of [FinalDevStudio's Hashids Component](https://github.com/FinalDevStudio/cakephp-hashids/) repackaged as a generic lib rather than a controller component.  This allows for access to the Hashids library in other libs and models rather than just controllers.  It also moves the configuration to your application's core.php file.

## Installation

First, grab **Hashids.php** and **HashGenerator.php** from http://www.hashids.org/php/ and put them in your app's **Vendor/Hashids** folder.

Next, put **HashidsUtility.php** into your **app/Lib** directory.

Finally, add the following to **Config/core.php**:

```php
Configure::write('Hashids', array(
    'salt' => 'SALT_GOES_HERE', // Required
    'min_hash_length' => 0, // Optional
    'alphabet' => '', // Optional
));
```

## Usage

You can now invoke the **HashidsUtility** anywhere in your application.

At the top of your file, add

```php
App::uses('HashidsUtility', 'Lib');
```

Then in the body of your file, invoke the Hashids class

```php
$Hashids = new HashidsUtility();
```

You can then make calls to the encode and decode methods through this object.

```php
$myVar = 1;

$encodedVar = $Hashids->encode($myVar);

....

$decodedVar = $Hashids->decode($encodedVar);
```

For complete documentation check out [hashids.org/php](http://hashids.org/php/).
