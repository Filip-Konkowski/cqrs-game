<?php

namespace App\Game\Event;

use App\Game\Domain\GameId;
use BroadwaySerialization\Serialization\AutoSerializable;

class GameStarted extends GameEvent
{
    use AutoSerializable;

    /**
     * @var GameId
     */
    private $gameId;

    public function __construct(GameId $gameId)
    {
        parent::__construct($gameId);
    }

}