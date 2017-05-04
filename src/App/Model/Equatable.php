<?php

namespace App\Model;

interface Equatable
{
    /**
     * @param object $object
     *
     * @return bool
     */
    public function equals($object);
}
