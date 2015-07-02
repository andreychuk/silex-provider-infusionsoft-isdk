<?php

namespace Andreychuk\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class IsdkServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['infsft.sdk'] = function() use ($app){
            $infusionsoft = new \Infusionsoft\Infusionsoft(array(
                'clientId'     => $app['infsft.sdk.clientId'],
                'clientSecret' => $app['infsft.sdk.clientSecret'],
                'redirectUri'  => $app['infsft.sdk.redirectUri'],
            ));

            return $infusionsoft;
        };
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }
}
