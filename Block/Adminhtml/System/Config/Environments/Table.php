<?php
declare(strict_types=1);

/**
 * Magenizr Envbar
 *
 * @copyright   Copyright (c) 2021 - 2023 Magenizr (https://www.magenizr.com)
 * @license     https://www.magenizr.com/license Magenizr EULA
 */

namespace Magenizr\Envbar\Block\Adminhtml\System\Config\Environments;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;

class Table extends AbstractFieldArray
{
    /**
     * @var $typeRenderer \Magenizr\Envbar\Block\Adminhtml\Form\Field\Style
     */
    protected $typeRenderer;

    /**
     * Prepare renderer
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareToRender()
    {
        $this->addColumn('name', ['label' => __('Name'), 'class' => 'required-entry']);
        $this->addColumn('url', ['label' => __('URL'), 'class' => 'required-entry']);
        $this->addColumn('style', [
            'label' => __('Style'),
            'renderer' => $this->getStyle(),
        ]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Environment');
    }

    /**
     * Return defined styles
     *
     * @return \Magenizr\Envbar\Block\Adminhtml\Form\Field\Style|\Magento\Framework\View\Element\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getStyle()
    {
        if (! $this->typeRenderer) {
            $this->typeRenderer = $this->getLayout()->createBlock('\Magenizr\Envbar\Block\Adminhtml\System\Config\Form\Field\Style', '', ['data' => ['is_render_to_js_template' => true]]); // phpcs:ignore
        }

        return $this->typeRenderer;
    }

    /**
     * Prepare array row
     *
     * @param \Magento\Framework\DataObject $row
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $componentCode = $row->getData('style');
        $options = [];
        if ($componentCode) {
            $key = 'option_'.$this->getStyle()->calcOptionHash($componentCode);
            $options[$key] = 'selected="selected"';
        }
        $row->setData('option_extra_attrs', $options);
    }
}
