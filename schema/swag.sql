CREATE TABLE `swag_shop_personal` (
    `id` BINARY(16) NOT NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `country_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_shop_personal.translated` CHECK (JSON_VALID(`translated`)),
    KEY `fk.swag_shop_personal.country_id` (`country_id`),
    CONSTRAINT `fk.swag_shop_personal.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_shop_personal_translation` (
    `name` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `post_code` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(255) NOT NULL,
    `open_times` LONGTEXT NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    `swag_shop_personal_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `swag_shop_personal_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`language_id`,`swag_shop_personal_id`),
    KEY `fk.swag_shop_personal_translation.swag_shop_personal_id` (`swag_shop_personal_id`),
    KEY `fk.swag_shop_personal_translation.language_id` (`language_id`),
    CONSTRAINT `fk.swag_shop_personal_translation.swag_shop_personal_id` FOREIGN KEY (`swag_shop_personal_id`) REFERENCES `swag_shop_personal` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.swag_shop_personal_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
