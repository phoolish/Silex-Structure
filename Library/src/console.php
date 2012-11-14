<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

$console = new Application('Application Console', '0.1');

$console->register('calc:add')
        ->setDescription('Calculates the sum of two numbers.')
        ->setDefinition(array(
            new InputArgument('x', InputArgument::REQUIRED, 'First'),
            new InputArgument('y', InputArgument::REQUIRED, 'Second'),
            new InputOption('round', null, null, 'Round result')
        ))
        ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
            $result = $input->getArgument('x') + $input->getArgument('y');

            if ($input->getOption('round')) {
                $result = round($result);
            }

            $output->write($result);
        });

$console->register('calc:sub')
        ->setDescription('Calculates the difference between two numbers.')
        ->setDefinition(array(
            new InputArgument('x', InputArgument::REQUIRED, 'First'),
            new InputArgument('y', InputArgument::REQUIRED, 'Second'),
            new InputOption('round', null, null, 'Round result')
        ))
        ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
            $result = $input->getArgument('x') - $input->getArgument('y');

            if ($input->getOption('round')) {
                $result = round($result);
            }

            $output->write($result);
        });

return $console;
