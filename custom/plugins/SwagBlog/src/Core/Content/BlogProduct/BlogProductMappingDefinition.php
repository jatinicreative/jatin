<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\BlogProduct;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;
use SwagBlog\Core\Content\Blog\BlogDefinition;

class BlogProductMappingDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME = 'blog_product_mapping';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('blog_id','blogId',BlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id','productId',ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            new ManyToOneAssociationField('product','product_id',ProductDefinition::class,'id'),
            new ManyToOneAssociationField('blog','blog_id',BlogDefinition::class,'id'),
        ]);
    }
}
