<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;



class SwagBlogCategoryDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_category';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return SwagBlogCategoryEntity::class;
    }
    public function getCollectionClass(): string
    {
        return SwagBlogCategoryCollection::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new PrimaryKey(),new Required()),
            (new StringField('name','name'))->addFlags(new Required()),

            new ManyToManyAssociationField(
                'blogs',
                SwagBlogDefinition::class,
                SwagBlogCategoryBlogDefinition::class,
                'category_id',
                'blog_id'
            ),
        ]);
    }
}
