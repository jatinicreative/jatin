<?php declare(strict_types=1);

namespace SwagShopFinder1\Core\Content\ShopFinder1;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ShopFinder1Definition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_shop_finder1';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new BoolField('active', 'active'),
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('street', 'street'))->addFlags(new Required()),
            (new StringField('post_code', 'postCode'))->addFlags(new Required()),
            (new StringField('city', 'city'))->addFlags(new Required()),
            new StringField('url', 'url'),
            new StringField('telephone', 'telephone'),
            new LongTextField('open_times', 'openTimes'),
        ]);
    }
}