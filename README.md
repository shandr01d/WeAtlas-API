Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require "shandra/weatlasapibundle": "0.1.x-dev"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Shandra\WeatlasApiBundle\ShandraWeatlasApiBundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Setup your credentials
------------------------------
```yaml

shandra_weatlas_api:
    aid: XXXXX
    key: XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

```

Step 4: Import routes(optional)
-------------------------------
```yaml

weatlas_api_search:
    resource: "@ShandraWeatlasApiBundle/Resources/config/routing.yml"
    prefix:   /

```

Basic usage
-------------------------

In controller

```php

/* @var $api WeatlasAPI */
$api = $this->get('shandra_weatlas_api');
$method = 'export/activitylist/;
$params = array();
$result = $api->makeRequest($method, $params);

```

In template

```twig

{{ WeatlasAPI('export/activitylist/', {})|json_encode() }}

```
