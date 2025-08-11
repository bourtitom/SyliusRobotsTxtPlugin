<?php

/*
 * This file is part of Monsieur Biz's Sylius Robots Txt Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusRobotsTxtPlugin\Controller;

use MonsieurBiz\SyliusSettingsPlugin\Settings\SettingsInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Webmozart\Assert\Assert;

final class RenderController extends AbstractController
{
    public function __invoke(
        SettingsInterface $robotstxtSettings,
        ChannelContextInterface $channelContext,
        string $settingName
    ): Response {
        $settingContent = $robotstxtSettings->getCurrentValue(
            $channelContext->getChannel(),
            null,
            $settingName
        );

        Assert::string($settingContent);
        $robotsTxtContent = trim($settingContent);

        if (empty($settingContent)) {
            throw $this->createNotFoundException();
        }

        return new Response($settingContent, Response::HTTP_OK, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
