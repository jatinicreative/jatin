<?php declare(strict_types=1);

namespace SwagShopPersonal\Core\Content\SwagShopPersonal;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagShopPersonal\Core\Content\SwagShopPersonal\Aggregate\SwagShopPersonalTranslationCollection;
use Shopware\Core\System\Country\CountryEntity;

class SwagShopPersonalEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool|null
     */
    protected $active;

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
    protected $personalId;

    /**
     * @var string|null
     */
    protected $countryId;

    /**
     * @var SwagShopPersonalTranslationCollection|null
     */
    protected $translations;

    /**
     * @var CountryEntity|null
     */
    protected $country;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var array|null
     */
    protected $translated;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

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

    public function getPersonalId(): string
    {
        return $this->personalId;
    }

    public function setPersonalId(string $personalId): void
    {
        $this->personalId = $personalId;
    }

    public function getCountryId(): ?string
    {
        return $this->countryId;
    }

    public function setCountryId(?string $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getTranslations(): ?SwagShopPersonalTranslationCollection
    {
        return $this->translations;
    }

    public function setTranslations(?SwagShopPersonalTranslationCollection $translations): void
    {
        $this->translations = $translations;
    }

    public function getCountry(): ?CountryEntity
    {
        return $this->country;
    }

    public function setCountry(?CountryEntity $country): void
    {
        $this->country = $country;
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

    public function getTranslated(): ?array
    {
        return $this->translated;
    }

    public function setTranslated(?array $translated): void
    {
        $this->translated = $translated;
    }
}