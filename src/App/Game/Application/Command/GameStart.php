<?php

namespace App\Game\Application\Command;


use App\Game\Domain\GameId;

class GameStart
{
    private $id;

    public function __construct(GameId $gameId)
    {
        $this->id = $gameId;
    }

    public function id()
    {
        return $this->id;
    }
}