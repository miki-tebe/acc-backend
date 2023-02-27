<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Hotels()
 * @method static static Apartments()
 * @method static static Home()
 * @method static static Resorts()
 * @method static static GuestHouses()
 */
final class CategoryType extends Enum
{
    const Hotels = 0;
    const Apartments = 1;
    const Home = 2;
    const Resorts = 3;
    const GuestHouses = 4;
}
