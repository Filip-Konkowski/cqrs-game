<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 17.04.17
 * Time: 16:14
 */

namespace App\Command;

use App\Game\Application\Command\GameStart;
use App\Game\Domain\GameId;
use App\Game\Domain\GameRepository;
use Broadway\CommandHandling\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartGameCommand extends Command
{

    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * StartGameCommand constructor.
     * @param CommandBus $commandBus
     * @param GameRepository $gameRepository
     */
    public function __construct(CommandBus $commandBus, GameRepository $gameRepository)
    {
        parent::__construct();
        $this->commandBus = $commandBus;
        $this->gameRepository = $gameRepository;
    }

    protected function configure()
    {
        $this
            ->setName('start');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $gameId = new GameId('00000000-0000-0000-0000-000000000000');
        $gameCommand = new GameStart($gameId);


    }



}