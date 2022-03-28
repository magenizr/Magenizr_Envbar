<?php
declare(strict_types=1);

namespace Magenizr\Envbar\Setup;

use Magento\Config\Model\Config\Factory;
use Magento\Framework\App\State;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Config factory
     *
     * @var \Magento\Config\Model\Config\Factory
     */
    private $configFactory;

    /**
     * Init
     *
     * @param \Magento\Config\Model\Config\Factory $configFactory
     * @param \Magento\Framework\App\State $state
     */
    public function __construct(
        Factory $configFactory,
        State $state
    ) {
        $this->configFactory = $configFactory;
        $state->setAreaCode('adminhtml');
    }

    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $index = time();
        $configData = [
            'section' => 'magenizr_envbar',
            'website' => null,
            'store' => null,
            'groups' => [
                'general' => [
                    'fields' => [
                        'environments' => [
                            'value' => [
                                $index.'_0' => [
                                    'name' => 'Development',
                                    'url' => '*.develop,*.local',
                                    'style' => 'development',
                                ],
                                $index.'_1' => ['name' => 'Staging', 'url' => '*.build', 'style' => 'staging'],
                                $index.'_2' => [
                                    'name' => 'Production',
                                    'url' => '*.com.au,*.com',
                                    'style' => 'production',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        /** @var \Magento\Config\Model\Config $configModel */
        $configModel = $this->configFactory->create(['data' => $configData]);
        $configModel->save();
    }
}
