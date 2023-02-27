<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static On_Arrival()
 * @method static static Abyssinia()
 * @method static static Telebirr()
 * @method static static Amole()
 * @method static static CreditCard()
 * @method static static Not_Specified()
 */
final class PaymentType extends Enum
{
    const On_Arrival = 0;
    const Abyssinia = 1;
    const Telebirr = 2;
    const Amole = 3;
    const CreditCard = 4;
    const Not_Specified = 5;
}
