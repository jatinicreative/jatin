<?php declare(strict_types=1);

namespace SwagAccount\Core\Content\SwagAccount;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagAccountEntity $entity)
 * @method void                set(string $key, SwagAccountEntity $entity)
 * @method SwagAccountEntity[]    getIterator()
 * @method SwagAccountEntity[]    getElements()
 * @method SwagAccountEntity|null get(string $key)
 * @method SwagAccountEntity|null first()
 * @method SwagAccountEntity|null last()
 */
class SwagAccountCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagAccountEntity::class;
    }
}