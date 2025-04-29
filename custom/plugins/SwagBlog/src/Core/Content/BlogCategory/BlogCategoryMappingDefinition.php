<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\BlogCategory;

use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;
use SwagBlog\Core\Content\Blog\BlogDefinition;


class BlogCategoryMappingDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME = 'blog_category_mapping';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('blog_id','blogId',BlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('blog_category_id','categoryId',BlogCategoryDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            new ManyToOneAssociationField('category','blog_category_id', BlogCategoryDefinition::class, 'id'),
            new ManyToOneAssociationField('blog','blog_id',BlogDefinition::class, 'id'),
        ]);
    }
}

