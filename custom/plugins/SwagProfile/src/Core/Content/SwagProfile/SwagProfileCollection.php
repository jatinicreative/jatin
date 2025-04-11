<?php declare(strict_types=1);

namespace SwagProfile\Core\Content\SwagProfile;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagProfileEntity $entity)
 * @method void                set(string $key, SwagProfileEntity $entity)
 * @method SwagProfileEntity[]    getIterator()
 * @method SwagProfileEntity[]    getElements()
 * @method SwagProfileEntity|null get(string $key)
 * @method SwagProfileEntity|null first()
 * @method SwagProfileEntity|null last()
 */
class SwagProfileCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagProfileEntity::class;
    }
}