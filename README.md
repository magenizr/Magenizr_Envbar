# Envbar

Envbar allows you to differentiate between environments by adding a custom colored bar above the top navigation. This
should help backend users to identify the environment ( e.g `local`, `develop`, `staging`, `production` ) and prevent
anyone from accidentally changing content on the wrong environment.

![Magenizr Envbar - Backend](https://images2.imgbox.com/3b/d8/naOpR8UY_o.gif)

## System Requirements

- Magento 2.3.x, 2.4.x
- PHP 5.6.x, 7.x

## Installation (Composer)

1. Update your composer.json `composer require "magenizr/magento2-envbar":"1.0.0" --no-update`
2. Install dependencies and update your composer.lock `composer update --lock`

```
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)              
Package operations: 1 install, 0 updates, 0 removals
  - Installing magenizr/magento2-envbar (1.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
```

3. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_Envbar --clear-static-content
php bin/magento setup:upgrade
```

## Installation (Manually)

1. Download the code.
2. Extract the downloaded tar.gz file. Example: `tar -xzf Magenizr_Envbar_1.0.0.tar.gz`.
3. Copy the code into `./app/code/Magenizr/Envbar/`.
4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_Envbar --clear-static-content
php bin/magento setup:upgrade
```

## Features

* Pre-defined styles
* Multiple environments supported
* Multiple URLs per environment supported

## Usage

Simply go to `Stores > Configuration > Magenizr > Envbar` and enable the module once you have added your environment details.

## Support

If you experience any issues, don't hesitate to open an issue
on [Github](https://github.com/magenizr/Magenizr_Envbar/issues). For a custom build, don't hesitate to contact us
on [Magento Marketplace](https://marketplace.magento.com/partner/magenizr).

## Purchase

This module is available for free on [GitHub](https://github.com/magenizr).

## Contact

Follow us on [GitHub](https://github.com/magenizr), [Twitter](https://twitter.com/magenizr)
and [Facebook](https://www.facebook.com/magenizr).

## History

===== 1.0.0 =====

* First release

## License

[OSL - Open Software Licence 3.0](https://opensource.org/licenses/osl-3.0.php)
