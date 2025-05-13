<?php declare(strict_types=1);

namespace CustomerRegistrationExtension\Subscriber;

use Shopware\Core\Framework\Struct\ArrayStruct;
use Shopware\Storefront\Page\Account\Login\AccountLoginPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use CustomerRegistrationExtension\Service\CustomerGroupService;

class RegistrationFormSubscriber implements EventSubscriberInterface
{
    private CustomerGroupService $customerGroupService;

    public function __construct(CustomerGroupService $customerGroupService)
    {
        $this->customerGroupService = $customerGroupService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AccountLoginPageLoadedEvent::class => 'onRegisterPageLoaded',
        ];
    }

    public function onRegisterPageLoaded(AccountLoginPageLoadedEvent $event): void
    {
        $customerGroups = $this->customerGroupService->getCustomerGroups($event->getContext());
        $event->getPage()->addExtension('customCustomerGroups', new ArrayStruct([
            'groups' => $customerGroups
        ]));
    }
}