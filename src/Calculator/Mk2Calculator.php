<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Model\Change;

class Mk2Calculator implements CalculatorInterface
{
    public function getSupportedModel(): string
    {
        return 'mk2';
    }

    public function getChange(int $amount): ?Change
    {
        if (1 === $amount || 3 === $amount) {
            return null;
        }

        $change = new Change();

        if (1 === $amount % 2) {
            $change->bill5 = 1;
            $amount -= 5;
        }

        $change->bill10 = intval($amount / 10);
        $amount -= $change->bill10 * 10;
        $change->coin2 = intval($amount / 2);

        return $change;
    }
}
