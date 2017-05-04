<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 30.04.17
 * Time: 10:39
 */

namespace App\Game\Event;


use App\Game\Domain\GameId;
use Broadway\Serializer\Serializable;

abstract class GameEvent implements Serializable
{
    /**
     * @var GameId
     */
    protected $id;

    /**
     * GameEvent constructor.
     * @param GameId $id
     */
    public function __construct(GameId $id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    protected static function deserializationCallbacks()
    {
        return ['id' => [GameId::class, 'deserialize']];
    }

    /**
     * @return GameId
     */
    public function id()
    {
        return $this->id;
    }


}