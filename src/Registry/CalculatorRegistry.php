<?php

declare(strict_types=1);

namespace App\Registry;

use App\Calculator\CalculatorInterface;

class CalculatorRegistry implements CalculatorRegistryInterface
{
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        $className = 'App\\Calculator\\'.ucfirst($model).'Calculator';
	
        if (!class_exists($className)) {
            return null;
        }
	
	$calculator = new $className();
        
	if (!$calculator instanceof CalculatorInterface) {
            return null;
        }

        return $calculator;
    }
}
