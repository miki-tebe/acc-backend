<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static M()
 * @method static static F()
 */
final class GenderType extends Enum
{
    const M = 0;
    const F = 1;
}
