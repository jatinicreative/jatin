<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagShopPersonal\Core\Content\SwagShopPersonal\SwagShopPersonalDefinition;

class SwagShopPersonalTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'swag_shop_personal_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getParentDefinitionClass(): string
    {
        return SwagShopPersonalDefinition::class;
    }
    public function getEntityClass(): string
    {
        return SwagShopPersonalTranslationEntity::class;
    }
    public function getCollectionClass(): string
    {
        return SwagShopPersonalTranslationCollection::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name','name'))->addFlags(new Required()),
            (new StringField('street','street'))->addFlags(new Required()),
            (new StringField('post_code','postCode'))->addFlags(new Required()),
            (new StringField('city','city'))->addFlags(new Required()),
            (new StringField('url','url'))->addFlags(new Required()),
            (new StringField('telephone','telephone'))->addFlags(new Required()),
            (new LongTextField('open_times','openTimes'))->addFlags(new Required()),
            (new FkField('language_id', 'languageId', LanguageDefinition::class))->addFlags(new Required()),
            (new FkField('swag_shop_personal_id','personalId', SwagShopPersonalDefinition::class,'id'))->addFlags(new Required()),
        ]);
    }
}