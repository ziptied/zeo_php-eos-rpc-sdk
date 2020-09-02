<?php

namespace BlockMatrix\EosRpc\Adapter\Settings;

use BlockMatrix\EosRpc\Exception\SettingsException;
use BlockMatrix\EosRpc\Exception\SettingsNotFoundException;
use Dotenv\Dotenv;

/**
 * Class DotenvAdapter
 *
 * The dotenv adaptor for loading settings
 */
class DotenvAdapter implements SettingsInterface
{
    /**
     * @var string|string
     */
    private $nodeUrl;

    /**
     * @var string|string
     */
    private $keosUrl;

    /**
     * DotenvAdapter constructor
     *
     * @param  string  $nodeUrl
     * @param  string  $keosUrl
     */
    public function __construct(string $nodeUrl, string $keosUrl)
    {
        $this->keosUrl = $keosUrl;
        $this->nodeUrl = $nodeUrl;
    }

    /**
     * @inheritdoc
     */
    public function rpcNode(): string
    {
        return $this->nodeUrl;
    }

    /**
     * @inheritdoc
     */
    public function rpcKeosd(): string
    {
        return $this->keosUrl;
    }
}
