<?php

namespace Untek\Develop\Package\Domain\Repositories\File;

use Untek\Core\Collection\Interfaces\Enumerable;
use Untek\Core\Collection\Helpers\CollectionHelper;
use Untek\Model\Entity\Interfaces\EntityIdInterface;
use Untek\Model\Query\Entities\Query;
use Untek\Model\Repository\Interfaces\ReadRepositoryInterface;
use Untek\Lib\Components\Store\StoreFile;
use Untek\Develop\Package\Domain\Entities\GroupEntity;

class GroupRepository implements ReadRepositoryInterface
{

    private $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function findAll(Query $query = null): Enumerable
    {
        $store = new StoreFile($this->fileName);
        $array = $store->load();
        //$collection = $this->forgeEntityCollection($array);
        //return $collection;

        $entityClass = $this->getEntityClass();
        return CollectionHelper::create($entityClass, $array);
    }

    public function count(Query $query = null): int
    {
        $collection = $this->findAll($query);
        return $collection->count();
    }

    public function findOneById($id, Query $query = null): EntityIdInterface
    {
        // TODO: Implement findOneById() method.
    }

    public function getEntityClass(): string
    {
        return GroupEntity::class;
    }

    /*public function _relations()
    {
        return [];
    }*/

}
