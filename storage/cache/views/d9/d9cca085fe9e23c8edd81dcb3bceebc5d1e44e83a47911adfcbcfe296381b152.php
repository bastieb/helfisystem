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

/* pages/news/overview.twig */
class __TwigTemplate_c988a8777ad71cb71085f6ddfb588be5031bf5123917acce5dbb0431f03f29fd extends Template
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
            'news' => [$this, 'block_news'],
            'comments' => [$this, 'block_comments'],
            'pagination' => [$this, 'block_pagination'],
            'write_comment' => [$this, 'block_write_comment'],
        ];
        $macros["_self"] = $this->macros["_self"] = $this;
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/news/overview.twig", 2)->unwrap();
        // line 4
        $context["only_meetings"] = ((array_key_exists("only_meetings", $context)) ? (_twig_default_filter(($context["only_meetings"] ?? null), false)) : (false));
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/news/overview.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, (( !($context["only_meetings"] ?? null)) ? (call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.title"])) : (call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.title.meetings"]))), "html", null, true);
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"container\">
        <h1>
            ";
        // line 10
        $this->displayBlock("title", $context, $blocks);
        // line 11
        if ((call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["admin_news"]) && ((array_key_exists("is_overview", $context)) ? (_twig_default_filter(($context["is_overview"] ?? null), false)) : (false)))) {
            // line 12
            echo twig_call_macro($macros["m"], "macro_button", [twig_call_macro($macros["m"], "macro_icon", ["plus-lg"], 12, $context, $this->getSourceContext()), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("admin/news", ((($context["only_meetings"] ?? null)) ? (["meeting" => 1]) : ([]))), "secondary"], 12, $context, $this->getSourceContext());
        }
        // line 14
        echo "        </h1>

        ";
        // line 16
        $this->loadTemplate("layouts/parts/messages.twig", "pages/news/overview.twig", 16)->display($context);
        // line 17
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                ";
        // line 20
        $this->displayBlock('news', $context, $blocks);
        // line 25
        echo "            </div>

            ";
        // line 27
        $this->displayBlock('comments', $context, $blocks);
        // line 29
        echo "
            ";
        // line 30
        $this->displayBlock('pagination', $context, $blocks);
        // line 43
        echo "
            ";
        // line 44
        $this->displayBlock('write_comment', $context, $blocks);
        // line 46
        echo "        </div>
    </div>
