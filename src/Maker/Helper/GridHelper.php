<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Maker\Helper;

class GridHelper
{
    /** @var array */
    private $syliusGridFilters;

    public function __construct(array $syliusGridFilters)
    {
        $this->syliusGridFilters = $syliusGridFilters;
    }

    public function getFilterIds(): array
    {
        return array_keys($this->syliusGridFilters);
    }
}
