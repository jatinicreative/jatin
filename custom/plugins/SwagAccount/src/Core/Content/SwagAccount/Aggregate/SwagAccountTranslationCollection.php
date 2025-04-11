<?php declare(strict_types=1);

namespace SwagAccount\Core\Content\SwagAccount\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagAccountTranslationEntity $entity)
 * @method void                set(string $key, SwagAccountTranslationEntity $entity)
 * @method SwagAccountTranslationEntity[]    getIterator()
 * @method SwagAccountTranslationEntity[]    getElements()
 * @method SwagAccountTranslationEntity|null get(string $key)
 * @method SwagAccountTranslationEntity|null first()
 * @method SwagAccountTranslationEntity|null last()
 */
class SwagAccountTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagAccountTranslationEntity::class;
    }
}