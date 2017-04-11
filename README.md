Wrike PHP LIBRARY
================================

**Current version: 0.1.0, version 1.0.0 around 2017-04-01**

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

**Required for v1.0.0 version**
- [ ] Architecture review: "More KISS, or more SOLID, that is the question"
- [ ] Code Review
- [ ] Documentation update
- [ ] Test Suite update
- [ ] Wrike OAuth 2.0 implementation
- [ ] Wrike Web-Hooks implementation

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
All operations are immutable and stateless.

```php
/**
 * Basic resources usage
 */
$api = ApiFactory::create(<PermanentToken>); // @see zibios/wrike-php-sdk

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

$allContactsForAccount = $api->getContactResource()->getAllForAccount($accountId);
$selectedContact = $api->getContactResource()->getById($contactId);
$selectedContacts = $api->getContactResource()->getByIds([$contactId, $anotherContactId]);
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
 * Extended API usage
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

```php
/**
 * Exceptions
 */

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
 * All resource access methods
 */
$api->getAccountResource()->getAll();
$api->getAccountResource()->getById($accountId);
$api->getAccountResource()->update($accountId, $params);

$api->getAttachmentResource()->getAllForAccount($accountId);
$api->getAttachmentResource()->getAllForFolder($folderId);
$api->getAttachmentResource()->getAllForTask($taskId);
$api->getAttachmentResource()->getById($attachmentId);
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
$api->getTimelogResource()->getById($timelogId);
$api->getTimelogResource()->update($timelogId, $params);
$api->getTimelogResource()->createForTask($taskId, $params);
$api->getTimelogResource()->delete($timelogId);

$api->getUserResource()->getById($userId);
$api->getUserResource()->update($userId, $params);

$api->getVersionResource()->getAll();

$api->getWorkflowResource()->getAllForAccount($accountId);
$api->getWorkflowResource()->update($workflowId, $params);
$api->getWorkflowResource()->createForAccount($accountId, $params);
```

Response can be returned in various formats according to used response transformer:
* Psr\Http\Message\ResponseInterface for PsrResponseTransformer
* Psr\Http\Message\StreamInterface for PsrBodyTransformer (containing Body part from Psr\Http\Message\ResponseInterface)
* JSON string for StringBodyTransformer (containing Psr\Http\Message\ResponseInterface body casted to string)
* Array for ArrayBodyTransformer (containing Psr\Http\Message\ResponseInterface body decoded to Array)
* Array for ArrayTransformer (containing JSON response decoded to Array)
* Objects - check [Response transformer plugin](https://github.com/zibios/wrike-php-jmsserializer)

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
