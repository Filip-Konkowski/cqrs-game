<?php

namespace App\Game\Application\CommandHandler;

use App\Game\Application\Command\GameStart;
use App\Game\Domain\GameRoot;
use Broadway\CommandHandling\SimpleCommandHandler;

class StartGameCommandHandler extends AbstractGameHandler
{
    public function handleStartGameCommand(GameStart $command)
    {
        $game = GameRoot::create($command->id());

        $this->save($game);
    }
}