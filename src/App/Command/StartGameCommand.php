<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 17.04.17
 * Time: 16:14
 */

namespace App\Command;

class StartGameCommand
{
    public function start()
    {
        $now = new \DateTime();
        echo 'Game started at ' . $now->format('Y-m-d H:i:s');
    }


}