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

/* pages/questions/edit.twig */
class __TwigTemplate_de3a9b8296fe41eb3efd4440b7282394757c3313923083639d10bd55e2d2827c extends Template
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/questions/edit.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/questions/edit.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/questions/edit.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, (((($context["question"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "id", [], "any", false, false, false, 5))) ? (call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.edit"])) : (call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.add"]))), "html", null, true);
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
        $this->loadTemplate("layouts/parts/messages.twig", "pages/questions/edit.twig", 11)->display($context);
        // line 12
        echo "
        ";
        // line 13
        if ((($context["question"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "id", [], "any", false, false, false, 13))) {
            // line 14
            echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    <p>
                        ";
            // line 17
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 17, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "updated_at", [], "any", false, false, false, 17), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 17), "html", null, true);
            echo "

                        ";
            // line 19
            if ((twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "updated_at", [], "any", false, false, false, 19) != twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "created_at", [], "any", false, false, false, 19))) {
                // line 20
                echo "                            &emsp;";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.updated"]), "html", null, true);
                echo "
                            <br>
                            ";
                // line 22
                echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 22, $context, $this->getSourceContext());
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "created_at", [], "any", false, false, false, 22), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 22), "html", null, true);
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

            <div class=\"row\">
                <div class=\"col-md-12\">
                    ";
        // line 34
        echo twig_call_macro($macros["f"], "macro_textarea", ["text", call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.question"]), ["required" => true, "rows" => 10, "value" => ((($context["question"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "text", [], "any", false, false, false, 34)) : (""))]], 34, $context, $this->getSourceContext());
        echo "
                </div>
                <div class=\"col-md-12\">
                    ";
        // line 37
        if (((array_key_exists("is_admin", $context)) ? (_twig_default_filter(($context["is_admin"] ?? null), false)) : (false))) {
            // line 38
            echo "                        ";
            echo twig_call_macro($macros["f"], "macro_textarea", ["answer", call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.answer"]), ["required" => true, "rows" => 10, "value" => ((($context["question"] ?? null)) ? (twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "answer", [], "any", false, false, false, 38)) : (""))]], 38, $context, $this->getSourceContext());
            echo "
                    ";
        }
        // line 40
        echo "
                    ";
        // line 41
        echo twig_call_macro($macros["f"], "macro_submit", [], 41, $context, $this->getSourceContext());
        echo "

                    ";
        // line 43
        if (((array_key_exists("is_admin", $context)) ? (_twig_default_filter(($context["is_admin"] ?? null), false)) : (false))) {
            // line 44
            echo "                        ";
            echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["eye"], 44, $context, $this->getSourceContext()), ["name" => "preview", "btn_type" => "info", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.preview"])]], 44, $context, $this->getSourceContext());
            echo "

                        ";
            // line 46
            if ((($context["question"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "id", [], "any", false, false, false, 46))) {
                // line 47
                echo "                            ";
                echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["trash"], 47, $context, $this->getSourceContext()), ["name" => "delete", "btn_type" => "danger", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.delete"])]], 47, $context, $this->getSourceContext());
                echo "
                        ";
            }
            // line 49
            echo "                    ";
        }
        // line 50
        echo "                </div>
            </div>

            ";
        // line 53
        if (($context["question"] ?? null)) {
            // line 54
            echo "                <div class=\"row mt-3\">
                    <div class=\"col-md-12\">
                        <h2>";
            // line 56
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.preview"]), "html", null, true);
            echo "</h2>

                        <div class=\"card ";
            // line 58
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 58) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-secondary";
            }
            echo " mb-4\">
                            <div class=\"card-body bg-body\">
                                ";
            // line 60
            echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "text", [], "any", false, false, false, 60), "html", null, true));
            echo "
                            </div>
                        </div>
                    </div>

                    ";
            // line 65
            if (twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "answer", [], "any", false, false, false, 65)) {
                // line 66
                echo "                        <div class=\"col-md-11 offset-md-1\">
                            <div class=\"card bg-info\">
                                <div class=\"card-body bg-body\">
                                    ";
                // line 69
                echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "answer", [], "any", false, false, false, 69));
                echo "
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 74
            echo "                </div>
            ";
        }
        // line 76
        echo "
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/questions/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 76,  211 => 74,  203 => 69,  198 => 66,  196 => 65,  188 => 60,  179 => 58,  174 => 56,  170 => 54,  168 => 53,  163 => 50,  160 => 49,  154 => 47,  152 => 46,  146 => 44,  144 => 43,  139 => 41,  136 => 40,  130 => 38,  128 => 37,  122 => 34,  115 => 30,  111 => 28,  105 => 24,  98 => 22,  92 => 20,  90 => 19,  83 => 17,  78 => 14,  76 => 13,  73 => 12,  71 => 11,  66 => 9,  63 => 8,  59 => 7,  52 => 5,  47 => 1,  45 => 3,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/questions/edit.twig", "/var/www/html/engelsystem/resources/views/pages/questions/edit.twig");
    }
}
