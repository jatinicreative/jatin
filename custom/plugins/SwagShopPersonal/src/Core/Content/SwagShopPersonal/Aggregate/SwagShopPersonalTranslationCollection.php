<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagShopPersonalTranslationEntity $entity)
 * @method void                set(string $key, SwagShopPersonalTranslationEntity $entity)
 * @method SwagShopPersonalTranslationEntity[]    getIterator()
 * @method SwagShopPersonalTranslationEntity[]    getElements()
 * @method SwagShopPersonalTranslationEntity|null get(string $key)
 * @method SwagShopPersonalTranslationEntity|null first()
 * @method SwagShopPersonalTranslationEntity|null last()
 */
class SwagShopPersonalTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagShopPersonalTranslationEntity::class;
    }
}