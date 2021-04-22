<?php
/**
 * Magenizr Envbar
 *
 * @category    Magenizr
 * @copyright   Copyright (c) 2021 Magenizr (https://www.magenizr.com)
 * @license     https://www.magenizr.com/license Magenizr EULA
 */

namespace Magenizr\Envbar\Block\Adminhtml\System\Config\Form\Field;

use Magenizr\Envbar\Helper\Data;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

class Style extends Select
{
    /**
     * @var \Magenizr\Envbar\Helper\Data
     */
    protected $dataHelper;

    /**
     * Style constructor.
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param \Magenizr\Envbar\Helper\Data $dataHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->dataHelper = $dataHelper;
    }

    /**
     * @param string $value
     * @return Magently\Tutorial\Block\Adminhtml\Form\Field\Activation
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Parse to html.
     *
     * @return mixed
     */
    public function _toHtml()
    {
        if (! $this->getOptions()) {

            $attributes = $this->dataHelper->getStyles();

            foreach ($attributes as $attribute) {
                $this->addOption($attribute['value'], $attribute['label']);
            }
        }

        return parent::_toHtml();
    }
}
