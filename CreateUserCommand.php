<?php

/**
 * Created by PhpStorm.
 * User: costinel.duica
 * Date: 7/14/2017
 * Time: 10:13 AM
 */

namespace AppBundle\Command;


use AppBundle\Services\UserServices;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('create-user')->setDescription('Create a new user')
            ->addArgument('firstName', InputArgument::REQUIRED, 'The firstname of the user.')
            ->addArgument('lastName', InputArgument::REQUIRED, 'The lastname of the user.');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);


        $userCreator = $this->getContainer()->get(UserServices::SERVICE_NAME);

        $firstName = $input->getArgument('firstName');
        $lastName = $input->getArgument('lastName');
        $userCreator->createUser($firstName, $lastName);
    }
}