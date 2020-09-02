<?php

namespace BlockMatrix\EosRpc;

use BlockMatrix\EosRpc\Adapter\Http\CurlAdapter;
use BlockMatrix\EosRpc\Adapter\Http\HttpInterface;
use BlockMatrix\EosRpc\Adapter\Settings\DotenvAdapter;
use BlockMatrix\EosRpc\Adapter\Settings\SettingsInterface;
use Curl\Curl;

/**
 * Class ChainFactory
 *
 * Simple factory methods to help speed up integration
 */
class ChainFactory
{
    /**
     * Simple convenience factory which can be overloaded or used with defaults
     *
     * @param  string  $nodeUrl
     * @param  string  $keosUrl
     * @param  SettingsInterface|null  $settings
     * @param  HttpInterface|null  $http
     *
     * @return ChainController
     */
    public function api(
        string $nodeUrl,
        string $keosUrl,
        SettingsInterface $settings = null,
        HttpInterface $http = null
    ): ChainController {
        $settings = $settings ?? new DotenvAdapter($nodeUrl, $keosUrl);
        $http = $http ?? new CurlAdapter(new Curl);

        return new ChainController(
            $settings,
            $http
        );
    }
}
