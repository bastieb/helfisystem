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

/* errors/404 */
class __TwigTemplate_2f5ffd148494ee177381b939740defcfd522f026be824b7215f9f40af522622a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content_container' => [$this, 'block_content_container'],
            'content_text' => [$this, 'block_content_text'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "errors/default.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("errors/default.twig", "errors/404", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Page not found"]), "html", null, true);
    }

    // line 5
    public function block_content_container($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"row\">
        <div class=\"col-md-6 offset-md-3 col-lg-4 offset-lg-4 error-big\">
            <h2>
                4<span class=\"pulse\">:</span>";
        // line 9
        echo twig_escape_filter($this->env, twig_slice($this->env, ($context["status"] ?? null), 1, 2), "html", null, true);
        echo "
                <small class=\"text-muted\">";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["No sleep found"]), "html", null, true);
        echo "</small>
            </h2>

            ";
        // line 13
        $this->displayBlock('content_text', $context, $blocks);
        // line 16
        echo "        </div>
    </div>
";
    }

    // line 13
    public function block_content_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "                ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), [($context["content"] ?? null)]), "html", null, true);
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "errors/404";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 14,  82 => 13,  76 => 16,  74 => 13,  68 => 10,  64 => 9,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "errors/404", "/var/www/html/engelsystem/resources/views/errors/404.twig");
    }
}
