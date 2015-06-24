<?php

namespace Andreychuk\Tests\Provider;

use Silex\Application;
use Silex\Provider\SerializerServiceProvider;
use Andreychuk\Provider\IsdkServiceProvider;

require __DIR__.'/../../../../vendor/autoload.php';

/**
 * Class IsdkServiceProviderTest
 *
 * @package Andreychuk\Tests\Provider
 */
class IsdkServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testRegister
     */
    public function testRegister()
    {
        $clientId = 'XXXXXXXXXXXXXXXXXXXXXXXX';
        $clientSecret = 'XXXXXXXXXX';
        $redirectUri = 'http://example.com/';
        $app = new Application();
        $app->register(new IsdkServiceProvider(), array(
            'infsoft.sdk.clientId'     => $clientId,
            'infsoft.sdk.clientSecret' => $clientSecret,
            'infsoft.sdk.redirectUri'  => $redirectUri,
        ));

        $this->assertInstanceOf("Infusionsoft\\Infusionsoft", $app['infsoft.sdk']);
    }
}
