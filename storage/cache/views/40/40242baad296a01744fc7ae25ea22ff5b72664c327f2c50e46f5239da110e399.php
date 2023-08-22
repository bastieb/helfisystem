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

/* layouts/parts/messages.twig */
class __TwigTemplate_b265e14b67f8510ba7061952e15f79b97fe705dc608c8c7f522d3ae5582d9aa2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "layouts/parts/messages.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        echo msg();
        echo "

";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(((array_key_exists("errors", $context)) ? (_twig_default_filter(($context["errors"] ?? null), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 6
            echo "    ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["message"]]), "danger"], 6, $context, $this->getSourceContext());
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "
";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(((array_key_exists("warnings", $context)) ? (_twig_default_filter(($context["warnings"] ?? null), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 10
            echo "    ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["message"]]), "warning"], 10, $context, $this->getSourceContext());
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "
";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(((array_key_exists("information", $context)) ? (_twig_default_filter(($context["information"] ?? null), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 14
            echo "    ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["message"]]), "info"], 14, $context, $this->getSourceContext());
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "
";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(((array_key_exists("messages", $context)) ? (_twig_default_filter(($context["messages"] ?? null), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 18
            echo "    ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["message"]]), "success"], 18, $context, $this->getSourceContext());
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "layouts/parts/messages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 18,  95 => 17,  92 => 16,  83 => 14,  79 => 13,  76 => 12,  67 => 10,  63 => 9,  60 => 8,  51 => 6,  47 => 5,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layouts/parts/messages.twig", "/var/www/html/engelsystem/resources/views/layouts/parts/messages.twig");
    }
}
