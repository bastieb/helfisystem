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

/* pages/faq/overview.twig */
class __TwigTemplate_c0d8c74b9ecca57f51a484c81d66d4852229de793f7378795efcdf1cb7545f72 extends Template
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
            'questions_text' => [$this, 'block_questions_text'],
            'text' => [$this, 'block_text'],
            'row' => [$this, 'block_row'],
            'ask_question' => [$this, 'block_ask_question'],
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/faq/overview.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/faq/overview.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/faq/overview.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["faq.faq"]), "html", null, true);
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "    <div class=\"container\">
        <h1>
            ";
        // line 12
        $this->displayBlock("title", $context, $blocks);
        // line 14
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["faq.edit"])) {
            // line 15
            echo twig_call_macro($macros["m"], "macro_button", [twig_call_macro($macros["m"], "macro_icon", ["plus-lg"], 15, $context, $this->getSourceContext()), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("admin/faq"), "secondary"], 15, $context, $this->getSourceContext());
        }
        // line 17
        echo "        </h1>

        ";
        // line 19
        $this->loadTemplate("layouts/parts/messages.twig", "pages/faq/overview.twig", 19)->display($context);
        // line 20
        echo "
        <div class=\"row\">
            ";
        // line 22
        $this->displayBlock('questions_text', $context, $blocks);
        // line 27
        echo "
            ";
        // line 28
        $this->displayBlock('text', $context, $blocks);
        // line 35
        echo "
            ";
        // line 36
        $this->displayBlock('row', $context, $blocks);
        // line 67
        echo "
            ";
        // line 68
        $this->displayBlock('ask_question', $context, $blocks);
        // line 80
        echo "        </div>
    </div>
";
    }

    // line 22
    public function block_questions_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
        echo "                ";
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["question.add"])) {
            // line 24
            echo "                    <p>";
            echo call_user_func_array($this->env->getFunction('__')->getCallable(), ["faq.questions_link", [0 => $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/questions")]]);
            echo "</p>
                ";
        }
        // line 26
        echo "            ";
    }

    // line 28
    public function block_text($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "                ";
        if (((array_key_exists("text", $context)) ? (_twig_default_filter(($context["text"] ?? null), null)) : (null))) {
            // line 30
            echo "                    <div class=\"col-md-12\">
                        ";
            // line 31
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(($context["text"] ?? null));
            echo "
                    </div>
                ";
        }
        // line 34
        echo "            ";
    }

    // line 36
    public function block_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "                    <div class=\"col-md-12 faq\">
                        <span id=\"faq-";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 39), "html", null, true);
            echo "\" class=\"ref-id\"></span>
                        <div class=\"card ";
            // line 40
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 40) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-dark";
            }
            echo " mb-4\">
                            <h4 class=\"card-header\">
                                ";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 42), "html", null, true);
            echo "
                                <small class=\"text-muted\">
                                    <a class=\"ref-link\" href=\"#faq-";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 44), "html", null, true);
            echo "\">";
            echo twig_call_macro($macros["m"], "macro_icon", ["link"], 44, $context, $this->getSourceContext());
            echo "</a>
                                </small>
                            </h4>

                            <div class=\"card-body bg-body\">
                                ";
            // line 49
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(twig_get_attribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 49));
            echo "
                            </div>

                            <div class=\"card-footer ";
            // line 52
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 52) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-dark";
            }
            echo " d-flex align-items-center\">
                                <div class=\"me-3\">
                                    ";
            // line 54
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 54, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "updated_at", [], "any", false, false, false, 54), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 54), "html", null, true);
            echo "
                                </div>

                                ";
            // line 57
            if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["faq.edit"])) {
                // line 58
                echo "                                    <span class=\"ms-auto\">
                                        ";
                // line 59
                echo twig_call_macro($macros["m"], "macro_button", [twig_call_macro($macros["m"], "macro_icon", ["pencil-square"], 59, $context, $this->getSourceContext()), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("admin/faq/" . twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 59))), "secondary", "sm"], 59, $context, $this->getSourceContext());
                echo "
                                    </span>
                                ";
            }
            // line 62
            echo "                            </div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "            ";
    }

    // line 68
    public function block_ask_question($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        echo "                ";
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["question.add"])) {
            // line 70
            echo "                    <form action=\"";
            echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/questions/new"), "html", null, true);
            echo "\" enctype=\"multipart/form-data\" method=\"post\">
                        ";
            // line 71
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
            echo "
                        <div class=\"col-md-12\">
                            <h4>";
            // line 73
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.add"]), "html", null, true);
            echo "</h4>
                            ";
            // line 74
            echo twig_call_macro($macros["f"], "macro_textarea", ["text", call_user_func_array($this->env->getFunction('__')->getCallable(), ["question.question"]), ["required" => true, "rows" => 5]], 74, $context, $this->getSourceContext());
            echo "
                            ";
            // line 75
            echo twig_call_macro($macros["f"], "macro_submit", [], 75, $context, $this->getSourceContext());
            echo "
                        </div>
                    </form>
                ";
        }
        // line 79
        echo "            ";
    }

    public function getTemplateName()
    {
        return "pages/faq/overview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 79,  264 => 75,  260 => 74,  256 => 73,  251 => 71,  246 => 70,  243 => 69,  239 => 68,  235 => 66,  226 => 62,  220 => 59,  217 => 58,  215 => 57,  207 => 54,  198 => 52,  192 => 49,  182 => 44,  177 => 42,  168 => 40,  164 => 39,  161 => 38,  156 => 37,  152 => 36,  148 => 34,  142 => 31,  139 => 30,  136 => 29,  132 => 28,  128 => 26,  122 => 24,  119 => 23,  115 => 22,  109 => 80,  107 => 68,  104 => 67,  102 => 36,  99 => 35,  97 => 28,  94 => 27,  92 => 22,  88 => 20,  86 => 19,  82 => 17,  79 => 15,  77 => 14,  75 => 12,  71 => 10,  67 => 9,  60 => 6,  56 => 5,  51 => 1,  49 => 3,  47 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/faq/overview.twig", "/var/www/html/engelsystem/resources/views/pages/faq/overview.twig");
    }
}
