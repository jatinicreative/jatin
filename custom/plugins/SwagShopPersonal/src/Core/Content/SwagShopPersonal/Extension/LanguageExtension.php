<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagShopPersonal\Core\Content\SwagShopPersonal\Aggregate\SwagShopPersonalTranslationDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'swagPersonalTranslations',
                SwagShopPersonalTranslationDefinition::class,
                'language_id',
                'id'
            )
        );
    }
    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}