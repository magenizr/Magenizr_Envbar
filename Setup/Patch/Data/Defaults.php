<?php
declare(strict_types=1);

/**
 * Magenizr Envbar
 *
 * @copyright   Copyright (c) 2021 - 2023 Magenizr (https://www.magenizr.com)
 * @license     https://www.magenizr.com/license Magenizr EULA
 */

namespace Magenizr\Envbar\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Config\Model\Config\Factory;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Defaults implements DataPatchInterface
{
    const XML_PATH_ENV = 'magenizr_envbar/general/environments';

    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    protected $eavSetupFactory;

    /**
     * @var Factory
     */
    protected $configFactory;

    /**
     * @var WriterInterface
     */
    protected $configWriter;

    /**
     * Defaults constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     * @param Factory $configFactory
     * @param WriterInterface $configWriter
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        Factory $configFactory,
        WriterInterface $configWriter
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->configFactory = $configFactory;
        $this->configWriter = $configWriter;
    }

    /**
     * Apply
     *
     * @return Defaults|void
     */
    public function apply()
    {
        $index = time();
        $configData = [
            $index.'_0' => [
                'name' => 'Development',
                'url' => '*.develop,*.local',
                'style' => 'development'
            ],
            $index.'_1' => ['name' => 'Staging', 'url' => '*.build', 'style' => 'staging'],
            $index.'_2' => [
                'name' => 'Production',
                'url' => '*.com.au,*.com',
                'style' => 'production'
            ]
        ];

        $configModel = $this->configFactory->create();
        $configModel->setDataByPath(self::XML_PATH_ENV, json_encode($configData));
        $configModel->save();
    }

    /**
     * Revert
     *
     * @return void
     */
    public function revert()
    {
        $this->configWriter->delete(self::XML_PATH_ENV);
    }

    /**
     * Get Dependencies
     *
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get Aliases
     *
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * Get Version
     *
     * @return string
     */
    public static function getVersion()
    {
        return '1.0.2';
    }
}
