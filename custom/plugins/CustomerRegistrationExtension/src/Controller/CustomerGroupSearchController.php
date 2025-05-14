<?php declare(strict_types=1);

namespace CustomerRegistrationExtension\Controller;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\ContainsFilter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(defaults: ['_routeScope'=> ['storefront']])]

class CustomerGroupSearchController extends AbstractController
{
    private EntityRepository $customerGroupRepository;

    public function __construct(EntityRepository $customerGroupRepository)
    {
        $this->customerGroupRepository = $customerGroupRepository;
    }


    #[Route(path: '/customer-group/search', name: 'frontend.customer.group.search', defaults: ['auth_required' => false], methods: ["GET"])]
    public function search(Request $request, Context $context): JsonResponse
    {
        $term = $request->query->get('term');

        $criteria = new Criteria();
        $criteria->addFilter(new ContainsFilter('name', $term));
        $criteria->setLimit(10);

        $groups = $this->customerGroupRepository->search($criteria, $context);
        $result = [];

        foreach ($groups as $group) {
            $result[] = [
                'id' => $group->getId(),
                'name' => $group->getTranslation('name'),
            ];
        }

        return new JsonResponse($result);
    }
}