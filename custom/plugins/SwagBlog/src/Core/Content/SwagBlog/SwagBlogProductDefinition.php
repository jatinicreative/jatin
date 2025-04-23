<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class SwagBlogProductDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_product';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return SwagBlogProductEntity::class;
    }

    public function getCollectionClass(): string
    {
        return SwagBlogProductCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('blog_id','blogId',SwagBlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(SwagBlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            (new FkField('product_id','productId',ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
        ]);
    }
}
