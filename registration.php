<?php
declare(strict_types=1);

/**
 * Magenizr Envbar
 *
 * @copyright 2023 Magenizr (https://www.magenizr.com)
 * @license   https://www.magenizr.com/license Magenizr EULA
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Magenizr_Envbar', isset($file) ? realpath(dirname($file)) : __DIR__); // phpcs:ignore
