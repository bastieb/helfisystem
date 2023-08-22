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

/* errors/403 */
class __TwigTemplate_1f8500f6f0c4844c1f98c1d581833cf2c7c0714d6182f494a8846fac5971d0e6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content_headline_text' => [$this, 'block_content_headline_text'],
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
        // line 2
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "errors/403", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("errors/default.twig", "errors/403", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Forbidden"]), "html", null, true);
    }

    // line 6
    public function block_content_headline_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["You are not allowed to access this page"]), "html", null, true);
    }

    // line 8
    public function block_content_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "    ";
        if ($this->extensions['Engelsystem\Renderer\Twig\Extensions\Authentication']->isGuest()) {
            // line 10
            echo "        ";
            call_user_func_array($this->env->getFunction('session_set')->getCallable(), ["previous_page", twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "url", [], "any", false, false, false, 10)]);
            // line 11
            echo "
        <p>";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["page.403.login"]), "html", null, true);
            echo "</p>
        <p>";
            // line 13
            echo twig_call_macro($macros["m"], "macro_button", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["login.login"]), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("login")], 13, $context, $this->getSourceContext());
            echo "</p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "errors/403";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 13,  78 => 12,  75 => 11,  72 => 10,  69 => 9,  65 => 8,  58 => 6,  51 => 4,  46 => 1,  44 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "errors/403", "/var/www/html/engelsystem/resources/views/errors/403.twig");
    }
}
