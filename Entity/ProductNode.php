<?php
/**
 * Created by PhpStorm.
 * User: pivchenberg
 * DateTime: 02.04.2017 22:05
 */

namespace Pivchenberg\XenaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ProductNode
 * @package Pivchenberg\XenaBundle\Entity
 *
 * @ORM\Table(name="x_product_node")
 * @ORM\Entity()
 */
class ProductNode extends BaseNode
{
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;
}