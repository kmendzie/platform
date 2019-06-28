<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Test\Api\Serializer\fixtures;

use Shopware\Core\Content\Media\MediaCollection;
use Shopware\Core\Content\Media\MediaEntity;
use Shopware\Core\System\User\UserEntity;

class TestBasicWithToManyRelationships extends SerializationFixture
{
    public function getInput()
    {
        $userId = '6f51622eb3814c75ae0263cece27ce72';

        $user = new UserEntity();
        $user->setId($userId);
        $user->setFirstName('Manufacturer');
        $user->setLastName('');
        $user->setPassword('password');
        $user->setUsername('user1');
        $user->setActive(true);
        $user->setEmail('user1@shop.de');
        $user->setCreatedAt(new \DateTime('2018-01-15T08:01:16+00:00'));

        $media = new MediaEntity();
        $media->setId('548faa1f7846436c85944f4aea792d96');
        $media->setUserId($userId);
        $media->setMimeType('image/jpg');
        $media->setFileExtension('jpg');
        $media->setFileSize(93889);
        $media->setTitle('2');
        $media->setCreatedAt(new \DateTime('2012-08-31T00:00:00+00:00'));
        $media->setUpdatedAt(new \DateTime('2017-11-21T11:25:34+00:00'));
        $media->setUser(clone $user);

        $mediaCollection = new MediaCollection([$media]);
        $user->setMedia($mediaCollection);

        return $user;
    }

