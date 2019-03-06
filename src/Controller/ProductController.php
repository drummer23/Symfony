<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
      return new Response("i do nothing");
    }


    /**
     * @Route("/product/add", name="productadd")
     */
    public function add()
    {
        $categoriyEM = $this->getDoctrine()->getRepository(Category::class);

        $category = $categoriyEM->findOneBy(Array("name" => "Beverage"));

        if($category == null) {
            $category = new Category();
            $category->setName("Beverage");
        }

        $product = new Product();
        $product->setName("Coffee");
        $product->setDescription("I need many many many");
        $product->setPrice(100);
        $product->setCategory($category);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($category);
        $entityManager->persist($product);

        $entityManager->flush();

        return new Response("success");

    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(Product $product)
    {
      // use the Product!
      // ...

      return new Response('Check out this great product: '.$product->getName());
    }


    /**
     * @Route("/product/custom/{id}", name="product_show_custom")
     */
    public function showCustom($id)
    {
      $product = $this->getDoctrine()
          ->getRepository(Product::class)
          ->find($id);

      if (!$product) {
          throw $this->createNotFoundException(
              'No product found for id '.$id
          );
      }

      return new Response('Check out this great product: '.$product->getName());

      // or render a template
      // in the template, print things with {{ product.name }}
      // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/product/price/{price}", name="product_more_expensive")
     */
    public function getMoreExpensiveThan($price)
    {
      $products = $this->getDoctrine()
          ->getRepository(Product::class)
          ->findAllGreaterThanPrice($price);

      return new Response('Products more expensive: '. print_r($products));

    }

}
