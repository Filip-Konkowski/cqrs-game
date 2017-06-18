<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 30.04.17
 * Time: 11:17
 */

namespace App\Game\Application\CommandHandler;

use App\Game\Domain\GameRepository;
use App\Game\Domain\GameRoot;
use Broadway\CommandHandling\SimpleCommandHandler;

abstract class AbstractGameHandler extends SimpleCommandHandler
{
    protected $repository;

    public function __construct(GameRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function save(GameRoot $game)
    {
        $this->repository->save($game);
    }
}