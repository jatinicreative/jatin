<?php declare(strict_types=1);

namespace SwagShopFinder\Storefront\Subscriber;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use SwagShopFinder\Core\Content\ShopFinder\ShopFinderCollection;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FooterSubscriber implements EventSubscriberInterface
{
    private SystemConfigService $systemConfigService;
    private EntityRepository $shopFinderRepository;

    public function __construct(
        SystemConfigService $systemConfigService,
        EntityRepository $shopFinderRepository
    ) {
        $this->systemConfigService = $systemConfigService;
        $this->shopFinderRepository = $shopFinderRepository;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            FooterPageletLoadedEvent::class => 'onFooterPageletLoaded',
        ];
    }

    public function onFooterPageletLoaded(FooterPageletLoadedEvent $event): void
    {
        if (!$this->systemConfigService->get('SwagShopFinder.config.showInStorefront')) {
            return;
        }

        $shops = $this->fetchShops($event->getContext());

        $event->getPagelet()->addExtension('swag_shop_finder', $shops);
    }

    private function fetchShops(Context $context): ShopFinderCollection
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active', '1'));
        $criteria->setLimit(5);

        $searchResult = $this->shopFinderRepository->search($criteria, $context);
        $shopFinderCollection = new ShopFinderCollection($searchResult->getEntities()->getElements());

        return $shopFinderCollection;
    }
        }