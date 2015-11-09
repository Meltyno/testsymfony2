<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $tagrepo = $this->getDoctrine()->getRepository('AppBundle:Tag');
        $tags = $tagrepo->findAll();
        //var_dump($tags);

        $productrepo = $this->getDoctrine()->getRepository('AppBundle:Product');
        $products = $productrepo->findAll();
        // var_dump($products);

        // replace this example code with whatever you need
        return $this->render('default/home.html.twig', array(
            'tags' => $tags,
            'products' => $products,
        ));
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function productAction($id)
    {
        $productrepo = $this->getDoctrine()->getRepository('AppBundle:Product');
        $product = $productrepo->findOneById($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        // replace this example code with whatever you need
        return $this->render('default/getarticle.html.twig', array(
            'product' => $product,
        ));
    }

    /**
     * Route("/create/cat", name="createproduct")
     */
    // public function createAction()
    // {
    //     $product = new Product();
    //     $product->setName('A Foo Bar');
    //     $product->setPrice('19.99');
    //     $product->setWeight('5.50');
    //     $product->setDescription('Lorem ipsum dolor');

    //     $em = $this->getDoctrine()->getManager();

    //     $em->persist($product);
    //     $em->flush();

    //     return new Response('Created product id '.$product->getId());
    // }

    /**
     * @Route("/create/", name="createproduct")
     */
    public function newAction(Request $request){
        $product = new Product();
        // $product->setName('');
        // $product->setPrice('');
        // $product->setDescription('');
        // $product->setWeight('1');

        $form = $this->createFormBuilder($product)
            ->add('name', 'text')
            ->add('price', 'text')
            ->add('description', 'text')
            ->add('weight', 'text')
            ->add('save', 'submit', array('label' => 'Create product'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
