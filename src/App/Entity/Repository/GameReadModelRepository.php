<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 18.06.17
 * Time: 15:17
 */

namespace App\Game\Doctrine;


use App\Game\Domain\GameId;
use App\Game\Domain\GameRoot;
use Broadway\ReadModel\Identifiable;
use Broadway\ReadModel\Repository;

interface GameReadModelRepository extends Repository
{
    /**
     * @param  $data
     */
    public function save(Identifiable $data);

    /**
     * @param GameId $id
     *
     * @return GameId|null
     */
    public function find($id);

    /**
     * @param array $fields
     *
     * @return GameRoot[]
     */
    public function findBy(array $fields);

    /**
     * @return GameRoot[]
     */
    public function findAll();

    /**
     * @param GameId $id
     */
    public function remove($id);
}