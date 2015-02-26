# Mailchimp API
An Easy to use PHP wrapper for the MailChimp API v2 using Guzzle

#Installation:
<p>To install the latest version of dooweebdev/mailchimp-api simply add it to your composer.json file in the 'require section':</p>

```php
"doowebdev/mailchimp-api": "dev-master"
```

Next Run 'composer install' in your command console to add the package to your projects vendor folder.

Once the package is installed, you need to initialize the MailChimpApi class:

```php
require 'vendor/autoload.php';

use Doowebdev\MailChimpApi;
```

# How to use
Assuming you are using php classes in your application use the following as an example:

In a controller:

```php
use Doowebdev\MailChimpApi;

class SomeClass
{ 

    public function someMethod()
    {
        $mc = new MailChimpApi(YOUR-MAILCHIMP-APIKEY-GOES-HERE);
       
        $results = $mc->run('lists/subscribe',[
            'id'                => YOUR-LIST-ID-GOES-HERE,
            'email'             => array('email'=>'subribers@email.com'),
            'merge_vars'        => array('FNAME'=>'subscribers_firstname', 'LNAME'=>'subscribers_lastname'),
            'double_optin'      => true,
            'update_existing'   => true,
            'replace_interests' => false,
            'send_welcome'      => true,
        ]);
        
        var_dump($results);
    }

}


```


