<?php

/*
 * This file is part of Monsieur Biz's Sylius Robots Txt Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusRobotsTxtPlugin;

use LogicException;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class MonsieurBizSyliusRobotsTxtPlugin extends Bundle
{
    use SyliusPluginTrait;
    
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
