<?php declare(strict_types=1);

namespace SwagProfile\Core\Content\SwagProfile\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagProfile\Core\Content\SwagProfile\SwagProfileDefinition;

class SwagProfileTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'swag_profile_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getParentDefinitionClass(): string
    {
        return SwagProfileDefinition::class;
    }
    public function getEntityClass(): string
    {
        return SwagProfileTranslationEntity::class;
    }
    public function getCollectionClass(): string
    {
        return SwagProfileTranslationCollection::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('first_name', 'firstName'))->addFlags(new Required()),
            (new StringField('last_name', 'lastName'))->addFlags(new Required()),
            (new FkField('swag_profile_id', 'swagProfileId', SwagProfileDefinition::class))->addFlags(new Required()),
            (new FkField('language_id', 'languageId', LanguageDefinition::class))->addFlags(new Required()),
        ]);
    }

}