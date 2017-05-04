<?php

namespace App\Game\Domain;

use Broadway\Repository\Repository;

interface GameRepository extends Repository
{
    /**
     * @return GameId
     */
    public function nextIdentity();
}