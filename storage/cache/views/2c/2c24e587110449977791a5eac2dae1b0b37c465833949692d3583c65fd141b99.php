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

/* errors/default.twig */
class __TwigTemplate_90a334613186017aceb55a9dfe85975cf1cad69cf728a5226a87d8653531ca2b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'content_container' => [$this, 'block_content_container'],
            'content_headline' => [$this, 'block_content_headline'],
            'content_headline_text' => [$this, 'block_content_headline_text'],
            'content_text' => [$this, 'block_content_text'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layouts/app.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/app.twig", "errors/default.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Error ";
        echo twig_escape_filter($this->env, ($context["status"] ?? null), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"container\">
        ";
        // line 7
        $this->displayBlock('content_container', $context, $blocks);
        // line 20
        echo "    </div>
";
    }

    // line 7
    public function block_content_container($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "            <div class=\"alert alert-info\">

                ";
        // line 10
        $this->displayBlock('content_headline', $context, $blocks);
        // line 13
        echo "
                ";
        // line 14
        $this->displayBlock('content_text', $context, $blocks);
        // line 17
        echo "
            </div>
        ";
    }

    // line 10
    public function block_content_headline($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "                    <h2>";
        $this->displayBlock('content_headline_text', $context, $blocks);
        echo "</h2>
                ";
    }

    public function block_content_headline_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Error ";
        echo twig_escape_filter($this->env, ($context["status"] ?? null), "html", null, true);
    }

    // line 14
    public function block_content_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "                    ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), [($context["content"] ?? null)]), "html", null, true);
        echo "
                ";
    }

    public function getTemplateName()
    {
        return "errors/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 15,  112 => 14,  98 => 11,  94 => 10,  88 => 17,  86 => 14,  83 => 13,  81 => 10,  77 => 8,  73 => 7,  68 => 20,  66 => 7,  63 => 6,  59 => 5,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "errors/default.twig", "/var/www/html/engelsystem/resources/views/errors/default.twig");
    }
}
