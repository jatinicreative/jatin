<?php declare(strict_types=1);

namespace SwagProfile\Core\Content\SwagProfile\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagProfileTranslationEntity $entity)
 * @method void                set(string $key, SwagProfileTranslationEntity $entity)
 * @method SwagProfileTranslationEntity[]    getIterator()
 * @method SwagProfileTranslationEntity[]    getElements()
 * @method SwagProfileTranslationEntity|null get(string $key)
 * @method SwagProfileTranslationEntity|null first()
 * @method SwagProfileTranslationEntity|null last()
 */
class SwagProfileTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagProfileTranslationEntity::class;
    }
}