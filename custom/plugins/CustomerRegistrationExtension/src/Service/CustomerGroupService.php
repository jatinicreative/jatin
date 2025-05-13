<?php declare(strict_types=1);

namespace CustomerRegistrationExtension\Service;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;

class CustomerGroupService
{
    private EntityRepository $customerGroupRepository;

    public function __construct(EntityRepository $customerGroupRepository)
    {
        $this->customerGroupRepository = $customerGroupRepository;
    }

    public function getCustomerGroups(Context $context): array
    {
        $criteria = new Criteria();
        $groups = $this->customerGroupRepository->search($criteria, $context)->getEntities();

        $options = [];
        foreach ($groups as $group) {
            $options[] = [
                'id' => $group->getId(),
                'name' => $group->getTranslation('name'),
            ];
        }
        return $options;
    }
}