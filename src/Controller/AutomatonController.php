<?php

namespace App\Controller;

use App\Registry\CalculatorRegistry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutomatonController extends AbstractController
{
    /**
     * @Route("/automaton/{calculator}/change/{change}", name="automaton", requirements={"change"="\d+"})
     */
    public function index($change, $calculator)
    {
	$registry = new CalculatorRegistry();
	$calculator = $registry->getCalculatorFor($calculator);

	if (is_null($calculator)) {
		throw new NotFoundHttpException();
	}

	$change = $calculator->getChange($change);

	if (is_null($change)) {
		return $this->json($change, 204);
	}

        return $this->json($change);
    }
}
