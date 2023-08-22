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

/* pages/news/edit.twig */
class __TwigTemplate_1113da556440d9eccbf008d310ecfde85db81bfeb597dfaf814a6dffc91cbb70 extends Template
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/news/edit.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/news/edit.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/news/edit.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, (((($context["news"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 5))) ? (call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.edit"])) : (call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.add"]))), "html", null, true);
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
        $this->loadTemplate("layouts/parts/messages.twig", "pages/news/edit.twig", 11)->display($context);
        // line 12
        echo "
        ";
        // line 13
        if ((($context["news"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 13))) {
            // line 14
            echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    <p>
                        ";
            // line 17
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 17, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "updated_at", [], "any", false, false, false, 17), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 17), "html", null, true);
            echo "

                        ";
            // line 19
            if ((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "updated_at", [], "any", false, false, false, 19) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "created_at", [], "any", false, false, false, 19))) {
                // line 20
                echo "                            &emsp;";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.updated"]), "html", null, true);
                echo "
                            <br>
                            ";
                // line 22
                echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 22, $context, $this->getSourceContext());
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "created_at", [], "any", false, false, false, 22), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 22), "html", null, true);
                echo "
                        ";
            }
            // line 24
            echo "
                        &emsp;";
            // line 25
            echo twig_call_macro($macros["m"], "macro_user", [twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "user", [], "any", false, false, false, 25)], 25, $context, $this->getSourceContext());
            echo "
                    </p>
                </div>
            </div>
        ";
        }
        // line 30
        echo "
        <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
            ";
        // line 32
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "

            <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
        // line 36
        echo twig_call_macro($macros["f"], "macro_input", ["title", call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.subject"]), null, ["required" => true, "value" => ((        // line 40
($context["news"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "title", [], "any", false, false, false, 40)) : (""))]], 36, $context, $this->getSourceContext());
        // line 41
        echo "
                </div>
                <div class=\"col-md-6\">
                    ";
        // line 44
        echo twig_call_macro($macros["f"], "macro_checkbox", ["is_meeting", call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.is_meeting"]), ($context["is_meeting"] ?? null)], 44, $context, $this->getSourceContext());
        echo "
                    ";
        // line 45
        echo twig_call_macro($macros["f"], "macro_checkbox", ["is_pinned", call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.is_pinned"]), ($context["is_pinned"] ?? null)], 45, $context, $this->getSourceContext());
        echo "
                </div>
            </div>

            <div class=\"row mb-4\">
                <div class=\"col-md-12\">
                    ";
        // line 51
        echo twig_call_macro($macros["f"], "macro_textarea", ["text", call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.message"]), ["required" => true, "rows" => 10, "value" => ((($context["news"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [], "any", false, false, false, 51)) : (""))]], 51, $context, $this->getSourceContext());
        echo "

                    <p>";
        // line 53
        echo twig_call_macro($macros["m"], "macro_info", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.edit.hint"])], 53, $context, $this->getSourceContext());
        echo "</p>

                    ";
        // line 55
        echo twig_call_macro($macros["f"], "macro_submit", [], 55, $context, $this->getSourceContext());
        echo "

                    ";
        // line 57
        echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["eye"], 57, $context, $this->getSourceContext()), ["name" => "preview", "btn_type" => "info", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.preview"])]], 57, $context, $this->getSourceContext());
        echo "

                    ";
        // line 59
        if ((($context["news"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 59))) {
            // line 60
            echo "                        ";
            echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["trash"], 60, $context, $this->getSourceContext()), ["name" => "delete", "btn_type" => "danger", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.delete"])]], 60, $context, $this->getSourceContext());
            echo "
                    ";
        }
        // line 62
        echo "                </div>
            </div>

            ";
        // line 65
        if (($context["news"] ?? null)) {
            // line 66
            echo "                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <h2>";
            // line 68
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.preview"]), "html", null, true);
            echo "</h2>

                        <div class=\"card ";
            // line 70
            if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 70)) {
                echo "bg-info";
            } else {
                if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 70) == "light")) {
                    echo "bg-light";
                } else {
                    echo "bg-secondary";
                }
            }
            echo " mb-4\">
                            <div class=\"card-header ";
            // line 71
            if ((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 71) && (twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 71) == "dark"))) {
                echo "text-white";
            }
            echo "\">
                                ";
            // line 72
            if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 72)) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.is_meeting"]), "html", null, true);
            }
            // line 73
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "title", [], "any", false, false, false, 73), "html", null, true);
            echo "
                            </div>
                            <div class=\"card-body bg-body\">
                                ";
            // line 76
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [], "any", false, false, false, 76), false);
            echo "
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 82
        echo "
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/news/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 82,  221 => 76,  214 => 73,  210 => 72,  204 => 71,  192 => 70,  187 => 68,  183 => 66,  181 => 65,  176 => 62,  170 => 60,  168 => 59,  163 => 57,  158 => 55,  153 => 53,  148 => 51,  139 => 45,  135 => 44,  130 => 41,  128 => 40,  127 => 36,  120 => 32,  116 => 30,  108 => 25,  105 => 24,  98 => 22,  92 => 20,  90 => 19,  83 => 17,  78 => 14,  76 => 13,  73 => 12,  71 => 11,  66 => 9,  63 => 8,  59 => 7,  52 => 5,  47 => 1,  45 => 3,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/news/edit.twig", "/var/www/html/engelsystem/resources/views/pages/news/edit.twig");
    }
}
