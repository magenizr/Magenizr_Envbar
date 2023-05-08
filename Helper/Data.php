<?php
declare(strict_types=1);

/**
 * Magenizr Envbar
 *
 * @copyright   Copyright (c) 2021 - 2023 Magenizr (https://www.magenizr.com)
 * @license     https://www.magenizr.com/license Magenizr EULA
 */

namespace Magenizr\Envbar\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var string
     */
    private $tab = 'magenizr_envbar';

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Framework\UrlInterface $urlInterface
     * @param \Magento\Framework\Serialize\SerializerInterface $serializer
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        RequestInterface $request,
        UrlInterface $urlInterface,
        SerializerInterface $serializer,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->request = $request;
        $this->urlInterface = $urlInterface;
        $this->serializer = $serializer;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check if module is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->getConfigFlag('general/enabled');
    }

    /**
     * Get module flags from core_config_data
     *
     * @param string $setting
     * @return mixed
     */
    public function getConfigFlag($setting)
    {
        return $this->scopeConfig->isSetFlag($this->tab.'/'.$setting, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return array based on matched environment / url.
     *
     * @return mixed
     */
    public function getEnvironment()
    {
        $current = $this->urlInterface->getBaseUrl();

        $environments = $this->serializer->unserialize($this->getConfig('general/environments'));

        if (is_array($environments)) {
            foreach ($environments as $env) {
                $match = $this->findMatchInUrl($current, $env['url']);

                if (empty($match) || is_bool($match)) {
                    continue;
                }

                return $env;
            }
        }
    }

    /**
     * Get module configuration values from core_config_data
     *
     * @param string $setting
     * @return mixed
     */
    public function getConfig($setting)
    {
        return $this->scopeConfig->getValue($this->tab.'/'.$setting, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Find URL match.
     *
     * @param string $current
     * @param string $urls
     * @return false|int|string
     */
    private function findMatchInUrl($current, $urls)
    {
        $current = parse_url($current);
        $host = $current['host'];

        if (! empty($urls)) {
            foreach (explode(',', $urls) as $url) {

                if (strpos($host, str_replace('*', '', $url)) === false) {
                    continue;
                }

                return strstr($host, str_replace('*', '', $url));
            }
        }
    }

    /**
     * Return all possible styles
     *
     * @return array[]
     */
    public function getStyles()
    {
        return [
            ['value' => 'development', 'label' => __('Development')],
            ['value' => 'staging', 'label' => __('Staging')],
            ['value' => 'production', 'label' => __('Production')],
        ];
    }
}
