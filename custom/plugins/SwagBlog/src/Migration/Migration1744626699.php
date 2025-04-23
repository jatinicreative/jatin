<?php declare(strict_types=1);

namespace SwagBlog\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
class Migration1744626699 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1744626699;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
        CREATE TABLE `blog` (
            `id` BINARY(16) NOT NULL,
            `release_date` DATE NOT NULL,
            `active` TINYINT(1) NOT NULL DEFAULT 0,
            `author` VARCHAR(255) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_blog_translation` (
            `name` VARCHAR(255) NOT NULL,
            `description` LONGTEXT NOT NULL,
            `blog_id` BINARY(16) NOT NULL,
            `language_id` BINARY(16) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`blog_id`,`language_id`),
            KEY `fk.swag_blog_translation.blog_id` (`blog_id`),
            KEY `fk.swag_blog_translation.language_id` (`language_id`),
            CONSTRAINT `fk.swag_blog_translation.blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk.swag_blog_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        
        CREATE TABLE `swag_blog_category` (
            `id` BINARY(16) NOT NULL,
            `name` VARCHAR(255) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        
        CREATE TABLE `swag_blog_product` (
            `blog_id` BINARY(16) NOT NULL,
            `blog_version_id` BINARY(16) NOT NULL,
            `product_id` BINARY(16) NOT NULL,
            `product_version_id` BINARY(16) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`blog_id`,`blog_version_id`,`product_id`,`product_version_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        
        CREATE TABLE `swag_blog_category_blog` (
            `blog_id` BINARY(16) NOT NULL,
            `blog_version_id` BINARY(16) NOT NULL,
            `category_id` BINARY(16) NOT NULL,
            `swag_blog_category_version_id` BINARY(16) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`blog_id`,`blog_version_id`,`category_id`,`swag_blog_category_version_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }
}
