<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 18.06.17
 * Time: 09:15
 */

namespace App\Game\Doctrine;


use App\Game\Domain\GameId;
use App\Game\Domain\GameRepository;
use App\Game\Domain\GameRoot;
use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\AggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventSourcing\MetadataEnrichment\MetadataEnrichingEventStreamDecorator;
use Broadway\EventStore\EventStore;
use Broadway\UuidGenerator\UuidGeneratorInterface;

class DoctrineGameRepository extends EventSourcingRepository implements GameRepository
{
    /**
     * @var UuidGeneratorInterface
     */
    private $uuidGenerator;

    public function __construct(
        EventStore $eventStore,
        EventBus $eventBus,
        AggregateFactory $aggregateFactory,
        MetadataEnrichingEventStreamDecorator $eventStreamDecorator,
        UuidGeneratorInterface $uuidGenerator
    )
    {
        parent::__construct($eventStore, $eventBus, GameRoot::class, $aggregateFactory, [$eventStreamDecorator]);
        $this->uuidGenerator = $uuidGenerator;
    }

    /**
     * @return GameId
     */
    public function nextIdentity()
    {
        $id = GameId::fromString($this->uuidGenerator->generate());
        return $id;
    }
}