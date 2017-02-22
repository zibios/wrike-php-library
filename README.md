Wrike PHP LIBRARY
================================

**Proof of Concept - NOT YET USABLE!!!**

**First usable version around 2017-03-01**

Introduction
------------

**This is generic library for [Wrike](https://www.wrike.com/) (online project management software) REST API.**

This package contains general documentation for all features.
This package is decoupled from unnecessary dependencies and can't be used without additional HTTP Client plugin.
* For general purpose please check full configured [Wrike PHP SDK](https://github.com/zibios/wrike-php-sdk) - **recommended for most users**.
* For Symfony2 / Symfony3 please check full configured [Wrike bundle](https://github.com/zibios/wrike-bundle) based on this library
* For none standard purposes please check:
  * this generic [Wrike PHP Library](https://github.com/zibios/wrike-php-library)
  * [HTTP Client plugin](https://github.com/zibios/wrike-php-guzzle) based on [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) package
  * [response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) based on [jms/serializer](https://github.com/schmittjoh/serializer) package

Project status
--------------

[![Packagist License](https://img.shields.io/packagist/l/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Version](https://img.shields.io/packagist/v/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-library/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-library/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09/mini.png)](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9b3b1cf6321040fa910c0c1c335b5ba1)](https://www.codacy.com/app/zibios/wrike-php-library)
[![Test Coverage](https://codeclimate.com/github/zibios/wrike-php-library/badges/coverage.svg)](https://codeclimate.com/github/zibios/wrike-php-library/coverage)
[![Build Status](https://travis-ci.org/zibios/wrike-php-library.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-library)
[![Libraries.io](https://img.shields.io/librariesio/github/zibios/wrike-php-library.svg)](https://libraries.io/packagist/zibios%2Fwrike-php-library)

[All badges](docs/Badges.md)

[All zibios/wrike-* badges](docs/AllWrikeBadges.md)

**Required for v0.1.0 version**
- [x] Connect to external services (packagist, travis, scrutinizer, ...)
- [x] Decouple repository
- [x] Establishing some common rules for all external services
- [ ] Architecture refactoring: "More KISS, or more SOLID, that is the question"
- [ ] Code Review
- [ ] Test suite refactoring
- [ ] Resource implementation finalize
- [ ] Test suite finalize
- [ ] Documentation prepare
- [ ] Wrike OAuth 2.0 implementation
- [ ] Wrike Web-hooks implementation

**Resources implementation status**
- [x] Contacts
- [x] Users
- [x] Groups
- [x] Invitations
- [x] Accounts
- [x] Workflows
- [x] Custom Fields
- [x] Folders and Projects
- [x] Tasks
- [x] Comments
- [x] Dependencies
- [x] Timelogs
- [x] Attachments
- [x] Version
- [x] IDs
- [x] Colors

Installation
------------

To try it yourself clone the repository:

```bash
git clone git@github.com:zibios/wrike-php-library.git
cd wrike-php-library
```

and install dependencies with composer:

```bash
composer install
```

Run PHPUnit tests:

```bash
./vendor/bin/phpunit
``` 

Usage
------------

```php
// @see zibios/wrike-php-sdk
$api = ApiFactory::createForBearerToken(<PermanentToken>);

$allContacts = $api->getContactResource()->getAll();
$selectedContact = $api->getContactResource()->getById(<ContactId>);
```

Response can be returned in various formats according to used response transformer:
* Psr\Http\Message\ResponseInterface for RawResponseTransformer
* Psr\Http\Message\StreamInterface for RawBodyTransformer (containing Body part from Psr\Http\Message\ResponseInterface)
* JSON string for StringBodyTransformer (containing Psr\Http\Message\ResponseInterface body casted to string)
* Array for ArrayBodyTransformer (containing Psr\Http\Message\ResponseInterface body decoded to Array)
* Zibios\WrikePhpLibrary\Model\ResponseModelInterface - [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer)
* Zibios\WrikePhpLibrary\Model\ResourceModelInterface - [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer)

Reference
---------

**Internal**

Full configured [Wrike PHP SDK](https://github.com/zibios/wrike-php-sdk)

Full configured [Symfony bundle](https://github.com/zibios/wrike-bundle) based on Wrike PHP SDK

[Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) for Wrike PHP Library

[HTTP Client plugin](https://github.com/zibios/wrike-php-guzzle) for Wrike PHP Library

**External**

Official [Wrike API Documentation](https://developers.wrike.com/documentation/api/overview)

[PSR Naming Conventions](http://www.php-fig.org/bylaws/psr-naming-conventions/)

Package general architecture inspired by [mpclarkson/freshdesk-php-library](https://github.com/mpclarkson/freshdesk-php-library) 

License
-------

This bundle is available under the [MIT license](LICENSE).
