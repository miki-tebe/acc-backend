<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static USD()
 * @method static static ETB()
 */
final class CurrencyType extends Enum
{
    const USD = 0;
    const ETB = 1;
}
