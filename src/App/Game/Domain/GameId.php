<?php

namespace App\Game\Domain;

use App\Assert\Assert;
use App\Model\StringValueObject;
use BroadwaySerialization\Serialization\AutoSerializable;
use Symfony\Component\Serializer\SerializerInterface;

class GameId extends StringValueObject implements SerializerInterface
{
    use AutoSerializable;

    protected function validate($value)
    {
        Assert::uuid($value, 'The id (%s) is not valid');
    }

}