<?php

namespace MolsM\DebugCommand\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DebugCommand extends Command
{
    // Use this constructure to inject objects
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('xdebug:debug');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
    }
}
