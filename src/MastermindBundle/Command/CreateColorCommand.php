<?php
namespace MastermindBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class CreateColorCommand extends ContainerAwareCommand
{
    protected function configure() 
    {
     $this->setName('mastermind:create-color')
        ->setDescription('Creates a new color.')
        ->setHelp("Create new available color...")
        ->addArgument('colorName', InputArgument::REQUIRED, 'The color name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Creating new color:");
        $colorName = $input->getArgument('colorName');

        // retrieve the argument value using getArgument()
        $output->writeln('Color: '.$colorName);

        $colorManager = $this->getContainer()->get('mastermind.color.manager');
        $newColor = $colorManager->createNewColor($colorName);

        if (is_null($newColor)) {
            $output->writeln("Can't create color ".$colorName.", because it already exists.");
            exit();
        }

        $output->writeln("Successfully created new color ".$colorName." with id ".$newColor->getId());
    }
}