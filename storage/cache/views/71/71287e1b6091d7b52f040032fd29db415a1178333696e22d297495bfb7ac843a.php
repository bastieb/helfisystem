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

/* pages/news/news.twig */
class __TwigTemplate_21e36f528d9d3feff8877a09407939c3b254feecc21ee964239634fbfca29112 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'news' => [$this, 'block_news'],
            'comments' => [$this, 'block_comments'],
            'write_comment' => [$this, 'block_write_comment'],
        ];
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "pages/news/overview.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/news/news.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "pages/news/news.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("pages/news/overview.twig", "pages/news/news.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 5)) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.is_meeting"]), "html", null, true);
            echo " ";
        }
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "title", [], "any", false, false, false, 5), "html", null, true);
    }

    // line 7
    public function block_news($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        echo twig_call_macro($macros["_self"], "macro_news", [($context["news"] ?? null)], 8, $context, $this->getSourceContext());
        echo "
";
    }

    // line 11
    public function block_comments($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "    <div class=\"col-md-12 mt-4\">
        <h2>";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.comments"]), "html", null, true);
        echo "</h2>

        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "comments", [], "any", false, false, false, 15));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 16
            echo "        <div class=\"card ";
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 16) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-secondary";
            }
            echo " mb-4\">
                <div class=\"card-body ";
            // line 17
            echo twig_call_macro($macros["m"], "macro_type_bg_class", [], 17, $context, $this->getSourceContext());
            echo "\">
                    ";
            // line 18
            echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "text", [], "any", false, false, false, 18), "html", null, true));
            echo "
                </div>
                <div class=\"card-footer ";
            // line 20
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 20) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-dark";
            }
            echo " text-muted d-flex align-items-center\">
                    <div class=\"me-3\">
                        ";
            // line 22
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 22, $context, $this->getSourceContext());
            echo "
                        ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "created_at", [], "any", false, false, false, 23), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 23), "html", null, true);
            echo "
                    </div>
                    ";
            // line 25
            echo twig_call_macro($macros["m"], "macro_user", [twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 25)], 25, $context, $this->getSourceContext());
            echo "

                    ";
            // line 27
            if ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 27), "id", [], "any", false, false, false, 27) == twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 27)) || call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["admin_news"])) || call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["comment.delete"]))) {
                // line 28
                echo "                        <div class=\"ms-auto\">
                            <form
                                action=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("/news/comment/" . twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 30))), "html", null, true);
                echo "\" enctype=\"multipart/form-data\"
                                method=\"post\">
                                ";
                // line 32
                echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
                echo "
                                ";
                // line 33
                echo twig_call_macro($macros["f"], "macro_submit", [twig_call_macro($macros["m"], "macro_icon", ["trash"], 33, $context, $this->getSourceContext()), ["name" => "delete", "btn_type" => "danger", "size" => "sm", "title" => call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.delete"])]], 33, $context, $this->getSourceContext());
                echo "
                            </form>
                        </div>
                    ";
            }
            // line 37
            echo "                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    </div>
";
    }

    // line 43
    public function block_write_comment($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "    ";
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["news_comments"])) {
            // line 45
            echo "        <div class=\"col-md-12 mt-4\">
            <h3>";
            // line 46
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.comments.new"]), "html", null, true);
            echo "</h3>

            <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
                ";
            // line 49
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
            echo "
                ";
            // line 50
            echo twig_call_macro($macros["f"], "macro_textarea", ["comment", call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.comments.message"]), ["required" => true]], 50, $context, $this->getSourceContext());
            echo "
                ";
            // line 51
            echo twig_call_macro($macros["f"], "macro_submit", [], 51, $context, $this->getSourceContext());
            echo "
            </form>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "pages/news/news.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 51,  189 => 50,  185 => 49,  179 => 46,  176 => 45,  173 => 44,  169 => 43,  164 => 40,  156 => 37,  149 => 33,  145 => 32,  140 => 30,  136 => 28,  134 => 27,  129 => 25,  124 => 23,  120 => 22,  111 => 20,  106 => 18,  102 => 17,  93 => 16,  89 => 15,  84 => 13,  81 => 12,  77 => 11,  70 => 8,  66 => 7,  55 => 5,  50 => 1,  48 => 3,  46 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/news/news.twig", "/var/www/html/engelsystem/resources/views/pages/news/news.twig");
    }
}