    protected function getJsonApiFixtures(string $baseUrl): array
    {
        return [
            'data' => [
                'id' => '6f51622eb3814c75ae0263cece27ce72',
                'type' => 'user',
                'attributes' => [
                    'localeId' => null,
                    'avatarId' => null,
                    'username' => 'user1',
                    'password' => 'password',
                    'firstName' => 'Manufacturer',
                    'lastName' => '',
                    'email' => 'user1@shop.de',
                    'active' => true,
                    'customFields' => null,
                    'createdAt' => '2018-01-15T08:01:16+00:00',
                    'updatedAt' => null,
                ],
                'links' => [
                    'self' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72', $baseUrl),
                ],
                'relationships' => [
                    'locale' => [
                        'data' => null,
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/locale', $baseUrl),
                        ],
                    ],
                    'avatarMedia' => [
                        'data' => null,
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/avatar-media', $baseUrl),
                        ],
                    ],
                    'media' => [
                        'data' => [
                            [
                                'type' => 'media',
                                'id' => '548faa1f7846436c85944f4aea792d96',
                            ],
                        ],
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/media', $baseUrl),
                        ],
                    ],
                    'accessKeys' => [
                        'data' => [],
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/access-keys', $baseUrl),
                        ],
                    ],
                    'stateMachineHistoryEntries' => [
                        'data' => [],
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/state-machine-history-entries', $baseUrl),
                        ],
                    ],
                    'importExportLogEntries' => [
                        'data' => [],
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/import-export-log-entries', $baseUrl),
                        ],
                    ],
                    'recoveryUser' => [
                        'data' => null,
                        'links' => [
                            'related' => sprintf('%s/user/6f51622eb3814c75ae0263cece27ce72/recovery-user', $baseUrl),
                        ],
                    ],
                ],
                'meta' => null,
            ],
            'included' => [
                [
                    'id' => '548faa1f7846436c85944f4aea792d96',
                    'type' => 'media',
                    'attributes' => [
                        'userId' => '6f51622eb3814c75ae0263cece27ce72',
                        'mediaFolderId' => null,
                        'mimeType' => 'image/jpg',
                        'fileExtension' => 'jpg',
                        'uploadedAt' => null,
                        'fileName' => null,
                        'fileSize' => 93889,
                        'metaData' => null,
                        'mediaType' => null,
                        'createdAt' => '2012-08-31T00:00:00+00:00',
                        'updatedAt' => '2017-11-21T11:25:34+00:00',
                        'alt' => null,
                        'title' => '2',
                        'url' => '',
                        'customFields' => null,
                        'hasFile' => false,
                        'translated' => [],
                        'private' => false,
                    ],
                    'links' => [
                        'self' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96', $baseUrl),
                    ],
                    'relationships' => [
                        'user' => [
                            'data' => [
                                'type' => 'user',
                                'id' => '6f51622eb3814c75ae0263cece27ce72',
                            ],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/user', $baseUrl),
                            ],
                        ],
                        'categories' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/categories', $baseUrl),
                            ],
                        ],
                        'productManufacturers' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/product-manufacturers', $baseUrl),
                            ],
                        ],
                        'productMedia' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/product-media', $baseUrl),
                            ],
                        ],
                        'avatarUser' => [
                            'data' => null,
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/avatar-user', $baseUrl),
                            ],
                        ],
                        'translations' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/translations', $baseUrl),
                            ],
                        ],
                        'thumbnails' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/thumbnails', $baseUrl),
                            ],
                        ],
                        'mediaFolder' => [
                            'data' => null,
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/media-folder', $baseUrl),
                            ],
                        ],
                        'propertyGroupOptions' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/property-group-options', $baseUrl),
                            ],
                        ],
                        'tags' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/tags', $baseUrl),
                            ],
                        ],
                        'mailTemplateMedia' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/mail-template-media', $baseUrl),
                            ],
                        ],
                        'documentBaseConfigs' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/document-base-configs', $baseUrl),
                            ],
                        ],
                        'shippingMethods' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/shipping-methods', $baseUrl),
                            ],
                        ],
                        'paymentMethods' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/payment-methods', $baseUrl),
                            ],
                        ],
                        'productConfiguratorSettings' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/product-configurator-settings', $baseUrl),
                            ],
                        ],
                        'orderLineItems' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/order-line-items', $baseUrl),
                            ],
                        ],
                        'cmsBlocks' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/cms-blocks', $baseUrl),
                            ],
                        ],
                        'cmsPages' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/cms-pages', $baseUrl),
                            ],
                        ],
                        'documents' => [
                            'data' => [],
                            'links' => [
                                'related' => sprintf('%s/media/548faa1f7846436c85944f4aea792d96/documents', $baseUrl),
                            ],
                        ],
                    ],
                    'meta' => null,
                ],
            ],
        ];
    }

    protected function getJsonFixtures(): array
    {
        return [
            'id' => '6f51622eb3814c75ae0263cece27ce72',
            'localeId' => null,
            'avatarId' => null,
            'username' => 'user1',
            'password' => 'password',
            'firstName' => 'Manufacturer',
            'lastName' => '',
            'email' => 'user1@shop.de',
            'active' => true,
            'customFields' => null,
            'createdAt' => '2018-01-15T08:01:16+00:00',
            'updatedAt' => null,
            'media' => [
                [
                    'id' => '548faa1f7846436c85944f4aea792d96',
                    'userId' => '6f51622eb3814c75ae0263cece27ce72',
                    'mediaFolderId' => null,
                    'mimeType' => 'image/jpg',
                    'fileExtension' => 'jpg',
                    'uploadedAt' => null,
                    'fileName' => null,
                    'fileSize' => 93889,
                    'metaData' => null,
                    'mediaType' => null,
                    'createdAt' => '2012-08-31T00:00:00+00:00',
                    'updatedAt' => '2017-11-21T11:25:34+00:00',
                    'alt' => null,
                    'title' => '2',
                    'url' => '',
                    'customFields' => null,
                    'hasFile' => false,
                    'translated' => [],
                    'private' => false,
                    'user' => [
                        'id' => '6f51622eb3814c75ae0263cece27ce72',
                        'localeId' => null,
                        'avatarId' => null,
                        'username' => 'user1',
                        'password' => 'password',
                        'firstName' => 'Manufacturer',
                        'lastName' => '',
                        'email' => 'user1@shop.de',
                        'active' => true,
                        'locale' => null,
                        'avatarMedia' => null,
                        'media' => null,
                        'accessKeys' => null,
                        'stateMachineHistoryEntries' => null,
                        'importExportLogEntries' => null,
                        'recoveryUser' => null,
                        'customFields' => null,
                        '_uniqueIdentifier' => '6f51622eb3814c75ae0263cece27ce72',
                        'versionId' => null,
                        'translated' => [],
                        'createdAt' => '2018-01-15T08:01:16+00:00',
                        'updatedAt' => null,
                        'extensions' => [],
                    ],
                    'translations' => null,
                    'categories' => null,
                    'productManufacturers' => null,
                    'productMedia' => null,
                    'avatarUser' => null,
                    'thumbnails' => null,
                    'mediaFolder' => null,
                    'propertyGroupOptions' => null,
                    'mailTemplateMedia' => null,
                    'tags' => null,
                    'documentBaseConfigs' => null,
                    'shippingMethods' => null,
                    'paymentMethods' => null,
                    'productConfiguratorSettings' => null,
                    'orderLineItems' => null,
                    'cmsBlocks' => null,
                    'cmsPages' => null,
                    'documents' => null,
                    '_uniqueIdentifier' => '548faa1f7846436c85944f4aea792d96',
                    'versionId' => null,
                    'extensions' => [],
                ],
            ],
            'locale' => null,
            'avatarMedia' => null,
            'accessKeys' => null,
            'stateMachineHistoryEntries' => null,
            'importExportLogEntries' => null,
            'recoveryUser' => null,
            '_uniqueIdentifier' => '6f51622eb3814c75ae0263cece27ce72',
            'versionId' => null,
            'translated' => [],
            'extensions' => [],
        ];
    }

    protected function removeProtectedSalesChannelJsonApiData(array $fixtures): array
    {
        unset(
            $fixtures['included'][0]['attributes']['userId'],
            $fixtures['included'][0]['relationships']['user'],
            $fixtures['included'][0]['relationships']['avatarUser']
        );

        return $fixtures;
    }

    protected function removeProtectedSalesChannelJsonData(array $fixtures): array
    {
        unset(
            $fixtures['media'][0]['userId'],
            $fixtures['media'][0]['user'],
            $fixtures['media'][0]['avatarUser']
        );

        return $fixtures;
    }
}