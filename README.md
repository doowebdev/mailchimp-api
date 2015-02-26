# Mailchimp API
An Easy to use PHP wrapper for the MailChimp API v2 using Guzzle


#Installation:
<p><strong> Requires:</strong> php 5.4+ and Guzzle (will be added automatically when you install this package).</p>
<p>To install the latest version of doowebdev/mailchimp-api simply add it to your composer.json file in the 'require section':</p>

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
        $mc = new MailChimpApi('YOUR-MAILCHIMP-APIKEY-GOES-HERE');

       //We are using the 'lists/subscribe' method to subscribe a user/visitor to our newsletter list.
        $results = $mc->run('lists/subscribe',[
            'id'                => 'YOUR-LIST-ID-GOES-HERE',
            'email'             => ['email'=>'subscribers@email.com'],
            'merge_vars'        => ['FNAME'=>'subscribers_firstname', 'LNAME'=>'subscribers_lastname'],
            'double_optin'      => true,
            'update_existing'   => true,
            'replace_interests' => false,
            'send_welcome'      => true,
        ]);

        var_dump($results);
    }

}


```

<p><strong>Thats it!</strong></p>
<p>To get the complete list of methods you can use visit the official MailChimp API documentation here: https://apidocs.mailchimp.com/api/2.0/#method-sections</p>



