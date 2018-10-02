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
| Major Version                                               | Wrike API | PHP Compatibility                  | Initial release | Support                        |
|:-----------------------------------------------------------:|:---------:|:----------------------------------:|:---------------:|:------------------------------:|
| [V3](https://github.com/zibios/wrike-php-library/tree/v3.x) | V4        | PHP 7.1, PHP 7.2, TBD              | October, 2018   | TBD                            |
| [V2](https://github.com/zibios/wrike-php-library/tree/v2.x) | V4        | PHP 5.5, PHP 5.6, PHP 7.0, PHP 7.1 | October, 2018   | Support ends on October, 2019  |
| [V1](https://github.com/zibios/wrike-php-library/tree/v1.x) | V3        | PHP 5.5, PHP 5.6, PHP 7.0, PHP 7.1 | February, 2018  | Support ends on February, 2019 |

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

$api->account()->getAll();
$api->account()->updateDefault($params);

$api->attachments()->getAll();
$api->attachments()->getAllForFolder($folderId);
$api->attachments()->getAllForTask($taskId);
$api->attachments()->getById($attachmentId);
$api->attachments()->getByIds([$attachmentId]);
$api->attachments()->update($attachmentId, $params);
$api->attachments()->uploadForFolder($attachmentId, $params);
$api->attachments()->uploadForTask($attachmentId, $params);
$api->attachments()->delete($attachmentId);
$api->attachments()->download($attachmentId);
$api->attachments()->downloadPreview($attachmentId);
$api->attachments()->getPublicUrl($attachmentId);

$api->colors()->getAll();

$api->comments()->getAll();
$api->comments()->getAllForFolder($folderId);
$api->comments()->getAllForTask($taskId);
$api->comments()->getById($commentId);
$api->comments()->getByIds([$commentId]);
$api->comments()->update($commentId, $params);
$api->comments()->createForFolder($folderId, $params);
$api->comments()->createForTask($taskId, $params);
$api->comments()->delete($commentId);

$api->contacts()->getAll();
$api->contacts()->getById($contactId);
$api->contacts()->getByIds([$contactId]);
$api->contacts()->update($contactId, $params);

$api->customFields()->getAll();
$api->customFields()->getById($customFieldId);
$api->customFields()->getByIds([$customFieldId]);
$api->customFields()->update($customFieldId, $params);
$api->customFields()->create($params);

$api->dependencies()->getAllForTask($taskId);
$api->dependencies()->getById($dependencyId);
$api->dependencies()->getByIds([$dependencyId]);
$api->dependencies()->update($dependencyId, $params);
$api->dependencies()->createForTask($taskId, $params);
$api->dependencies()->delete($dependencyId);

$api->folders()->getAll();
$api->folders()->getAllForFolder($folderId);
$api->folders()->getById($folderId);
$api->folders()->getByIds([$folderId]);
$api->folders()->update($folderId, $params);
$api->folders()->createForFolder($folderId, $params);
$api->folders()->copy($folderId, $params);
$api->folders()->delete($folderId);

$api->groups()->getAll();
$api->groups()->getById($groupId);
$api->groups()->update($groupId, $params);
$api->groups()->create($params);
$api->groups()->delete($groupId);

$api->ids()->getAll($params); // $params required

$api->invitations()->getAll();
$api->invitations()->update($invitationId, $params);
$api->invitations()->create($params);
$api->invitations()->delete($invitationId);

$api->tasks()->getAll();
$api->tasks()->getAllForFolder($folderId);
$api->tasks()->getById($taskId);
$api->tasks()->getByIds([$taskId]);
$api->tasks()->update($taskId, $params);
$api->tasks()->createForFolder($folderId, $params);
$api->tasks()->delete($taskId);

$api->timelogs()->getAll();
$api->timelogs()->getAllForFolder($folderId);
$api->timelogs()->getAllForTask($taskId);
$api->timelogs()->getAllForContact($contactId);
$api->timelogs()->getAllForTimelogCategory($timelogCategoryId);
$api->timelogs()->getById($timelogId);
$api->timelogs()->update($timelogId, $params);
$api->timelogs()->createForTask($taskId, $params);
$api->timelogs()->delete($timelogId);

$api->timelogCategories()->getAll();

$api->users()->getById($userId);
$api->users()->update($userId, $params);

$api->version()->getAll();

$api->workflows()->getAll();
$api->workflows()->update($workflowId, $params);
$api->workflows()->create($params);
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
$allContacts = $api->contacts()->getAll($params);

$params = $api->normalizeParams([
    'metadata' => [
        [
            'key' => 'metadataKey',
            'value' => 'metadataValue',
        ]
    ],
]);
$updatedContact = $api->contacts()->update($contactId, $params);
```

```php
/**
 * Upload Attachment Request require two params: resource and name
 */
$params = $api->normalizeParams([
    'resource' => fopen(__FILE__, 'rb'),
    'name' => 'name.png',
]);
$updatedContact = $api->attachments()->uploadForFolder($folderId, $params);
$updatedContact = $api->attachments()->uploadForTask($taskId, $params);

/**
 * Download Attachment Requests returns none transformed Psr\Http\Message\ResponseInterface
 */
$response = $api->attachments()->download($attachmentId);
$response = $api->attachments()->downloadPreview($attachmentId);
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
| ResponseModelTransformer | ResponseModelInterface             | check [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) |
| ResourceModelTransformer | ResourceModelInterface             | check [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer) |

ENUM's
------

**Zibios\WrikePhpLibrary\Enum\Api**

* RequestMethodEnum
* RequestPathFormatEnum
* ResourceMethodEnum
* ResponseFormatEnum

**namespace Zibios\WrikePhpLibrary\Enum**

* AttachmentPreviewSizeEnum
* AttachmentTypeEnum
* CustomFieldAggregationEnum
* CustomFieldCurrencyEnum
* CustomFieldInheritanceTypeEnum
* CustomFieldTypeEnum
* CustomStatusColorEnum
* DependencyRelationTypeEnum
* InvitationStatusEnum
* LegacyEntityTypeEnum
* OptionalFieldEnum
* ProjectStatusEnum
* RescheduleModeEnum
* ScopeEnum
* SubscriptionTypeEnum
* TaskDatesTypeEnum
* TaskImportanceEnum
* TaskStatusEnum
* TreeScopeEnum
* UserRoleEnum
* UserTypeEnum
* WeekDayEnum

Breaking Changes
----------------
**V2.x due to changes in Wrike API V4**

| Request                                                                | Replacement / Description                           |
|:---------------------------------------------------------------------- |:--------------------------------------------------- |
| $api->getAccountResource()->getAll();                                  | Now returns only one (current) account              |
| $api->getAccountResource()->getById($accountId);                       | Removed                                             |
| $api->getAccountResource()->update($accountId, $params);               | $api->getAccountResource()->updateDefault($params); |
| $api->getAttachmentResource()->getAllForAccount($accountId);           | $api->getAttachmentResource()->getAll();            |
| $api->getCommentResource()->getAllForAccount($accountId);              | $api->getCommentResource()->getAll();               |
| $api->getContactResource()->getAllForAccount($accountId);              | $api->getContactResource()->getAll();               |
| $api->getCustomFieldResource()->getAllForAccount($accountId);          | $api->getCustomFieldResource()->getAll();           |
| $api->getCustomFieldResource()->createForAccount($accountId, $params); | $api->getCustomFieldResource()->create($params);    |
| $api->getFolderResource()->getAllForAccount($accountId);               | $api->getFolderResource()->getAll();                |
| $api->getGroupResource()->getAllForAccount($accountId);                | $api->getGroupResource()->getAll();                 |
| $api->getGroupResource()->createForAccount($accountId, $params);       | $api->getGroupResource()->create($params);          |
| $api->getInvitationResource()->getAllForAccount($accountId);           | $api->getInvitationResource()->getAll();            |
| $api->getInvitationResource()->createForAccount($accountId, $params);  | $api->getInvitationResource()->create($params);     |
| $api->getTaskResource()->getAllForAccount($accountId);                 | $api->getTaskResource()->getAll();                  |
| $api->getTimelogResource()->getAllForAccount($accountId);              | $api->getTimelogResource()->getAll();               |
| $api->getWorkflowResource()->getAllForAccount($accountId);             | $api->getWorkflowResource()->getAll();              |
| $api->getWorkflowResource()->createForAccount($accountId, $params);    | $api->getWorkflowResource()->create($params);       |

**V3.x due to refactoring for PHP >=7.1**

* ArrayTransformer for Client JSON response is removed, only PSR response is accepted
* Strict types for method params and responses

| Deprecated methods                  | New methods                |
|:----------------------------------- |:-------------------------- |
| $api->getAccountResource();         | $api->account();           |
| $api->getAttachmentResource();      | $api->attachments();       |
| $api->getColorResource();           | $api->colors();            |
| $api->getCommentResource();         | $api->comments();          |
| $api->getContactResource();         | $api->contacts();          |
| $api->getCustomFieldResource();     | $api->customFields();      |
| $api->getDependencyResource();      | $api->dependencies();      |
| $api->getFolderResource();          | $api->folders();           |
| $api->getGroupResource();           | $api->groups();            |
| $api->getIdResource();              | $api->ids();               |
| $api->getInvitationResource();      | $api->invitations();       |
| $api->getTaskResource();            | $api->tasks();             |
| $api->getTimelogResource();         | $api->timelogs();          |
| $api->getTimelogCategoryResource(); | $api->timelogCategories(); |
| $api->getUserResource();            | $api->users();             |
| $api->getVersionResource();         | $api->version();           |
| $api->getWorkflowResource();        | $api->workflows();         |

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
