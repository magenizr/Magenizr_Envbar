<?php
declare(strict_types=1);

/**
 * Magenizr Envbar
 *
 * @copyright   Copyright (c) 2021 Magenizr (https://www.magenizr.com)
 * @license     https://www.magenizr.com/license Magenizr EULA
 */

namespace Magenizr\Envbar\Observer\Adminhtml;

use Magenizr\Envbar\Helper\Data;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\Page\Config;

class AddCss implements ObserverInterface
{
    /**
     * AddCss constructor.
     *
     * @param \Magenizr\Envbar\Helper\Data $dataHelper
     * @param \Magento\Framework\View\Page\Config $pageConfig
     */
    public function __construct(
        Data $dataHelper,
        Config $pageConfig
    ) {
        $this->dataHelper = $dataHelper;
        $this->pageConfig = $pageConfig;
    }

    public function execute(Observer $observer)
    {
        if (! $this->dataHelper->isEnabled()) {
            return;
        }

        $env = $this->dataHelper->getEnvironment();

        if (isset($env['style'])) {
            $this->pageConfig->addBodyClass('magenizr-envbar');
            $this->pageConfig->addBodyClass('env-'.$env['style']);
        }
    }
}
