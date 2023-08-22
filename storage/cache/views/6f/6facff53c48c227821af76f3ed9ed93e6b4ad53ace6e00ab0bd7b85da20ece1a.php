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

/* pages/password/reset */
class __TwigTemplate_959cef49ea67692c9cfc051ce562d24494d0f9c0de673d9e86fbdf93dbcd5cfa extends Template
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
            'row_content' => [$this, 'block_row_content'],
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
        // line 2
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/password/reset", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/password/reset", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/password/reset", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Password recovery"]), "html", null, true);
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"container\">
        <h1>";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Password recovery"]), "html", null, true);
        echo "</h1>

        ";
        // line 11
        $this->loadTemplate("layouts/parts/messages.twig", "pages/password/reset", 11)->display($context);
        // line 12
        echo "
        <div class=\"row\">
            ";
        // line 14
        $this->displayBlock('row_content', $context, $blocks);
        // line 26
        echo "        </div>
    </div>
";
    }

    // line 14
    public function block_row_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "                <div class=\"col-md-8\">
                    <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
                        ";
        // line 17
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "

                        ";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["We will send you an e-mail with a password recovery link. Please use the email address you used for registration."]), "html", null, true);
        echo "
                        ";
        // line 20
        echo twig_call_macro($macros["f"], "macro_input", ["email", call_user_func_array($this->env->getFunction('__')->getCallable(), ["E-Mail"]), "email", ["required" => true]], 20, $context, $this->getSourceContext());
        echo "

                        ";
        // line 22
        echo twig_call_macro($macros["f"], "macro_submit", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["Recover"])], 22, $context, $this->getSourceContext());
        echo "
                    </form>
                </div>
            ";
    }

    public function getTemplateName()
    {
        return "pages/password/reset";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 22,  103 => 20,  99 => 19,  94 => 17,  90 => 15,  86 => 14,  80 => 26,  78 => 14,  74 => 12,  72 => 11,  67 => 9,  64 => 8,  60 => 7,  53 => 5,  48 => 1,  46 => 3,  44 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/password/reset", "/var/www/html/engelsystem/resources/views/pages/password/reset.twig");
    }
}
