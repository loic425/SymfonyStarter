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

class ResourceHelper
{
    /** @var array */
    private $syliusResources;

    public function __construct(array $syliusResources)
    {
        $this->syliusResources = $syliusResources;
    }

    public function getResourcesAliases(): array
    {
        return array_keys($this->syliusResources);
    }

    public function isResourceAliasExist(string $resourceAlias): bool
    {
        return in_array($resourceAlias, $this->getResourcesAliases());
    }

    public function getResourceModelFromAlias(string $resourceAlias): string
    {
        [$appName, $resourceName] = $this->splitResourceAlias($resourceAlias);

        return sprintf('%s.model.%s.class', $appName, $resourceName);
    }

    public function getResourceNameFromAlias(string $resourceAlias): string
    {
        return $this->splitResourceAlias($resourceAlias)[1];
    }

    public function splitResourceAlias(string $resourceAlias): array
    {
        return explode('.', $resourceAlias);
    }
}
