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

/* pages/questions/overview.twig */
class __TwigTemplate_22c359e56f320bdf98cac181095ce22b341bcd623484ecc3826ee24edbcc2bb2 extends Template
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
            'row' => [$this, 'block_row'],
            'questions' => [$this, 'block_questions'],
            'faq_text' => [$this, 'block_faq_text'],
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/questions/overview.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/questions/overview.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/questions/overview.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.questions"]), "html", null, true);
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "    <div class=\"container\">
        <div class=\"page-header\">
            <h1>
                ";
        // line 13
        $this->displayBlock("title", $context, $blocks);
        echo "

                ";
        // line 15
        if ( !((array_key_exists("is_admin", $context)) ? (_twig_default_filter(($context["is_admin"] ?? null), false)) : (false))) {
            // line 16
            echo "                    ";
            echo twig_call_macro($macros["m"], "macro_button", [twig_call_macro($macros["m"], "macro_icon", ["plus-lg"], 16, $context, $this->getSourceContext()), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("questions/new"), "secondary"], 16, $context, $this->getSourceContext());
            echo "
                ";
        }
        // line 18
        echo "            </h1>
        </div>

        ";
        // line 21
        $this->loadTemplate("layouts/parts/messages.twig", "pages/questions/overview.twig", 21)->display($context);
        // line 22
        echo "
        <div class=\"row\">
            ";
        // line 24
        $this->displayBlock('row', $context, $blocks);
        // line 91
        echo "        </div>
    </div>
";
    }

    // line 24
    public function block_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "                <div class=\"col-md-12\">
                    ";
        // line 26
        $this->displayBlock('questions', $context, $blocks);
        // line 89
        echo "                </div>
            ";
    }

    // line 26
    public function block_questions($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "                        ";
        $this->displayBlock('faq_text', $context, $blocks);
        // line 32
        echo "
                        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 34
            echo "                            <div class=\"row mb-4\">
                                <div class=\"col-md-12\">
                                    <div class=\"card ";
            // line 36
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 36) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-secondary";
            }
            echo "\">
                                        <div class=\"card-body bg-body\">
                                            ";
            // line 38
            echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "text", [], "any", false, false, false, 38), "html", null, true));
            echo "
                                        </div>

                                        <div class=\"card-footer ";
            // line 41
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 41) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-dark";
            }
            echo " d-flex align-items-center\">
                                            <div class=\"me-3\">
                                                ";
            // line 43
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 43, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["question"], "created_at", [], "any", false, false, false, 43), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 43), "html", null, true);
            echo "
                                            </div>

                                            ";
            // line 46
            if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["question.edit"])) {
                // line 47
                echo "                                                ";
                echo twig_call_macro($macros["m"], "macro_user", [twig_get_attribute($this->env, $this->source, $context["question"], "user", [], "any", false, false, false, 47)], 47, $context, $this->getSourceContext());
                echo "
                                                <div class=\"d-flex ms-auto\">
                                            ";
            }
            // line 50
            echo "
                                            ";
            // line 51
            if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["question"], "user", [], "any", false, false, false, 51), "id", [], "any", false, false, false, 51) == twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 51)) || call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["question.edit"]))) {
                // line 52
                echo "                                                <form
                                                    class=\"pe-1\"
                                                    action=\"\"
                                                    enctype=\"multipart/form-data\"
                                                    method=\"post\"
                                                >
                                                    ";
                // line 58
                echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
                echo "
                                                    ";
                // line 59
                echo twig_call_macro($macros["f"], "macro_hidden", ["id", twig_get_attribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 59)], 59, $context, $this->getSourceContext());
                echo "
                                                    ";
                // line 60
                echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["trash"], 60, $context, $this->getSourceContext()), ["name" => "delete", "btn_type" => "danger", "size" => "sm", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.delete"])]], 60, $context, $this->getSourceContext());
                echo "
                                                </form>
                                            ";
            }
            // line 63
            echo "
                                            ";
            // line 64
            if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["question.edit"])) {
                // line 65
                echo "                                                ";
                echo twig_call_macro($macros["m"], "macro_button", [twig_call_macro($macros["m"], "macro_icon", ["pencil-square"], 65, $context, $this->getSourceContext()), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("admin/questions/" . twig_get_attribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 65))), null, "sm"], 65, $context, $this->getSourceContext());
                echo "
                                                </div>
                                            ";
            }
            // line 68
            echo "                                        </div>
                                    </div>
                                </div>
                                ";
            // line 71
            if (twig_get_attribute($this->env, $this->source, $context["question"], "answer", [], "any", false, false, false, 71)) {
                // line 72
                echo "                                    <div class=\"col-md-11 offset-md-1 mt-3\">
                                        <div class=\"card bg-info\">
                                            <div class=\"card-body bg-body\">
                                                ";
                // line 75
                echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(twig_get_attribute($this->env, $this->source, $context["question"], "answer", [], "any", false, false, false, 75));
                echo "
                                            </div>
                                            <div class=\"card-footer ";
                // line 77
                if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 77) == "light")) {
                    echo "bg-light";
                } else {
                    echo "bg-dark";
                }
                echo " d-flex align-items-center\">
                                                <div class=\"me-3\">
                                                    ";
                // line 79
                echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 79, $context, $this->getSourceContext());
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["question"], "updated_at", [], "any", false, false, false, 79), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 79), "html", null, true);
                echo "
                                                </div>
                                                ";
                // line 81
                echo twig_call_macro($macros["m"], "macro_user", [twig_get_attribute($this->env, $this->source, $context["question"], "answerer", [], "any", false, false, false, 81)], 81, $context, $this->getSourceContext());
                echo "
                                            </div>
                                        </div>
                                    </div>
                                ";
            }
            // line 86
            echo "                            </div> <!-- row -->
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "                    ";
    }

    // line 27
    public function block_faq_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "                            ";
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["faq.view"])) {
            // line 29
            echo "                                <p>";
            echo call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.faq_link", [0 => $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/faq")]]);
            echo "</p>
                            ";
        }
        // line 31
        echo "                        ";
    }

    public function getTemplateName()
    {
        return "pages/questions/overview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 31,  278 => 29,  275 => 28,  271 => 27,  267 => 88,  260 => 86,  252 => 81,  245 => 79,  236 => 77,  231 => 75,  226 => 72,  224 => 71,  219 => 68,  212 => 65,  210 => 64,  207 => 63,  201 => 60,  197 => 59,  193 => 58,  185 => 52,  183 => 51,  180 => 50,  173 => 47,  171 => 46,  163 => 43,  154 => 41,  148 => 38,  139 => 36,  135 => 34,  131 => 33,  128 => 32,  125 => 27,  121 => 26,  116 => 89,  114 => 26,  111 => 25,  107 => 24,  101 => 91,  99 => 24,  95 => 22,  93 => 21,  88 => 18,  82 => 16,  80 => 15,  75 => 13,  70 => 10,  66 => 9,  59 => 6,  55 => 5,  50 => 1,  48 => 3,  46 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/questions/overview.twig", "/var/www/html/engelsystem/resources/views/pages/questions/overview.twig");
    }
}