";
    }

    // line 20
    public function block_news($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["news"]);
        foreach ($context['_seq'] as $context["_key"] => $context["news"]) {
            // line 22
            echo "                        ";
            echo twig_call_macro($macros["_self"], "macro_news", [$context["news"], true, ($context["is_overview"] ?? null)], 22, $context, $this->getSourceContext());
            echo "
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['news'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                ";
    }

    // line 27
    public function block_comments($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "            ";
    }

    // line 30
    public function block_pagination($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "                ";
        if ((((array_key_exists("pages", $context)) ? (_twig_default_filter(($context["pages"] ?? null), 0)) : (0)) > 1)) {
            // line 32
            echo "                    <div class=\"col-md-12\">
                        <ul class=\"pagination justify-content-center\">
                            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, ($context["pages"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 35
                echo "                                <li class=\"page-item";
                if (($context["p"] == ($context["page"] ?? null))) {
                    echo " active";
                }
                echo "\">
                                    <a class=\"page-link\" href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("news", ((($context["p"] == 1)) ? ([]) : (["page" => $context["p"]]))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                echo "</a>
                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                        </ul>
                    </div>
                ";
        }
        // line 42
        echo "            ";
    }

    // line 44
    public function block_write_comment($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "            ";
    }

    // line 50
    public function macro_news($__news__ = null, $__show_comments_link__ = null, $__is_overview__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "news" => $__news__,
            "show_comments_link" => $__show_comments_link__,
            "is_overview" => $__is_overview__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 51
            echo "    <div class=\"card ";
            if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 51)) {
                echo "bg-info";
            } else {
                if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 51) == "light")) {
                    echo "bg-light";
                } else {
                    echo "bg-dark";
                }
            }
            echo " mb-4\">
        ";
            // line 52
            if (((array_key_exists("is_overview", $context)) ? (_twig_default_filter(($context["is_overview"] ?? null), false)) : (false))) {
                // line 53
                echo "        <div class=\"card-header ";
                if ((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 53) && (twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 53) == "dark"))) {
                    echo "text-white";
                }
                echo "\">
                <a href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("news/" . twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 54))), "html", null, true);
                echo "\" class=\"text-inherit\">
                    ";
                // line 55
                if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_pinned", [], "any", false, false, false, 55)) {
                    echo twig_call_macro($macros["m"], "macro_icon", ["pin-angle"], 55, $context, $this->getSourceContext());
                }
                // line 56
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "is_meeting", [], "any", false, false, false, 56)) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.is_meeting"]), "html", null, true);
                }
                // line 57
                echo "                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "title", [], "any", false, false, false, 57), "html", null, true);
                echo "
                </a>
            </div>
        ";
            }
            // line 61
            echo "
        <div class=\"card-body bg-body\">
            ";
            // line 63
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [0 =>  !($context["is_overview"] ?? null)], "method", false, false, false, 63), false);
            echo "
            ";
            // line 64
            if ((($context["is_overview"] ?? null) && (twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [], "any", false, false, false, 64) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "text", [0 => false], "method", false, false, false, 64)))) {
                // line 65
                echo "                ";
                echo twig_call_macro($macros["m"], "macro_button", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.read_more"]), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("news/" . twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 65))), null, "sm", null, null, "chevron-double-right"], 65, $context, $this->getSourceContext());
                echo "
            ";
            }
            // line 67
            echo "        </div>

        <div class=\"card-footer ";
            // line 69
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 69) == "light")) {
                echo "bg-light";
            } else {
                echo "bg-dark";
            }
            echo " text-muted\">
            ";
            // line 70
            if (((twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "updated_at", [], "any", false, false, false, 70) != twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "created_at", [], "any", false, false, false, 70)) &&  !($context["is_overview"] ?? null))) {
                // line 71
                echo "                <div class=\"d-flex align-items-center\">
                    <div class=\"me-3\">
                        ";
                // line 73
                echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 73, $context, $this->getSourceContext());
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "created_at", [], "any", false, false, false, 73), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 73), "html", null, true);
                echo "
                    </div>
                    ";
                // line 75
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.updated"]), "html", null, true);
                echo "
                </div>
            ";
            }
            // line 78
            echo "            <div class=\"d-flex align-items-center\">
                <div class=\"me-3\">
                    ";
            // line 80
            echo twig_call_macro($macros["m"], "macro_icon", ["clock"], 80, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "updated_at", [], "any", false, false, false, 80), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 80), "html", null, true);
            echo "
                </div>

                <div class=\"me-3\">
                    ";
            // line 84
            echo twig_call_macro($macros["m"], "macro_user", [twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "user", [], "any", false, false, false, 84)], 84, $context, $this->getSourceContext());
            echo "
                </div>

                ";
            // line 87
            if (((array_key_exists("show_comments_link", $context)) ? (_twig_default_filter(($context["show_comments_link"] ?? null), false)) : (false))) {
                // line 88
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("news/" . twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 88))), "html", null, true);
                echo "\" class=\"me-1\">
                        ";
                // line 89
                echo twig_call_macro($macros["m"], "macro_icon", ["chat-left-text"], 89, $context, $this->getSourceContext());
                echo " ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["news.comments"]), "html", null, true);
                echo "
                    </a>
                    <span class=\"badge bg-primary\">";
                // line 91
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "comments", [], "any", false, false, false, 91), "count", [], "method", false, false, false, 91), "html", null, true);
                echo "</span>
                    ";
                // line 92
                echo twig_call_macro($macros["m"], "macro_icon", ["chevron-double-right", "primary"], 92, $context, $this->getSourceContext());
                echo "
                ";
            }
            // line 94
            echo "
                ";
            // line 95
            if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["admin_news"])) {
                // line 96
                echo "                    <div class=\"ms-auto\">
                        ";
                // line 97
                echo twig_call_macro($macros["m"], "macro_button", [twig_call_macro($macros["m"], "macro_icon", ["pencil-square"], 97, $context, $this->getSourceContext()), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("admin/news/" . twig_get_attribute($this->env, $this->source, ($context["news"] ?? null), "id", [], "any", false, false, false, 97))), "secondary", "sm"], 97, $context, $this->getSourceContext());
                echo "
                    </div>
                ";
            }
            // line 100
            echo "            </div>
        </div>
    </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "pages/news/overview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  355 => 100,  349 => 97,  346 => 96,  344 => 95,  341 => 94,  336 => 92,  332 => 91,  325 => 89,  320 => 88,  318 => 87,  312 => 84,  303 => 80,  299 => 78,  293 => 75,  286 => 73,  282 => 71,  280 => 70,  272 => 69,  268 => 67,  262 => 65,  260 => 64,  256 => 63,  252 => 61,  244 => 57,  239 => 56,  235 => 55,  231 => 54,  224 => 53,  222 => 52,  209 => 51,  194 => 50,  190 => 45,  186 => 44,  182 => 42,  177 => 39,  166 => 36,  159 => 35,  155 => 34,  151 => 32,  148 => 31,  144 => 30,  140 => 28,  136 => 27,  132 => 24,  123 => 22,  118 => 21,  114 => 20,  108 => 46,  106 => 44,  103 => 43,  101 => 30,  98 => 29,  96 => 27,  92 => 25,  90 => 20,  85 => 17,  83 => 16,  79 => 14,  76 => 12,  74 => 11,  72 => 10,  68 => 8,  64 => 7,  57 => 5,  52 => 1,  50 => 4,  48 => 2,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/news/overview.twig", "/var/www/html/engelsystem/resources/views/pages/news/overview.twig");
    }
}
