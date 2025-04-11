<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagShopPersonalEntity $entity)
 * @method void                set(string $key, SwagShopPersonalEntity $entity)
 * @method SwagShopPersonalEntity[]    getIterator()
 * @method SwagShopPersonalEntity[]    getElements()
 * @method SwagShopPersonalEntity|null get(string $key)
 * @method SwagShopPersonalEntity|null first()
 * @method SwagShopPersonalEntity|null last()
 */
class SwagShopPersonalCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagShopPersonalEntity::class;
    }
}