<?php declare(strict_types=1);

namespace SwagProfile\Core\Content\SwagProfile\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagProfile\Core\Content\SwagProfile\SwagProfileEntity;
use Shopware\Core\System\Language\LanguageEntity;

class SwagProfileTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $swagProfileId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var SwagProfileEntity|null
     */
    protected $swagProfile;

    /**
     * @var LanguageEntity|null
     */
    protected $language;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getSwagProfileId(): string
    {
        return $this->swagProfileId;
    }

    public function setSwagProfileId(string $swagProfileId): void
    {
        $this->swagProfileId = $swagProfileId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getSwagProfile(): ?SwagProfileEntity
    {
        return $this->swagProfile;
    }

    public function setSwagProfile(?SwagProfileEntity $swagProfile): void
    {
        $this->swagProfile = $swagProfile;
    }

    public function getLanguage(): ?LanguageEntity
    {
        return $this->language;
    }

    public function setLanguage(?LanguageEntity $language): void
    {
        $this->language = $language;
    }
}