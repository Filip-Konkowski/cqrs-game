<?php

namespace App\Game\Domain;

use App\Assert\Assert;
use App\Model\StringValueObject;
use BroadwaySerialization\Serialization\AutoSerializable;
use Symfony\Component\Serializer\SerializerInterface;

class GameId extends StringValueObject implements SerializerInterface
{
    use AutoSerializable;

    public function __construct($gameId)
    {
        $this->validate($gameId);
        parent::__construct($gameId);

    }

    protected function validate($value)
    {
        Assert::string($value, 'The id is not string');
        Assert::uuid($value, 'The id (%s) is not valid');
    }

}