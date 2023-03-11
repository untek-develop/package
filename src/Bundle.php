<?php

namespace Untek\Develop\Package;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Untek\Core\Bundle\Base\BaseBundle;
use Untek\Framework\Console\Symfony4\Libs\CommandConfigurator;
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

class Bundle extends BaseBundle
{

    public function getName(): string
    {
        return 'package';
    }

    public function deps(): array
    {
        return [
            new \Untek\Develop\Bundle\Bundle(['all']),
        ];
    }

    public function symfonyAdmin(): array
    {
        return [
            __DIR__ . '/Symfony4/Admin/config/routing.php',
        ];
    }

    /*public function console(): array
    {
        return [
            'Untek\Develop\Package\Commands',
        ];
    }*/


    public function consoleCommands(Application $application, ContainerInterface $container, CommandConfigurator $commandConfigurator) {
        $commandConfigurator->registerCommandClass(DepsCommand::class);
        $commandConfigurator->registerCommandClass(DepsUnusedCommand::class);
        $commandConfigurator->registerCommandClass(GitBranchByVersionCommand::class);
        $commandConfigurator->registerCommandClass(GitBranchCheckoutToRootCommand::class);
        $commandConfigurator->registerCommandClass(GitBranchCommand::class);
        $commandConfigurator->registerCommandClass(GitChangedCommand::class);
        $commandConfigurator->registerCommandClass(GithubOrgsCommand::class);
        $commandConfigurator->registerCommandClass(GitNeedReleaseCommand::class);
        $commandConfigurator->registerCommandClass(GitPullCommand::class);
        $commandConfigurator->registerCommandClass(GitPushCommand::class);
        $commandConfigurator->registerCommandClass(GitStashAllCommand::class);
        $commandConfigurator->registerCommandClass(GitVersionCommand::class);
    }

    public function container(): array
    {
        return [
            __DIR__ . '/Domain/config/container.php',
        ];
    }
}
