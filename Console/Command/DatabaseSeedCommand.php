<?php

namespace MolsM\Playground\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use MolsM\Playground\Seeds\Common\Customer as CustomerSeed;

class DatabaseSeedCommand extends Command
{
    protected $customerSeed;

    // Use this constructure to inject objects
    public function __construct(CustomerSeed $customerSeed)
    {
        $this->customerSeed = $customerSeed;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('db:seed');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->customerSeed->setRecords(1)->place();
    }
}