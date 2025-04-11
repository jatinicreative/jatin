<?php declare(strict_types=1);

namespace SwagProfile\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
class Migration1744181579 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1744181579;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement("
        CREATE TABLE `swag_profile` (
            `id` BINARY(16) NOT NULL,
            `address` LONGTEXT NOT NULL,
            `dateOfBirth` DATE NOT NULL,
            `translated` JSON NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`),
            CONSTRAINT `json.swag_profile.translated` CHECK (JSON_VALID(`translated`))
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_profile_translation` (
            `first_name` VARCHAR(255) NOT NULL,
            `last_name` VARCHAR(255) NOT NULL,
            `swag_profile_id` BINARY(16),
            `language_id` BINARY(16),
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`swag_profile_id`,`language_id`),
            KEY `fk.swag_profile_translation.swag_profile_id` (`swag_profile_id`),
            KEY `fk.swag_profile_translation.language_id` (`language_id`),
            CONSTRAINT `fk.swag_profile_translation.swag_profile_id` FOREIGN KEY (`swag_profile_id`) REFERENCES `swag_profile` (`id`) ON DELETE SET DEFAULT ON UPDATE CASCADE,
            CONSTRAINT `fk.swag_profile_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET DEFAULT ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    
    ");
    }
}
