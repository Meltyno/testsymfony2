<?php

// /*
//     Malheureusement pas eu le temps de chercher d'avantage un many to many
// */

// // src/AppBundle/Entity/Product.php
// namespace AppBundle\Entity;

// use Doctrine\ORM\Mapping as ORM;

// /**
//  * ORM\Entity
//  * ORM\Table(name="product")
//  */
// class Product_tag
// {
//     /**
//      * ORM\Column(type="integer")
//      * ORM\Id
//      * ORM\GeneratedValue(strategy="AUTO")
//      */
//     protected $id;

//     /**
//      * ORM\ManyToOne(targetEntity="Product", inversedBy="Product_tag")
//      * ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=FALSE)
//      */
//     protected $product;

//     /**
//      * ORM\ManyToOne(targetEntity="Tag", inversedBy="Product_tag")
//      * ORM\JoinColumn(name="tag_id", referencedColumnName="id", nullable=FALSE)
//      */
//     protected $tag;
// }