<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagBlogProductEntity $entity)
 * @method void                set(string $key, SwagBlogProductEntity $entity)
 * @method SwagBlogProductEntity[]    getIterator()
 * @method SwagBlogProductEntity[]    getElements()
 * @method SwagBlogProductEntity|null get(string $key)
 * @method SwagBlogProductEntity|null first()
 * @method SwagBlogProductEntity|null last()
 */
class SwagBlogProductCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagBlogProductEntity::class;
    }
}