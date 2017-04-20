Installation
============

Step 1: Download the Bundle
---------------------------

Add the following repository to your composer.json:

```json
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/williams-jhalt/logic-broker-bundle"
        }
    ],
    ...    
    "require": {
        ...
        "williams/logic-broker-bundle": "master-dev",
        ...
    },
    ...
```

Then run:

```console
$ php composer.phar update
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the required bundles by adding it to the list of registered bundles
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
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Williams\LogicBrokerBundle\WilliamsLogicBrokerBundle(),
        );

        // ...
    }

    // ...
}
```

Usage
-----

Update your database to include the required tables.

Create a handler class that implements LogicBrokerHandlerInterface and create
that class as a service.

Create a service named app.logicbroker with the following parameters:

```yaml        
    app.logicbroker:
        class: Williams\LogicBrokerBundle\Service\LogicBrokerService
        arguments: [ "%logicbroker_ftp_host%", "%logicbroker_ftp_user%", "%logicbroker_ftp_pass%", "@app.logicbroker_handler", "@doctrine.orm.entity_manager" ]
```

Use the console to run logicbroker:process periodically to perform EDI

You can view order status and manage customers at 