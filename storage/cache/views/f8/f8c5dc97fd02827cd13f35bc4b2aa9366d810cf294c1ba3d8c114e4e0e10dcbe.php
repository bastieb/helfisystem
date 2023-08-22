<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* emails/password-reset */
class __TwigTemplate_82256257c3d0217fae95a3e1f6e500372f0d5b4b08e4abd742ef51d701197684 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'message' => [$this, 'block_message'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "emails/mail.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("emails/mail.twig", "emails/password-reset", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_message($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Please visit %s to recover your password.", [0 => ($this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/password/reset/") . twig_get_attribute($this->env, $this->source, ($context["reset"] ?? null), "token", [], "any", false, false, false, 3))]]), "html", null, true);
    }

    public function getTemplateName()
    {
        return "emails/password-reset";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "emails/password-reset", "/var/www/html/engelsystem/resources/views/emails/password-reset.twig");
    }
}
