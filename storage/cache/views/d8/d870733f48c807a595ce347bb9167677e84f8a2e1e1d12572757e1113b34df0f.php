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

/* pages/password/reset-success */
class __TwigTemplate_67d3b4aaf5d52694b9b7bbebed694928d73212593226312f2751a19057477385 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'row_content' => [$this, 'block_row_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "pages/password/reset.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/password/reset-success", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("pages/password/reset.twig", "pages/password/reset-success", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_row_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <div class=\"col-md-12\">
        ";
        // line 6
        if ((($context["type"] ?? null) == "email")) {
            // line 7
            echo "            ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["We sent you an email containing your password recovery link."]), "info"], 7, $context, $this->getSourceContext());
            echo "
        ";
        } elseif ((        // line 8
($context["type"] ?? null) == "reset")) {
            // line 9
            echo "            ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["Password saved."]), "success"], 9, $context, $this->getSourceContext());
            echo "
        ";
        }
        // line 11
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/password/reset-success";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 11,  65 => 9,  63 => 8,  58 => 7,  56 => 6,  53 => 5,  49 => 4,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/password/reset-success", "/var/www/html/engelsystem/resources/views/pages/password/reset-success.twig");
    }
}
