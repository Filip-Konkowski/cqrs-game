<?php

namespace App\Game\Application\CommandHandler;

use App\Game\Application\Command\GameStart;
use App\Game\Domain\Game;
use Broadway\CommandHandling\SimpleCommandHandler;

class StartGameCommandHandler extends SimpleCommandHandler
{
    public function handleStartGameCommand(GameStart $command)
    {
        $game = Game::create($command->id());

//        $this->
    }
}