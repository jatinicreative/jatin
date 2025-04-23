<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog\Extension;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlog\Core\Content\SwagBlog\SwagBlogDefinition;
use SwagBlog\Core\Content\SwagBlog\SwagBlogProductDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
          new ManyToManyAssociationField(
              'blogs',
              SwagBlogDefinition::class,
              SwagBlogProductDefinition::class,
              'product_id',
              'blog_id'
          )
        );
    }
    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }

}