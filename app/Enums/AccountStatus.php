<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Active()
 * @method static static Inactive()
 * @method static static Suspended()
 */
final class AccountStatus extends Enum
{
    const Active = 0;
    const Inactive = 1;
    const Suspended = 2;
}
