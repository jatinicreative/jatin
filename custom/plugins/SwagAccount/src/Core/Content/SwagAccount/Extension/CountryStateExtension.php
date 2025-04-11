<?php declare(strict_types=1);

namespace SwagAccount\Core\Content\SwagAccount\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\Aggregate\CountryState\CountryStateDefinition;
use SwagAccount\Core\Content\SwagAccount\SwagAccountDefinition;

class CountryStateExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'countryState',
                SwagAccountDefinition::class,
                'country_id',
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return CountryStateDefinition::class;
    }
}