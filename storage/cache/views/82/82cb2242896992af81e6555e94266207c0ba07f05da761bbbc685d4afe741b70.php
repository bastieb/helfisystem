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

/* pages/settings/password */
class __TwigTemplate_1c83e67302014a17e685094ac23bddd67c0f46349d38ba676b673a6264cab801 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'row_content' => [$this, 'block_row_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "pages/settings/settings.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/settings/password", 2)->unwrap();
        // line 3
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/settings/password", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("pages/settings/settings.twig", "pages/settings/password", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.password"]), "html", null, true);
    }

    // line 7
    public function block_row_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "        <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
            ";
        // line 9
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "

            <div class=\"row\">
                <div class=\"col-md-12\">
                    ";
        // line 13
        echo twig_call_macro($macros["m"], "macro_info", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.password.info"])], 13, $context, $this->getSourceContext());
        echo "
                    ";
        // line 14
        echo twig_call_macro($macros["f"], "macro_input", ["password", call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.password.password"]), "password", ["required" => true]], 14, $context, $this->getSourceContext());
        // line 19
        echo "
                    ";
        // line 20
        echo twig_call_macro($macros["f"], "macro_input", ["new_password", call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.password.new_password"]), "password", ["min" =>         // line 24
($context["min_length"] ?? null), "required" => true]], 20, $context, $this->getSourceContext());
        // line 25
        echo "
                    ";
        // line 26
        echo twig_call_macro($macros["f"], "macro_input", ["new_password2", call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.password.new_password2"]), "password", ["min" =>         // line 30
($context["min_length"] ?? null), "required" => true]], 26, $context, $this->getSourceContext());
        // line 31
        echo "
                    ";
        // line 32
        echo twig_call_macro($macros["f"], "macro_submit", [], 32, $context, $this->getSourceContext());
        echo "
                </div>
            </div>
        </form>
";
    }

    public function getTemplateName()
    {
        return "pages/settings/password";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 32,  91 => 31,  89 => 30,  88 => 26,  85 => 25,  83 => 24,  82 => 20,  79 => 19,  77 => 14,  73 => 13,  66 => 9,  63 => 8,  59 => 7,  52 => 5,  47 => 1,  45 => 3,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/settings/password", "/var/www/html/engelsystem/resources/views/pages/settings/password.twig");
    }
}
