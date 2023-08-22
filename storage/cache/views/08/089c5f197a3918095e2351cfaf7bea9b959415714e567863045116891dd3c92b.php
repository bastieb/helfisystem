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

/* emails/news-new */
class __TwigTemplate_fda3c332ddb0682ba49b9e9549040b24dc7fe8b9b04461e0154861875ea2d9bb extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'introduction' => [$this, 'block_introduction'],
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
        $this->parent = $this->loadTemplate("emails/mail.twig", "emails/news-new", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_introduction($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["notification.news.new.introduction", [0 => twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "title", [], "any", false, false, false, 4), 1 => twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [], "any", false, false, false, 4), 2 => $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("/news/" . twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 4)))]]), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_message($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["notification.news.new.text", [0 => twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "title", [], "any", false, false, false, 8), 1 => twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [], "any", false, false, false, 8), 2 => $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("/news/" . twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 8)))]]), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "emails/news-new";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 8,  57 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "emails/news-new", "/var/www/html/engelsystem/resources/views/emails/news-new.twig");
    }
}
