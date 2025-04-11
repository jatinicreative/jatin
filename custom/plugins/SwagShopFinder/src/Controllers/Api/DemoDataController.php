<?php declare(strict_types=1);

namespace SwagShopFinder\Controllers\Api;

use Faker\Factory;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(defaults: ['_routeScope' => ['api']])]
class DemoDataController extends AbstractController {

    private EntityRepository $shopFinderRepository;

    public function __construct( EntityRepository $shopFinderRepository)
    {
        $this->shopFinderRepository = $shopFinderRepository;
    }

    #[Route('api/_action/swag-shop-finder/generate', name: 'api.custom.swag_shop_fin    der.generate', defaults: ['auth_required' => false], methods: ['POST', 'GET'])]
    public function generate(Context $context): Response
    {
        $faker = Factory::create();

        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'id' => Uuid::randomHex(),
                'active' => true,
                'name' => $faker->name,
                'street' => $faker->streetAddress,
                'postCode' => $faker->postcode,
                'city' => $faker->city,

            ];
        }
        $this->shopFinderRepository->create($data, $context);

        return new Response('', Response::HTTP_NO_CONTENT);
    }

}
