<?php
namespace MastermindBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class RenameColorCommand extends ContainerAwareCommand
{
    protected function configure() 
    {
     $this->setName('mastermind:rename-color')
        ->setDescription('Renames a color.')
        ->setHelp("Renames a color...")
        ->addArgument('originalColorName', InputArgument::REQUIRED, 'The original color name.')
        ->addArgument('newColorName', InputArgument::REQUIRED, 'The new color name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $oldColorName = $input->getArgument('originalColorName');
        $newColorName = $input->getArgument('newColorName');

        // retrieve the argument value using getArgument()
        $output->writeln('Renaming color '.$oldColorName.' to '.$newColorName);

        $colorManager = $this->getContainer()->get('mastermind.color.manager');
        $newColor = $colorManager->renameColor($oldColorName, $newColorName);

        if (is_null($newColor)) {
            $output->writeln("Can't rename color ".$oldColorName.", because it doesn't exist.");
            exit();
        } elseif (!$newColor) {
            $output->writeln("Can't rename color ".$oldColorName." to ".$newColorName." because the color already exists.");
            exit();
        } 

        $output->writeln("Successfully renamed ".$oldColorName." to ".$newColorName);
    }
}