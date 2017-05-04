<?php

namespace App\Model;

interface Identifier
{
    /**
     * @param $identifier
     *
     * @return bool
     */
    public function equals($identifier);

    /**
     * @return string
     */
    public function toString();

    /**
     * @param string $id
     *
     * @return mixed
     */
    public static function fromString($id);
}
