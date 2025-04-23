<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagBlogCategoryBlogEntity $entity)
 * @method void                set(string $key, SwagBlogCategoryBlogEntity $entity)
 * @method SwagBlogCategoryBlogEntity[]    getIterator()
 * @method SwagBlogCategoryBlogEntity[]    getElements()
 * @method SwagBlogCategoryBlogEntity|null get(string $key)
 * @method SwagBlogCategoryBlogEntity|null first()
 * @method SwagBlogCategoryBlogEntity|null last()
 */
class SwagBlogCategoryBlogCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagBlogCategoryBlogEntity::class;
    }
}