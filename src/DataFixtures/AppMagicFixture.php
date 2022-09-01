<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AppMagicFixture extends Fixture
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    // public function load(ObjectManager $manager): void
    // {
    // }

    public function load(ObjectManager $manager): void
    {
        $response = $this->client->request(
            'GET',
            'https://api.scryfall.com/sets'
        );
        $content = $response->toArray();

        $category = new Category();
        $category->setName('Magic: the Gathering')
            ->setSlug('mtg')
        ;
        $manager->persist($category);
        $manager->flush();
        $manager->refresh($category);

        foreach ($content['data'] as $set) {
            $subcat = new Subcategory();
            $subcat->setName($set['name'])
                ->setSlug($set['code'])
            ;
            $category->addSubcategory($subcat);
            $manager->persist($subcat);
            $manager->flush();
            $manager->refresh($subcat);

            $response = $this->client->request(
                'GET',
                $set['search_uri'],
            );
            if (200 != $statusCode = $response->getStatusCode()) {
                continue;
            }
            $content = $response->toArray();

            foreach ($content['data'] as $card) {
                if (!isset($card['oracle_text'])) {
                    $description =
                        'front '.
                        $card['card_faces'][0]['oracle_text'].
                        ' - back '.
                        $card['card_faces'][1]['oracle_text']
                    ;
                } else {
                    $description = $card['oracle_text'];
                }
                $product = new Product();
                $product->setName($card['name'])
                    ->setType('single')
                    ->setDescription($description)
                    ->setSlug($card['set'].'-'.$card['collector_number'])
                    ->setSku($card['set'].'-'.$card['collector_number'])
                ;
                $subcat->addProduct($product);

                $manager->persist($product);
                $manager->flush();
                var_dump($card['name']);

                break 2;
            }
            unset($subcat);
            // $manager->clear();
        }
    }
}
