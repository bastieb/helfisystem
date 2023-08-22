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

/* admin/user/edit-shirt.twig */
class __TwigTemplate_9de5615b33663a6b878296e826519a405a874c16ead107cd7c253e121c4f86a9 extends Template
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "admin/user/edit-shirt.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "admin/user/edit-shirt.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "admin/user/edit-shirt.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["user.edit.shirt"]), "html", null, true);
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"container\">
        <h1>";
        // line 9
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>

        ";
        // line 11
        $this->loadTemplate("layouts/parts/messages.twig", "admin/user/edit-shirt.twig", 11)->display($context);
        // line 12
        echo "
        <form method=\"post\">
            ";
        // line 14
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "

            <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
        // line 18
        echo twig_call_macro($macros["f"], "macro_select", ["shirt_size", call_user_func_array($this->env->getFunction('config')->getCallable(), ["tshirt_sizes"]), call_user_func_array($this->env->getFunction('__')->getCallable(), ["user.shirt_size"]), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["userdata"] ?? null), "personalData", [], "any", false, false, false, 18), "shirt_size", [], "any", false, false, false, 18)], 18, $context, $this->getSourceContext());
        echo "
                </div>
                <div class=\"col-md-6\">
                    ";
        // line 21
        echo twig_call_macro($macros["f"], "macro_switch", ["arrived", call_user_func_array($this->env->getFunction('__')->getCallable(), ["user.arrived"]), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["userdata"] ?? null), "state", [], "any", false, false, false, 21), "arrived", [], "any", false, false, false, 21), ["disabled" =>  !call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["admin_arrive"])]], 21, $context, $this->getSourceContext());
        echo "

                    ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["userdata"] ?? null), "state", [], "any", false, false, false, 23), "force_active", [], "any", false, false, false, 23)) {
            // line 24
            echo "                        ";
            echo twig_call_macro($macros["f"], "macro_switch", ["force_active", call_user_func_array($this->env->getFunction('__')->getCallable(), ["user.force_active"]), true, ["disabled" => true]], 24, $context, $this->getSourceContext());
            echo "
                    ";
        }
        // line 26
        echo "
                    ";
        // line 27
        echo twig_call_macro($macros["f"], "macro_switch", ["active", call_user_func_array($this->env->getFunction('__')->getCallable(), ["user.active"]), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["userdata"] ?? null), "state", [], "any", false, false, false, 27), "active", [], "any", false, false, false, 27)], 27, $context, $this->getSourceContext());
        echo "

                    ";
        // line 29
        echo twig_call_macro($macros["f"], "macro_switch", ["got_shirt", call_user_func_array($this->env->getFunction('__')->getCallable(), ["user.got_shirt"]), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["userdata"] ?? null), "state", [], "any", false, false, false, 29), "got_shirt", [], "any", false, false, false, 29)], 29, $context, $this->getSourceContext());
        echo "
                </div>
                <div class=\"col-md-12\">
                    ";
        // line 32
        echo twig_call_macro($macros["f"], "macro_submit", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.save"])], 32, $context, $this->getSourceContext());
        echo "
                </div>
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "admin/user/edit-shirt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 32,  111 => 29,  106 => 27,  103 => 26,  97 => 24,  95 => 23,  90 => 21,  84 => 18,  77 => 14,  73 => 12,  71 => 11,  66 => 9,  63 => 8,  59 => 7,  52 => 5,  47 => 1,  45 => 3,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/user/edit-shirt.twig", "/var/www/html/engelsystem/resources/views/admin/user/edit-shirt.twig");
    }
}
