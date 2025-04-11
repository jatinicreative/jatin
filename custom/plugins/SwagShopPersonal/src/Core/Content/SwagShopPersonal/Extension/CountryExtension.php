<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\CountryDefinition;
use SwagShopPersonal\Core\Content\SwagShopPersonal\SwagShopPersonalDefinition;

class CountryExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'countryId',
                SwagShopPersonalDefinition::class,
                'country_id',
            )
        );
    }
    public function getDefinitionClass(): string
    {
        return CountryDefinition::class;
    }
}