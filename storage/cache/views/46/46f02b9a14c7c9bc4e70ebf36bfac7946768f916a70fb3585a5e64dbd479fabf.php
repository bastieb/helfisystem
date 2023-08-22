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

/* pages/faq/edit.twig */
class __TwigTemplate_09e3b17a207eb7d031ad5a77b0a79c01f07d46c5f483dda84c57ab56d3f5aaf7 extends Template
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/faq/edit.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/faq/edit.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/faq/edit.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, (((($context["faq"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "id", [], "any", false, false, false, 5))) ? (call_user_func_array($this->env->getFunction('__')->getCallable(), ["faq.edit"])) : (call_user_func_array($this->env->getFunction('__')->getCallable(), ["faq.add"]))), "html", null, true);
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
        $this->loadTemplate("layouts/parts/messages.twig", "pages/faq/edit.twig", 11)->display($context);
        // line 12
        echo "
        ";
        // line 13
        if ((($context["faq"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "id", [], "any", false, false, false, 13))) {
            // line 14
            echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    <p>
                        ";
            // line 17
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 17, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "updated_at", [], "any", false, false, false, 17), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 17), "html", null, true);
            echo "

                        ";
            // line 19
            if ((twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "updated_at", [], "any", false, false, false, 19) != twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "created_at", [], "any", false, false, false, 19))) {
                // line 20
                echo "                            &emsp;";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.updated"]), "html", null, true);
                echo "
                            <br>
                            ";
                // line 22
                echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 22, $context, $this->getSourceContext());
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "created_at", [], "any", false, false, false, 22), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 22), "html", null, true);
                echo "
                        ";
            }
            // line 24
            echo "                    </p>
                </div>
            </div>
        ";
        }
        // line 28
        echo "
        <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
            ";
        // line 30
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "

            <div class=\"row mb-4\">
                <div class=\"col-md-12\">
                    ";
        // line 34
        echo twig_call_macro($macros["f"], "macro_input", ["question", call_user_func_array($this->env->getFunction('__')->getCallable(), ["faq.question"]), null, ["required" => true, "value" => ((($context["faq"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "question", [], "any", false, false, false, 34)) : (""))]], 34, $context, $this->getSourceContext());
        echo "
                </div>
                <div class=\"col-md-12\">
                    ";
        // line 37
        echo twig_call_macro($macros["f"], "macro_textarea", ["text", call_user_func_array($this->env->getFunction('__')->getCallable(), ["faq.message"]), ["required" => true, "rows" => 10, "value" => ((($context["faq"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "text", [], "any", false, false, false, 37)) : (""))]], 37, $context, $this->getSourceContext());
        echo "

                    ";
        // line 39
        echo twig_call_macro($macros["f"], "macro_submit", [], 39, $context, $this->getSourceContext());
        echo "

                    ";
        // line 41
        echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["eye"], 41, $context, $this->getSourceContext()), ["name" => "preview", "btn_type" => "info", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.preview"])]], 41, $context, $this->getSourceContext());
        echo "

                    ";
        // line 43
        if ((($context["faq"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "id", [], "any", false, false, false, 43))) {
            // line 44
            echo "                        ";
            echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["trash"], 44, $context, $this->getSourceContext()), ["name" => "delete", "btn_type" => "danger", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.delete"])]], 44, $context, $this->getSourceContext());
            echo "
                    ";
        }
        // line 46
        echo "                </div>
            </div>

            ";
        // line 49
        if (($context["faq"] ?? null)) {
            // line 50
            echo "                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <h2>";
            // line 52
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.preview"]), "html", null, true);
            echo "</h2>

                        <div class=\"card ";
            // line 54
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 54) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-dark";
            }
            echo "\">
                            <div class=\"card-header\">
                                ";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "question", [], "any", false, false, false, 56), "html", null, true);
            echo "
                            </div>
                            <div class=\"card-body bg-body\">
                                ";
            // line 59
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "text", [], "any", false, false, false, 59));
            echo "
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 65
        echo "
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/faq/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 65,  182 => 59,  176 => 56,  167 => 54,  162 => 52,  158 => 50,  156 => 49,  151 => 46,  145 => 44,  143 => 43,  138 => 41,  133 => 39,  128 => 37,  122 => 34,  115 => 30,  111 => 28,  105 => 24,  98 => 22,  92 => 20,  90 => 19,  83 => 17,  78 => 14,  76 => 13,  73 => 12,  71 => 11,  66 => 9,  63 => 8,  59 => 7,  52 => 5,  47 => 1,  45 => 3,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/faq/edit.twig", "/var/www/html/engelsystem/resources/views/pages/faq/edit.twig");
    }
}
