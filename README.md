Wrike PHP LIBRARY - Wrike API V3 & V4
=====================================

Introduction
------------

**This is generic library for [Wrike](https://www.wrike.com/) (online project management software) REST API.**

This package contains general documentation for all features.
This package is decoupled from unnecessary dependencies and can't be used without additional HTTP Client plugin.
* For general purpose please check full configured [Wrike PHP SDK](https://github.com/zibios/wrike-php-sdk) - **recommended for most users**.
* For Symfony Framework please check full configured [Wrike bundle](https://github.com/zibios/wrike-bundle) based on this library
* For none standard purposes please check:
  * this generic [Wrike PHP Library](https://github.com/zibios/wrike-php-library)
  * [HTTP Client plugin](https://github.com/zibios/wrike-php-guzzle) based on [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) package
  * [response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) based on [jms/serializer](https://github.com/schmittjoh/serializer) package

Versions
--------
| Major Version                                           | Wrike API | PHP Compatibility                  | Initial release | Support                        |
|:-------------------------------------------------------:|:---------:|:----------------------------------:|:---------------:|:------------------------------:|
| [V3](https://github.com/zibios/wrike-php-sdk/tree/v3.x) | V4        | PHP 7.1, PHP 7.2, TBD              | October, 2018   | TBD                            |
| [V2](https://github.com/zibios/wrike-php-sdk/tree/v2.x) | V4        | PHP 5.5, PHP 5.6, PHP 7.0, PHP 7.1 | October, 2018   | Support ends on October, 2019  |
| [V1](https://github.com/zibios/wrike-php-sdk/tree/v1.x) | V3        | PHP 5.5, PHP 5.6, PHP 7.0, PHP 7.1 | February, 2018  | Support ends on February, 2019 |

Project status
--------------

**General**

[![Packagist License](https://img.shields.io/packagist/l/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Version](https://img.shields.io/packagist/v/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Packagist Version](https://img.shields.io/packagist/php-v/zibios/wrike-php-library.svg)](https://packagist.org/packages/zibios/wrike-php-library)
[![Libraries.io](https://img.shields.io/librariesio/github/zibios/wrike-php-library.svg)](https://libraries.io/packagist/zibios%2Fwrike-php-library)

[![CII Best Practices](https://bestpractices.coreinfrastructure.org/projects/1690/badge)](https://bestpractices.coreinfrastructure.org/projects/1690)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09/mini.png)](https://insight.sensiolabs.com/projects/28d43ffe-fa9a-4afa-893e-fc9b2e080d09)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9b3b1cf6321040fa910c0c1c335b5ba1)](https://www.codacy.com/app/zibios/wrike-php-library)
[![Code Climate Maintainability](https://api.codeclimate.com/v1/badges/73783acf5037a935c9c8/maintainability)](https://codeclimate.com/github/zibios/wrike-php-library/maintainability)

**Branch 'v3.x'**

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zibios/wrike-php-library/badges/quality-score.png?b=v3.x)](https://scrutinizer-ci.com/g/zibios/wrike-php-library/?branch=v3.x)
[![Scrutinizer Build Status](https://scrutinizer-ci.com/g/zibios/wrike-php-library/badges/build.png?b=v3.x)](https://scrutinizer-ci.com/g/zibios/wrike-php-library/build-status/v3.x)
[![Scrutinizer Code Coverage](https://scrutinizer-ci.com/g/zibios/wrike-php-library/badges/coverage.png?b=v3.x)](https://scrutinizer-ci.com/g/zibios/wrike-php-library/?branch=v3.x)
[![Travis Build Status](https://travis-ci.org/zibios/wrike-php-library.svg?branch=v3.x)](https://travis-ci.org/zibios/wrike-php-library)
[![StyleCI](https://styleci.io/repos/80992179/shield?branch=v3.x)](https://styleci.io/repos/80992179)
[![Coverage Status](https://coveralls.io/repos/github/zibios/wrike-php-library/badge.svg?branch=v3.x)](https://coveralls.io/github/zibios/wrike-php-library?branch=v3.x)

Installation
------------
Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require zibios/wrike-php-library "^3.0"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Contribution
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
All operations are immutable and stateless.

```php
/**
 * Resources access methods
 */
$api = ApiFactory::create(<PermanentToken>); // @see zibios/wrike-php-sdk

$api->getAccountResource()->getAll();
$api->getAccountResource()->getById($accountId);
$api->getAccountResource()->update($accountId, $params);

$api->getAttachmentResource()->getAllForAccount($accountId);
$api->getAttachmentResource()->getAllForFolder($folderId);
$api->getAttachmentResource()->getAllForTask($taskId);
$api->getAttachmentResource()->getById($attachmentId);
$api->getAttachmentResource()->getByIds([$attachmentId]);
$api->getAttachmentResource()->update($attachmentId, $params);
$api->getAttachmentResource()->uploadForFolder($attachmentId, $params);
$api->getAttachmentResource()->uploadForTask($attachmentId, $params);
$api->getAttachmentResource()->delete($attachmentId);
$api->getAttachmentResource()->download($attachmentId);
$api->getAttachmentResource()->downloadPreview($attachmentId);
$api->getAttachmentResource()->getPublicUrl($attachmentId);

$api->getColorResource()->getAll();

$api->getCommentResource()->getAll();
$api->getCommentResource()->getAllForAccount($accountId);
$api->getCommentResource()->getAllForFolder($folderId);
$api->getCommentResource()->getAllForTask($taskId);
$api->getCommentResource()->getById($commentId);
$api->getCommentResource()->getByIds([$commentId]);
$api->getCommentResource()->update($commentId, $params);
$api->getCommentResource()->createForFolder($folderId, $params);
$api->getCommentResource()->createForTask($taskId, $params);
$api->getCommentResource()->delete($commentId);

$api->getContactResource()->getAll();
$api->getContactResource()->getAllForAccount($accountId);
$api->getContactResource()->getById($contactId);
$api->getContactResource()->getByIds([$contactId]);
$api->getContactResource()->update($contactId, $params);

$api->getCustomFieldResource()->getAll();
$api->getCustomFieldResource()->getAllForAccount($accountId);
$api->getCustomFieldResource()->getById($customFieldId);
$api->getCustomFieldResource()->getByIds([$customFieldId]);
$api->getCustomFieldResource()->update($customFieldId, $params);
$api->getCustomFieldResource()->createForAccount($accountId, $params);

$api->getDependencyResource()->getAllForTask($taskId);
$api->getDependencyResource()->getById($dependencyId);
$api->getDependencyResource()->getByIds([$dependencyId]);
$api->getDependencyResource()->update($dependencyId, $params);
$api->getDependencyResource()->createForTask($taskId, $params);
$api->getDependencyResource()->delete($dependencyId);

$api->getFolderResource()->getAll();
$api->getFolderResource()->getAllForAccount($accountId);
$api->getFolderResource()->getAllForFolder($folderId);
$api->getFolderResource()->getById($folderId);
$api->getFolderResource()->getByIds([$folderId]);
$api->getFolderResource()->update($folderId, $params);
$api->getFolderResource()->createForFolder($folderId, $params);
$api->getFolderResource()->copy($folderId, $params);
$api->getFolderResource()->delete($folderId);

$api->getGroupResource()->getAllForAccount($accountId);
$api->getGroupResource()->getById($groupId);
$api->getGroupResource()->update($groupId, $params);
$api->getGroupResource()->createForAccount($accountId, $params);
$api->getGroupResource()->delete($groupId);

$api->getIdResource()->getAll($params); // $params required

$api->getInvitationResource()->getAllForAccount($accountId);
$api->getInvitationResource()->update($invitationId, $params);
$api->getInvitationResource()->createForAccount($accountId, $params);
$api->getInvitationResource()->delete($invitationId);

$api->getTaskResource()->getAll();
$api->getTaskResource()->getAllForAccount($accountId);
$api->getTaskResource()->getAllForFolder($folderId);
$api->getTaskResource()->getById($taskId);
$api->getTaskResource()->getByIds([$taskId]);
$api->getTaskResource()->update($taskId, $params);
$api->getTaskResource()->createForFolder($folderId, $params);
$api->getTaskResource()->delete($taskId);

$api->getTimelogResource()->getAll();
$api->getTimelogResource()->getAllForAccount($accountId);
$api->getTimelogResource()->getAllForFolder($folderId);
$api->getTimelogResource()->getAllForTask($taskId);
$api->getTimelogResource()->getAllForContact($contactId);
$api->getTimelogResource()->getAllForTimelogCategory($timelogCategoryId);
$api->getTimelogResource()->getById($timelogId);
$api->getTimelogResource()->update($timelogId, $params);
$api->getTimelogResource()->createForTask($taskId, $params);
$api->getTimelogResource()->delete($timelogId);

$api->getTimelogCategoryResource()->getAll();

$api->getUserResource()->getById($userId);
$api->getUserResource()->update($userId, $params);

$api->getVersionResource()->getAll();

$api->getWorkflowResource()->getAllForAccount($accountId);
$api->getWorkflowResource()->update($workflowId, $params);
$api->getWorkflowResource()->createForAccount($accountId, $params);
```

```php
/**
 * Params normalizer
 */
$params = $api->normalizeParams([
    'foo' => 'test',
    'bar' => ['test' => 'test'],
]);

// Array
// (
//     [foo] => test
//     [bar] => {"test":"test"}
// )
```

```php
/**
 * Basic API usage
 */
$params = $api->normalizeParams([
    'fields' => ['metadata'],
    'metadata' => ['key' => 'importantMetadataKey'],
]);
$allContacts = $api->getContactResource()->getAll($params);

$params = $api->normalizeParams([
    'metadata' => [
        [
            'key' => 'metadataKey',
            'value' => 'metadataValue',
        ]
    ],
]);
$updatedContact = $api->getContactResource()->update($contactId, $params);
```

```php
/**
 * Upload Attachment Request require two params: resource and name
 */
$params = $api->normalizeParams([
    'resource' => fopen(__FILE__, 'rb'),
    'name' => 'name.png',
]);
$updatedContact = $api->getAttachmentResource()->uploadForFolder($folderId, $params);
$updatedContact = $api->getAttachmentResource()->uploadForTask($taskId, $params);

/**
 * Download Attachment Requests returns none transformed Psr\Http\Message\ResponseInterface
 */
$response = $api->getAttachmentResource()->download($attachmentId);
$response = $api->getAttachmentResource()->downloadPreview($attachmentId);
```

```php
/**
 * Advanced API usage
 *
 * $api->recreateForNew*() - returns new Api instance
 */
$api = ApiFactory::create(<PermanentToken>); // @see zibios/wrike-php-sdk

$newApi = $api->recreateForNewAccessToken(<PermanentToken>);

$responseTransformer = new RawResponseTransformer();
$newApi = $api->recreateForNewResponseTransformer($responseTransformer);

$apiExceptionTransformer = new RawExceptionTransformer();
$newApi = $api->recreateForNewApiExceptionTransformer($apiExceptionTransformer);
```

Response transformers
---------------------

Response can be returned in various formats according to used response transformer

| Transformer              | Response                           | Comment                                 |
|:------------------------ |:-----------------------------------| --------------------------------------- |
| PsrResponseTransformer   | Psr\Http\Message\ResponseInterface | PSR response                            |
| PsrBodyTransformer       | Psr\Http\Message\StreamInterface   | PSR response body                       |
| StringBodyTransformer    | JSON string                        | PSR response body casted to JSON string |
| ArrayBodyTransformer     | array                              | PSR response body casted to array       |
| ArrayTransformer         | array                              | JSON response casted to array           |
| ResponseModelTransformer | ResponseModelInterface             | check [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) |
| ResourceModelTransformer | ResourceModelInterface             | check [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) |

ENUM's
------

**Zibios\WrikePhpLibrary\Enum\Api**

- RequestMethodEnum
- RequestPathFormatEnum
- ResourceMethodEnum
- ResponseFormatEnum

**namespace Zibios\WrikePhpLibrary\Enum**

- AttachmentTypeEnum
- CustomFieldTypeEnum
- CustomStatusColorEnum
- DependencyRelationTypeEnum
- InvitationStatusEnum
- LegacyEntityTypeEnum
- OptionalFieldEnum
- ProjectStatusEnum
- ScopeEnum
- SubscriptionTypeEnum
- TaskDatesTypeEnum
- TaskImportanceEnum
- TaskStatusEnum
- TreeScopeEnum
- UserRoleEnum
- UserTypeEnum
- WeekDayEnum

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
