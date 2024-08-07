[![Magenizr Plus](https://images2.imgbox.com/11/6b/yVOOloaA_o.gif)](https://account.magenizr.com)
---

[![Latest Stable Version](https://poser.pugx.org/magenizr/magento2-envbar/v)](https://packagist.org/packages/magenizr/magento2-envbar) [![Total Downloads](https://poser.pugx.org/magenizr/magento2-envbar/downloads)](https://packagist.org/packages/magenizr/magento2-envbar) [![Latest Unstable Version](https://poser.pugx.org/magenizr/magento2-envbar/v/unstable)](https://packagist.org/packages/magenizr/magento2-envbar) [![License](https://poser.pugx.org/magenizr/magento2-envbar/license)](https://packagist.org/packages/magenizr/magento2-envbar) [![PHP Version Require](https://poser.pugx.org/magenizr/magento2-envbar/require/php)](https://packagist.org/packages/magenizr/magento2-envbar)

# Envbar

Envbar allows you to differentiate between environments by adding a custom colored bar above the top navigation. This
should help backend users to identify the environment ( e.g `local`, `develop`, `staging`, `production` ) and prevent
anyone from accidentally changing content on the wrong environment.

![Magenizr Envbar - Backend](https://images2.imgbox.com/eb/50/VGW29hBr_o.png)
![Magenizr Envbar - Backend](https://images2.imgbox.com/08/82/xWV2xR9J_o.png)

## System Requirements

- Magento 2.3.x, 2.4.x
- PHP 5.6.x, 7.x

## Installation (Composer 2)

1. Update your composer.json `composer require "magenizr/magento2-envbar":"^1.0" --no-update`
2. Use `composer update magenizr/magento2-envbar --no-install` to update your composer.lock file.

```
Updating dependencies
Lock file operations: 1 install, 1 update, 0 removals
  - Locking magenizr/magento2-envbar (1.0.5)
```

3. And then `composer install` to install the package.

```
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 1 install, 0 update, 0 removals
  - Installing magenizr/magento2-envbar (1.0.5): Extracting archive
```

4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_Envbar --clear-static-content
php bin/magento setup:upgrade
```

## Installation (Manually)

1. Download the code.
2. Extract the downloaded tar.gz file. Example: `tar -xzf Magenizr_Envbar_1.0.5.tar.gz`.
3. Copy the code into `./app/code/Magenizr/Envbar/`.
4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_Envbar --clear-static-content
```

## Features

* Pre-defined styles
* Multiple environments supported
* Multiple URLs per environment supported

## Usage

Simply go to `Stores > Configuration > Magenizr > Envbar` and enable the module once you have added your environment details.

## Support

If you experience any issues, don't hesitate to open an issue on [Github](https://github.com/magenizr/Magenizr_Envbar/issues).

## Purchase

This module is available for free on [GitHub](https://github.com/magenizr).

## Contact

Follow us on [GitHub](https://github.com/magenizr), [Twitter](https://twitter.com/magenizr)
and [Facebook](https://www.facebook.com/magenizr).

## History
===== 1.0.5 =====
* 2.4.6-p3 and PHP8 compatibility test
* Minor fixes applied

===== 1.0.4 =====
* Increased width for dynamic row table in system.xml

===== 1.0.3 =====
* 2.4.6 compatibility tested
* Cleanup various files to meet coding standards (EQP, ECG)
* Remove InstallData.php, styles.css, default.xml

===== 1.0.2 =====
* Cleanup various files to meet coding standards (EQP, ECG)
* Replace InstallData with Data Patch
* Minor fix around url matching

===== 1.0.1 =====
* Cleanup various files to meet coding standards (EQP, ECG)

===== 1.0.0 =====
* First release

## License

[OSL - Open Software Licence 3.0](https://opensource.org/licenses/osl-3.0.php)
