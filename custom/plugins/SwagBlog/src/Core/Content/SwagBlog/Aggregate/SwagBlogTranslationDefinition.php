<?php declare(strict_types=1);

namespace SwagBlog\Core\Content\SwagBlog\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlog\Core\Content\SwagBlog\SwagBlogDefinition;

class SwagBlogTranslationDefinition extends EntityTranslationDefinition
{
    const ENTITY_NAME = 'swag_blog_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return SwagBlogTranslationEntity::class;
    }
    public function getCollectionClass(): string
    {
        return SwagBlogTranslationCollection::class;
    }
    protected function getParentDefinitionClass(): string
    {
        return SwagBlogDefinition::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name','name'))->addFlags(new Required()),
            (new LongTextField('description','description'))->addFlags(new Required()),
            (new FkField('swag_blog_id', 'blogId', SwagBlogDefinition::class))->addFlags(new Required()),
            (new FkField('language_id', 'languageId', SwagBlogTranslationDefinition::class))->addFlags(new Required()),
        ]);
    }
}