<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 16.04.17
 * Time: 19:49
 */

namespace App\Game\Domain;


use Assert\Assertion;

class GameIdDepricted
{
    private $gameId;

    public function __construct($gameId)
    {
        Assertion::string($gameId);
        Assertion::uuid($gameId);
        $this->gameId = $gameId;
    }

    public function __toString()
    {
        return $this->gameId;
    }
}