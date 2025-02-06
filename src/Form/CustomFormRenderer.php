<?php

namespace App\Form;

use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\TwoFactorFormRendererInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\FirewallMapInterface;
use Twig\Environment;

class CustomFormRenderer implements TwoFactorFormRendererInterface
{
    public function __construct(
        private Environment $twigEnvironment,
        private FirewallMapInterface $firewallMap,
        private array $templates, // Map of [firewall name => template path]
    ) {
    }

    public function renderForm(Request $request, array $templateVars): Response
    {
        $firewallName = $this->firewallMap->getFirewallConfig($request)->getName();
        $template = $this->templates[$firewallName];

        $content = $this->twigEnvironment->render($template, $templateVars);
        $response = new Response();
        $response->setContent($content);

        return $response;
    }
}