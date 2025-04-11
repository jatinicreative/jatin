<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\CountryDefinition;
use SwagShopPersonal\Core\Content\SwagShopPersonal\Aggregate\SwagShopPersonalTranslationDefinition;

class SwagShopPersonalDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_shop_personal';
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getCollectionClass(): string
    {
        return SwagShopPersonalCollection::class;
    }
    public function getEntityClass(): string
    {
        return SwagShopPersonalEntity::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new BoolField('active', 'active'),
            new TranslatedField('name'),
            new TranslatedField('street'),
            new TranslatedField('postCode'),
            new TranslatedField('city'),
            new TranslatedField('url'),
            new TranslatedField('telephone'),
            new TranslatedField('openTimes'),
            new FkField('country_id', 'countryId', CountryDefinition::class),
            new TranslationsAssociationField(SwagShopPersonalTranslationDefinition::class, 'swag_shop_personal_id'),

            new ManyToOneAssociationField('country', 'country_id', CountryDefinition::class),
        ]);
    }
}