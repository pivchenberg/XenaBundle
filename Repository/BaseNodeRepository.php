<?php
/**
 * Created by PhpStorm.
 * User: pivchenberg
 * DateTime: 03.04.2017 16:27
 */

namespace Pivchenberg\XenaBundle\Repository;

use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class BaseNodeRepository extends NestedTreeRepository
{
    public function findRootNodes()
    {
        return $this->createQueryBuilder('node')
            ->andWhere('node.lvl = 0')
            ->getQuery()
            ->execute();
    }
}