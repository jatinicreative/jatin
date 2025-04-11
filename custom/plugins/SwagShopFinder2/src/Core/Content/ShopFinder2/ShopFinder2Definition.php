<?php declare(strict_types=1);

namespace SwagShopFinder2\Core\Content\ShopFinder2;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ShopFinder2Definition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_shop_finder2';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([

        ]);
    }
}