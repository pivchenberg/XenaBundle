<?php
/**
 * Created by PhpStorm.
 * User: pivchenberg
 * DateTime: 02.04.2017 22:05
 */

namespace Pivchenberg\XenaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ArticleNode
 * @package Pivchenberg\XenaBundle\Entity
 *
 * @ORM\Table(name="x_article_node")
 * @ORM\Entity()
 */
class ArticleNode extends BaseNode
{
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $viewCount;
}