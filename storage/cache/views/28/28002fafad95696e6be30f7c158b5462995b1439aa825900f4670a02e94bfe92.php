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

/* pages/settings/settings.twig */
class __TwigTemplate_3835fda421a1b8bea245a65ab57438f5bed3725f551f2c295aca645040311a5f extends Template
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
            'container_title' => [$this, 'block_container_title'],
            'row_content' => [$this, 'block_row_content'],
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/settings/settings.twig", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/settings/settings.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), [((array_key_exists("title", $context)) ? (_twig_default_filter(($context["title"] ?? null), call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.settings"]))) : (call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.settings"])))]), "html", null, true);
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "    <div class=\"container user-settings\">
        ";
        // line 8
        $this->displayBlock('container_title', $context, $blocks);
        // line 14
        echo "
        <div class=\"row\">
            <div class=\"col-md-3 settings-menu\">
                <ul class=\"nav nav-pills flex-column mt-3 user-settings\">
                    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["settings_menu"] ?? null));
        foreach ($context['_seq'] as $context["url"] => $context["title"]) {
            // line 19
            echo "                        <li class=\"nav-item";
            if (((((twig_get_attribute($this->env, $this->source, $context["title"], "hidden", [], "any", true, true, false, 19) &&  !(null === twig_get_attribute($this->env, $this->source, $context["title"], "hidden", [], "any", false, false, false, 19)))) ? (twig_get_attribute($this->env, $this->source, $context["title"], "hidden", [], "any", false, false, false, 19)) : (false)) && ($context["url"] != twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "url", [], "method", false, false, false, 19)))) {
                echo " d-none";
            }
            echo "\">
                            <a class=\"nav-link ";
            // line 20
            if (($context["url"] == twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "url", [], "method", false, false, false, 20))) {
                echo "active";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $context["url"], "html", null, true);
            echo "\">
                                ";
            // line 21
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), [(((twig_get_attribute($this->env, $this->source, $context["title"], "title", [], "any", true, true, false, 21) &&  !(null === twig_get_attribute($this->env, $this->source, $context["title"], "title", [], "any", false, false, false, 21)))) ? (twig_get_attribute($this->env, $this->source, $context["title"], "title", [], "any", false, false, false, 21)) : ($context["title"]))]), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['url'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "                </ul>
            </div>

            <div class=\"col-md-9\">
                ";
        // line 29
        $this->loadTemplate("layouts/parts/messages.twig", "pages/settings/settings.twig", 29)->display($context);
        // line 30
        echo "
                ";
        // line 31
        $this->displayBlock('row_content', $context, $blocks);
        // line 34
        echo "            </div>
        </div>
    </div>
";
    }

    // line 8
    public function block_container_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "            <h1 id=\"settings-title\">
                ";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["settings.settings"]), "html", null, true);
        echo "
                <small class=\"text-muted\">";
        // line 11
        $this->displayBlock("title", $context, $blocks);
        echo "</small>
            </h1>
        ";
    }

    // line 31
    public function block_row_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "                    ";
        echo ($context["content"] ?? null);
        echo "
                ";
    }

    public function getTemplateName()
    {
        return "pages/settings/settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 32,  141 => 31,  134 => 11,  130 => 10,  127 => 9,  123 => 8,  116 => 34,  114 => 31,  111 => 30,  109 => 29,  103 => 25,  93 => 21,  85 => 20,  78 => 19,  74 => 18,  68 => 14,  66 => 8,  63 => 7,  59 => 6,  52 => 4,  47 => 1,  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/settings/settings.twig", "/var/www/html/engelsystem/resources/views/pages/settings/settings.twig");
    }
}
