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

/* layouts/parts/footer.twig */
class __TwigTemplate_02ca56173f64d24d1abeeeeb1b33e1533ba1b190e258857e62fe018a7202bcd5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'eventinfo' => [$this, 'block_eventinfo'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "layouts/parts/footer.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"col-md-12\">
    <hr/>
    <div class=\"text-center footer\" style=\"margin-bottom: 10px;\">
        ";
        // line 6
        $this->displayBlock('eventinfo', $context, $blocks);
        // line 29
        echo "
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('config')->getCallable(), ["footer_items"]));
        foreach ($context['_seq'] as $context["name"] => $context["url"]) {
            // line 31
            echo "            <a href=\"";
            if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["url"]) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "/") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
                echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl($context["url"]), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $context["url"], "html", null, true);
            }
            echo "\">
                ";
            // line 32
            if (twig_in_filter("@", $context["url"])) {
                echo twig_call_macro($macros["m"], "macro_icon", ["envelope"], 32, $context, $this->getSourceContext());
            }
            // line 33
            echo "                ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["name"]]), "html", null, true);
            echo "
            </a> ·
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['url'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        <a href=\"https://github.com/engelsystem/engelsystem/issues\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Bugs / Features"]), "html", null, true);
        echo "</a>
        · <a href=\"https://github.com/engelsystem/engelsystem/\">";
        // line 37
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Development Platform"]), "html", null, true);
        echo "</a>
        · <a href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("credits"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Credits"]), "html", null, true);
        echo "</a>
    </div>
</div>
";
    }

    // line 6
    public function block_eventinfo($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "            ";
        if (call_user_func_array($this->env->getFunction('config')->getCallable(), ["name"])) {
            // line 8
            echo "                ";
            if ((call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"]) && call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_end"]))) {
                // line 9
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["%1\$s, from %2\$s to %3\$s", [0 => call_user_func_array($this->env->getFunction('config')->getCallable(), ["name"]), 1 => twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"]), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d"])], "method", false, false, false, 11), 2 => twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_end"]), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d"])], "method", false, false, false, 12)]]), "html", null, true);
                // line 13
                echo "
                ";
            } elseif (call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"])) {
                // line 15
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["%1\$s, starting %2\$s", [0 => call_user_func_array($this->env->getFunction('config')->getCallable(), ["name"]), 1 => twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"]), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d"])], "method", false, false, false, 17)]]), "html", null, true);
                // line 18
                echo "
                ";
            } else {
                // line 20
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('config')->getCallable(), ["name"]), "html", null, true);
                echo "
                ";
            }
            // line 21
            echo " <br>
            ";
        } elseif ((call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"]) && call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_end"]))) {
            // line 23
            echo "                ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Event from %1\$s to %2\$s", [0 => twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"]), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d"])], "method", false, false, false, 24), 1 => twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_end"]), "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d"])], "method", false, false, false, 25)]]), "html", null, true);
            // line 26
            echo " <br>
            ";
        }
        // line 28
        echo "        ";
    }

    public function getTemplateName()
    {
        return "layouts/parts/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 28,  134 => 26,  131 => 23,  127 => 21,  121 => 20,  117 => 18,  114 => 15,  110 => 13,  107 => 9,  104 => 8,  101 => 7,  97 => 6,  87 => 38,  83 => 37,  78 => 36,  68 => 33,  64 => 32,  55 => 31,  51 => 30,  48 => 29,  46 => 6,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layouts/parts/footer.twig", "/var/www/html/engelsystem/resources/views/layouts/parts/footer.twig");
    }
}
