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
        $app['infsoft.sdk'] = $app->share(function() use ($app){
            $infusionsoft = new \Infusionsoft\Infusionsoft(array(
                'clientId'     => $app['infsoft.sdk.clientId'],
                'clientSecret' => $app['infsoft.sdk.clientSecret'],
                'redirectUri'  => $app['infsoft.sdk.redirectUri'],
            ));

            return $infusionsoft;
        });
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }
}
