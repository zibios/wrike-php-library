Wrike PHP LIBRARY
================================

**Proof of Concept - NOT YET USABLE!!!**

**First usable version around 2017-03-01**

Introduction
------------

**This is generic library for [Wrike](https://www.wrike.com/) online project management software tools.**

This package contains general documentation for all features.

For general purpose please check [full configured Wrike PHP SDK](https://github.com/zibios/wrike-php-sdk).
For none standard purposes please check [generic Wrike PHP Library](https://github.com/zibios/wrike-php-library),
[HTTP Client plugin](https://github.com/zibios/wrike-php-guzzle),
and [response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer).

Project status
--------------

[![Packagist License](https://img.shields.io/packagist/l/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Version](https://img.shields.io/packagist/v/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-library/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zibios/wrike-php-library/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09/mini.png)](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9b3b1cf6321040fa910c0c1c335b5ba1)](https://www.codacy.com/app/zibios/wrike-php-library)
[![Build Status](https://travis-ci.org/zibios/wrike-php-library.svg?branch=master)](https://travis-ci.org/zibios/wrike-php-library)
[![Dependency Status](https://www.versioneye.com/user/projects/5899f1acc71294004c4c3322/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5899f1acc71294004c4c3322)

[All badges](docs/Badges.md)

**Required for v0.1.0 version**
- [x] Connect to external services (packagist, travis, scrutinizer, ...)
- [x] Decouple repository
- [ ] Establishing some common rules for all external services
- [ ] Wrike OAuth 2.0 implementation
- [ ] Wrike Web-hooks implementation
- [ ] Architecture refactoring: "More KISS, or more SOLID, that is the question"
- [ ] Code Review
- [ ] Test suite refactoring
- [ ] Resource implementation finalize
- [ ] Test suite finalize
- [ ] Documentation prepare

**Resources implementation status**
- [x] Contacts
- [x] Users
- [x] Groups
- [x] Invitations
- [ ] Accounts
- [ ] Workflows
- [ ] Custom Fields
- [ ] Folders and Projects
- [ ] Tasks
- [ ] Comments
- [ ] Dependencies
- [ ] Timelogs
- [ ] Attachments
- [ ] Version
- [ ] IDs
- [ ] Colors

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


Reference
---------

[Wrike PHP Library](https://github.com/zibios/wrike-php-library)

[Wrike PHP SDK](https://github.com/zibios/wrike-php-sdk)

Official [Wrike API Documentation](https://developers.wrike.com/documentation/api/overview)

[PSR Naming Conventions](http://www.php-fig.org/bylaws/psr-naming-conventions/)

Package general architecture inspired by [mpclarkson/freshdesk-php-library](https://github.com/mpclarkson/freshdesk-php-library) 

License
-------

This bundle is available under the [MIT license](LICENSE).
