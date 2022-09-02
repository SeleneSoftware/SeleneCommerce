<?php

namespace App\Command;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\SubcategoryRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[AsCommand(
    name: 'app:export',
    description: 'Export Product List as JSON',
)]
class ExportCommand extends Command
{
    protected ProductRepository $productRepo;
    protected CategoryRepository $categoryRepo;
    protected SubcategoryRepository $subcategoryRepo;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepo,
        SubcategoryRepository $subcategoryRepo
    ) {
        $this->productRepo = $productRepository;
        $this->categoryRepo = $categoryRepository;
        $this->subcategoryRepo = $subcategoryRepository;
        parent::__construct();
    }

    protected function configure(): void
    {
        // $this
        //     ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
        //     ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        // ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // $io = new SymfonyStyle($input, $output);
        //
        // if ($arg1) {
        //     $io->note(sprintf('Exporting products as %s', 'JSON'));
        // }
        //
        // if ($input->getOption('option1')) {
        //     // ...
        // }
        //
        // $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        $products = $this->repo->findAll();

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getName();
            },
        ];
        $normalizers = [new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)];
        // $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($products, 'json');

        $output->write($jsonContent);

        return Command::SUCCESS;
    }
}
