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

/* admin/log.twig */
class __TwigTemplate_6064a4160cb8168b21c43cee15a676c8c85316d79523e1b8a0270708377ae649 extends Template
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "admin/log.twig", 2)->unwrap();
        // line 3
        $macros["f"] = $this->macros["f"] = $this->loadTemplate("macros/form.twig", "admin/log.twig", 3)->unwrap();
        // line 5
        ob_start(function () { return ''; });
        $this->displayBlock('title', $context, $blocks);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "admin/log.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["log.log"]), "html", null, true);
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"col-md-12\">
        <h1>";
        // line 9
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>

        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"mb-3\">
                    <form method=\"POST\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/admin/logs"), "html", null, true);
        echo "\" class=\"form-inline\">
                        ";
        // line 15
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "

                        ";
        // line 17
        echo twig_call_macro($macros["f"], "macro_input", ["search", call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.search"]), "text", ["value" => ($context["search"] ?? null), "hide_label" => true]], 17, $context, $this->getSourceContext());
        echo "

                        ";
        // line 19
        echo twig_call_macro($macros["f"], "macro_submit", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.search"])], 19, $context, $this->getSourceContext());
        echo "
                    </form>
                </div>

                <table class=\"table table-striped\">
                    <tr>
                        <th>";
        // line 25
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["log.time"]), "html", null, true);
        echo "</th>
                        <th>";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["log.level"]), "html", null, true);
        echo "</th>
                        <th>";
        // line 27
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["log.message"]), "html", null, true);
        echo "</th>
                    </tr>
                    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["entries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 30
            $context["type"] = "default";
            // line 31
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "level", [], "any", false, false, false, 31), [0 => "notice", 1 => "info"])) {
                // line 32
                $context["type"] = "info";
            }
            // line 34
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "level", [], "any", false, false, false, 34), [0 => "error", 1 => "warning"])) {
                // line 35
                $context["type"] = "warning";
            }
            // line 37
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "level", [], "any", false, false, false, 37), [0 => "emergency", 1 => "alert", 2 => "critical"])) {
                // line 38
                $context["type"] = "danger";
            }
            // line 41
            $context["td_type"] = "";
            // line 42
            if (twig_in_filter(($context["type"] ?? null), [0 => "warning", 1 => "danger"])) {
                // line 43
                $context["td_type"] = ($context["type"] ?? null);
            }
            // line 45
            echo "
                        <tr>
                            <td class=\"table-";
            // line 47
            echo twig_escape_filter($this->env, ($context["td_type"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["entry"], "created_at", [], "any", false, false, false, 47), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d H:i"])], "method", false, false, false, 47), "html", null, true);
            echo "</td>
                            <td class=\"table-";
            // line 48
            echo twig_escape_filter($this->env, ($context["td_type"] ?? null), "html", null, true);
            echo "\">
                                <span class=\"badge bg-";
            // line 49
            echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "level", [], "any", false, false, false, 49)), "html", null, true);
            echo "</span> <!-- //todo bs5 -->
                            </td>
                            <td>";
            // line 51
            echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "message", [], "any", false, false, false, 51), "html", null, true));
            echo "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "                </table>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "admin/log.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 54,  163 => 51,  156 => 49,  152 => 48,  146 => 47,  142 => 45,  139 => 43,  137 => 42,  135 => 41,  132 => 38,  130 => 37,  127 => 35,  125 => 34,  122 => 32,  120 => 31,  118 => 30,  114 => 29,  109 => 27,  105 => 26,  101 => 25,  92 => 19,  87 => 17,  82 => 15,  78 => 14,  70 => 9,  67 => 8,  63 => 7,  56 => 5,  51 => 1,  47 => 5,  45 => 3,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/log.twig", "/var/www/html/engelsystem/resources/views/admin/log.twig");
    }
}
