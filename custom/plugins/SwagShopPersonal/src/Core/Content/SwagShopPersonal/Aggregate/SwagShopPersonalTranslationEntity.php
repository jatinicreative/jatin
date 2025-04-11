<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagShopPersonal\Core\Content\SwagShopPersonal\SwagShopPersonalEntity;
use Shopware\Core\System\Language\LanguageEntity;

class SwagShopPersonalTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $postCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var string
     */
    protected $openTimes;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var string
     */
    protected $personalId;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var string
     */
    protected $swagShopPersonalId;

    /**
     * @var SwagShopPersonalEntity|null
     */
    protected $swagShopPersonal;

    /**
     * @var LanguageEntity|null
     */
    protected $language;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getOpenTimes(): string
    {
        return $this->openTimes;
    }

    public function setOpenTimes(string $openTimes): void
    {
        $this->openTimes = $openTimes;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getPersonalId(): string
    {
        return $this->personalId;
    }

    public function setPersonalId(string $personalId): void
    {
        $this->personalId = $personalId;
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

    public function getSwagShopPersonalId(): string
    {
        return $this->swagShopPersonalId;
    }

    public function setSwagShopPersonalId(string $swagShopPersonalId): void
    {
        $this->swagShopPersonalId = $swagShopPersonalId;
    }

    public function getSwagShopPersonal(): ?SwagShopPersonalEntity
    {
        return $this->swagShopPersonal;
    }

    public function setSwagShopPersonal(?SwagShopPersonalEntity $swagShopPersonal): void
    {
        $this->swagShopPersonal = $swagShopPersonal;
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