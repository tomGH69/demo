<?php

namespace BackBundle\Command;

use BackBundle\Utils\Mailer;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SwiftMailerTestCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName("mailer:test");
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get(Mailer::class)->send("thomas.cautres@gmail.com", "thomas.cautres@gmail.com", "TEST", "TEST");
    }
}