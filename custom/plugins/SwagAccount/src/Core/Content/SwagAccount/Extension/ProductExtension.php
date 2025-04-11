<?php declare(strict_types=1);

namespace SwagAccount\Core\Content\SwagAccount\Extension;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagAccount\Core\Content\SwagAccount\SwagAccountDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'product',
                SwagAccountDefinition::class,
                'product_id',
                'id'
            ),
        );
    }
    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
