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

/* layouts/parts/navbar.twig */
class __TwigTemplate_f2ecf83d412c4df856b9586905a364d374eaa9428bc80fd48cc8c95d7313cbd7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "layouts/parts/navbar.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 11
        echo "
<nav class=\"navbar fixed-top navbar-expand-lg border-bottom ";
        // line 12
        echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["theme"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["navbar_classes"] ?? null) : null), "html", null, true);
        echo "\">
    <div class=\"container-fluid\">
        <a class=\"navbar-brand\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/"), "html", null, true);
        echo "\">
            <span class=\"icon-icon_angel\"></span>
            <strong class=\"visible-lg-inline\">";
        // line 16
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, call_user_func_array($this->env->getFunction('config')->getCallable(), ["app_name"])), "html", null, true);
        echo "</strong>
        </a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            ";
        // line 22
        echo make_navigation();
        echo "

            ";
        // line 24
        if (call_user_func_array($this->env->getFunction('config')->getCallable(), ["header_items"])) {
            // line 25
            echo "                <ul class=\"navbar-nav mb-2 mb-lg-0\">
                    ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('config')->getCallable(), ["header_items", []]));
            foreach ($context['_seq'] as $context["text"] => $context["link"]) {
                // line 27
                echo "                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
                // line 28
                echo twig_escape_filter($this->env, twig_replace_filter($context["link"], ["%lang%" => (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_split_filter($this->env, call_user_func_array($this->env->getFunction('session_get')->getCallable(), ["locale"]), "_")) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[0] ?? null) : null)]), "html_attr");
                echo "\">
                                ";
                // line 29
                echo twig_escape_filter($this->env, $context["text"], "html", null, true);
                echo "
                            </a>
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['text'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                </ul>
            ";
        }
        // line 35
        echo "            <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0\">
                ";
        // line 36
        if ($this->extensions['Engelsystem\Renderer\Twig\Extensions\Authentication']->isAuthenticated()) {
            // line 37
            echo "                    ";
            echo twig_call_macro($macros["_self"], "macro_toolbar_item", [User_shift_state_render(($context["user"] ?? null)), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("shifts", ["action" => "next"]), "", "clock"], 37, $context, $this->getSourceContext());
            echo "
                ";
        } elseif ((call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["register"]) && call_user_func_array($this->env->getFunction('config')->getCallable(), ["registration_enabled"]))) {
            // line 39
            echo "                    ";
            echo twig_call_macro($macros["_self"], "macro_toolbar_item", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["Register"]), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("register"), "register", "plus"], 39, $context, $this->getSourceContext());
            echo "
                ";
        }
        // line 41
        echo "
                ";
        // line 42
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["login"])) {
            // line 43
            echo "                    ";
            echo twig_call_macro($macros["_self"], "macro_toolbar_item", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["login.login"]), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("login"), "login", "box-arrow-in-right"], 43, $context, $this->getSourceContext());
            echo "
                ";
        }
        // line 45
        echo "
                ";
        // line 46
        if (($this->extensions['Engelsystem\Renderer\Twig\Extensions\Authentication']->isAuthenticated() && call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["user_messages"]))) {
            // line 47
            echo "                    ";
            echo twig_call_macro($macros["_self"], "macro_toolbar_item", [user_unread_messages(), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("user-messages"), "user-messages", "envelope"], 47, $context, $this->getSourceContext());
            echo "
                ";
        }
        // line 49
        echo "
                ";
        // line 50
        echo header_render_hints();
        echo "

                ";
        // line 52
        if (call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["user_myshifts"])) {
            // line 53
            echo "                    ";
            echo twig_call_macro($macros["_self"], "macro_toolbar_item", [twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 53), $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("users", ["action" => "view"]), "users", "icon icon-icon_angel"], 53, $context, $this->getSourceContext());
            echo "
                ";
        }
        // line 55
        echo "
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    </a>
                    <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                        ";
        // line 60
        echo twig_join_filter(make_user_submenu(), " ");
        echo "
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
";
    }

    // line 3
    public function macro_toolbar_item($__label__ = null, $__link__ = null, $__active_page__ = null, $__icon__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "link" => $__link__,
            "active_page" => $__active_page__,
            "icon" => $__icon__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 4
            echo "    <li class=\"nav-item\">
        <a class=\"nav-link";
            // line 5
            if (($this->extensions['Engelsystem\Renderer\Twig\Extensions\Legacy']->getPage() == ($context["active_page"] ?? null))) {
                echo " active";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, ($context["link"] ?? null), "html", null, true);
            echo "\">
            ";
            // line 6
            if (($context["icon"] ?? null)) {
                echo twig_call_macro($macros["m"], "macro_icon", [($context["icon"] ?? null)], 6, $context, $this->getSourceContext());
            }
            // line 7
            echo "            ";
            echo ($context["label"] ?? null);
            echo "
        </a>
    </li>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "layouts/parts/navbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 7,  201 => 6,  193 => 5,  190 => 4,  174 => 3,  162 => 60,  155 => 55,  149 => 53,  147 => 52,  142 => 50,  139 => 49,  133 => 47,  131 => 46,  128 => 45,  122 => 43,  120 => 42,  117 => 41,  111 => 39,  105 => 37,  103 => 36,  100 => 35,  96 => 33,  86 => 29,  82 => 28,  79 => 27,  75 => 26,  72 => 25,  70 => 24,  65 => 22,  56 => 16,  51 => 14,  46 => 12,  43 => 11,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layouts/parts/navbar.twig", "/var/www/html/engelsystem/resources/views/layouts/parts/navbar.twig");
    }
}
