<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 29.04.17
 * Time: 18:22
 */

namespace App\Game\Domain;


use App\Combat;
use App\CombatReport;
use App\Game\Event\GameStarted;
use Broadway\EventSourcing\EventSourcedAggregateRoot;

class Game extends EventSourcedAggregateRoot
{
    private $id;
    /**
     * @var GameId
     */
    private $gameId;

    /**
     * Game constructor.
     * @param GameId $gameId
     * @internal param Combat $combat
     * @internal param CombatReport $combatReport
     */
    public function __construct(GameId $gameId)
    {
        $this->gameId = $gameId;
    }

    public static function create(GameId $gameId)
    {
        $game = new Game($gameId);

        $game->apply(new GameStarted($gameId));
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }
}