<?php

use Untek\Framework\Console\Symfony4\Interfaces\CommandConfiguratorInterface;
use Untek\Develop\Package\Commands\DepsCommand;
use Untek\Develop\Package\Commands\DepsUnusedCommand;
use Untek\Develop\Package\Commands\GitBranchByVersionCommand;
use Untek\Develop\Package\Commands\GitBranchCheckoutToRootCommand;
use Untek\Develop\Package\Commands\GitBranchCommand;
use Untek\Develop\Package\Commands\GitChangedCommand;
use Untek\Develop\Package\Commands\GithubOrgsCommand;
use Untek\Develop\Package\Commands\GitNeedReleaseCommand;
use Untek\Develop\Package\Commands\GitPullCommand;
use Untek\Develop\Package\Commands\GitPushCommand;
use Untek\Develop\Package\Commands\GitStashAllCommand;
use Untek\Develop\Package\Commands\GitVersionCommand;
use Untek\Develop\Package\Commands\GitCheckoutCommand;

return function (CommandConfiguratorInterface $commandConfigurator) {
    $commandConfigurator->registerCommandClass(DepsCommand::class);
    $commandConfigurator->registerCommandClass(DepsUnusedCommand::class);
    $commandConfigurator->registerCommandClass(GitBranchByVersionCommand::class);
    $commandConfigurator->registerCommandClass(GitCheckoutCommand::class);
    $commandConfigurator->registerCommandClass(GitBranchCheckoutToRootCommand::class);
    $commandConfigurator->registerCommandClass(GitBranchCommand::class);
    $commandConfigurator->registerCommandClass(GitChangedCommand::class);
    $commandConfigurator->registerCommandClass(GithubOrgsCommand::class);
    $commandConfigurator->registerCommandClass(GitNeedReleaseCommand::class);
    $commandConfigurator->registerCommandClass(GitPullCommand::class);
    $commandConfigurator->registerCommandClass(GitPushCommand::class);
    $commandConfigurator->registerCommandClass(GitStashAllCommand::class);
    $commandConfigurator->registerCommandClass(GitVersionCommand::class);
};
