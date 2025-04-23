<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;


class SwagBlogCategoryBlogDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_category_blog';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return SwagBlogCategoryBlogEntity::class;
    }

    public function getCollectionClass(): string
    {
        return SwagBlogCategoryBlogCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('blog_id','blogId',SwagBlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(SwagBlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            (new FkField('category_id','categoryId',SwagBlogCategoryDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(SwagBlogCategoryDefinition::class))->addFlags(new PrimaryKey(), new Required()),

        ]);
    }
}

