<?php declare(strict_types=1);

namespace SwagProfile\Core\Content\SwagProfile\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagProfile\Core\Content\SwagProfile\Aggregate\SwagProfileTranslationDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'swagProfileTranslations',
                SwagProfileTranslationDefinition::class,
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