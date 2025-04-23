<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlog\Core\Content\SwagBlog\Aggregate\SwagBlogTranslationDefinition;


class SwagBlogDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'blog';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return SwagBlogEntity::class;
    }
    public function getCollectionClass(): string
    {
        return SwagBlogCollection::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new PrimaryKey(),new Required()),
            new TranslatedField('name'),
            new TranslatedField('description'),
            (new DateField('release_date','releaseDate'))->addFlags(new Required()),
            (new BoolField('active','active'))->addFlags(new Required()),
            (new StringField('categories','categories'))->addFlags(new Required()),
            (new StringField('author','author'))->addFlags(new Required()),
            new TranslationsAssociationField(SwagBlogTranslationDefinition::class, 'blog_id'),

            new ManyToManyAssociationField(
                'categories',
                SwagBlogCategoryDefinition::class,
                SwagBlogCategoryBlogDefinition::class,
                'blog_id',
                'category_id'
            ),


            new ManyToManyAssociationField(
                'products',
                ProductDefinition::class,
                SwagBlogProductDefinition::class,
                'blog_id',
                'product_id'
            ),

        ]);
    }
}
