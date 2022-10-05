<?php 

namespace App\Controllers;


class ProductController
{
    // Show the product attributes based on the id.
    private $title;
    private $description;
    private $price;
    private $sku;
    private $image;
    public function read(int $id)
{
    $this->title = 'My first Product';
    $this->description = 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ';
    $this->price = 2.56;
    $this->sku = 'MVC-SP-PHP-01';
    $this->image = 'https://via.placeholder.com/150';

    return $this;
}
}