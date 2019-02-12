<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Psr\Log\LoggerInterface;


class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky", name="lucky")
     */
    public function index(Request $request)
    {


      return $this->render('lucky/index.html.twig', [
          'controller_name' => 'LuckyController',
      ]);
    }

    /**
     * @Route("/lucky/number", name="number")
     */
    public function number(LoggerInterface $logger)
    {
      $logger->info('we are logging');

      $number = random_int(0,100);

      return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }

}
