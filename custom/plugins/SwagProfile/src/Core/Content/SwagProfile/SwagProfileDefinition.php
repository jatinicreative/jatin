<?php declare(strict_types=1);

namespace SwagProfile\Core\Content\SwagProfile;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagProfile\Core\Content\SwagProfile\Aggregate\SwagProfileTranslationDefinition;


class  SwagProfileDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_profile';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return SwagProfileEntity::class;
    }
    public function getCollectionClass(): string
    {
        return SwagProfileCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(),new Required()),
            new TranslatedField('firstName'),
            new TranslatedField('lastName'),
            (new LongTextField('address', 'address'))->addFlags(new Required()),
            (new DateField('dateOfBirth', 'dateOfBirth'))->addFlags(new Required()),
            (new TranslationsAssociationField(SwagProfileTranslationDefinition::class, 'swag_profile_id')),
       ]);
    }
}