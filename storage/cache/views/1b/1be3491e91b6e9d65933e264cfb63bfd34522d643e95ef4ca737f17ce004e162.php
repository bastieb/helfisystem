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

/* pages/login */
class __TwigTemplate_d7b3c65dc8a3d78d3efe7f86cd9ff316d251c3711af0f47b8cc962ec1b54bd09 extends Template
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
        $macros["m"] = $this->macros["m"] = $this->loadTemplate("macros/base.twig", "pages/login", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/login", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["login.login"]), "html", null, true);
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "    <div class=\"col-md-12\">
        <div class=\"row mb-3 mt-5\">
            <div class=\"col-sm-12 text-center\" id=\"welcome-title\">
                <h2>";
        // line 10
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), ["Welcome to the %s!", [0 => ((call_user_func_array($this->env->getFunction('config')->getCallable(), ["name"]) . twig_call_macro($macros["m"], "macro_angel", [], 10, $context, $this->getSourceContext())) . twig_upper_filter($this->env, call_user_func_array($this->env->getFunction('config')->getCallable(), ["app_name"])))]]);
        echo "</h2>
            </div>
        </div>

        <div class=\"row mb-3\">
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, [call_user_func_array($this->env->getFunction('__')->getCallable(), ["Buildup starts"]) => call_user_func_array($this->env->getFunction('config')->getCallable(), ["buildup_start"]), call_user_func_array($this->env->getFunction('__')->getCallable(), ["Event starts"]) => call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_start"]), call_user_func_array($this->env->getFunction('__')->getCallable(), ["Event ends"]) => call_user_func_array($this->env->getFunction('config')->getCallable(), ["event_end"]), call_user_func_array($this->env->getFunction('__')->getCallable(), ["Teardown ends"]) => call_user_func_array($this->env->getFunction('config')->getCallable(), ["teardown_end"])],         // line 20
function ($__date__) use ($context, $macros) { $context["date"] = $__date__; return $context["date"]; }));
        foreach ($context['_seq'] as $context["name"] => $context["date"]) {
            // line 21
            echo "                ";
            if (($context["date"] > twig_date_converter($this->env))) {
                // line 22
                echo "                    <div class=\"col-sm-3 text-center d-none d-sm-block\">
                        <h4>";
                // line 23
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</h4>
                        <span class=\"moment-countdown text-big\" data-timestamp=\"";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["date"], "getTimestamp", [], "any", false, false, false, 24), "html", null, true);
                echo "\">%c</span>
                        <small>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["date"], "format", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), ["Y-m-d"])], "method", false, false, false, 25), "html", null, true);
                echo "</small>
                    </div>
                ";
            }
            // line 28
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        </div>

        <div class=\"row mb-5\">
            <div class=\"col-md-6 offset-md-3 col-lg-4 offset-lg-4\">
                <div class=\"card ";
        // line 33
        echo twig_call_macro($macros["m"], "macro_type_bg_class", [], 33, $context, $this->getSourceContext());
        echo "\">
                    <div class=\"card-body\">
                        ";
        // line 35
        $this->loadTemplate("layouts/parts/messages.twig", "pages/login", 35)->display($context);
        // line 36
        echo "
                        <form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
                            ";
        // line 38
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfField();
        echo "
                            <div class=\"mb-3\">
                                <div class=\"input-group input-group-lg\">
                                    <span class=\"input-group-text ";
        // line 41
        echo twig_call_macro($macros["m"], "macro_type_text_class", [], 41, $context, $this->getSourceContext());
        echo "\">
                                        ";
        // line 42
        echo twig_call_macro($macros["m"], "macro_angel", [], 42, $context, $this->getSourceContext());
        echo "
                                    </span>
                                    <input
                                        class=\"form-control\"
                                        id=\"form_nick\"
                                        type=\"text\"
                                        name=\"login\"
                                        value=\"\"
                                        placeholder=\"";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Nick"]), "html", null, true);
        echo "\"
                                        autofocus>
                                </div>
                            </div>

                            <div class=\"mb-3\">
                                <div class=\"input-group input-group-lg\">
                                    <span class=\"input-group-text ";
        // line 57
        echo twig_call_macro($macros["m"], "macro_type_text_class", [], 57, $context, $this->getSourceContext());
        echo "\">
                                        <i class=\"bi bi-key\"></i>
                                    </span>
                                    <input
                                        class=\"form-control\" id=\"form_password\"
                                        type=\"password\" name=\"password\" value=\"\" placeholder=\"";
        // line 62
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Password"]), "html", null, true);
        echo "\"
                                    >
                                </div>
                            </div>

                            <div class=\"mb-3 text-center\">
                                <button class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" name=\"submit\">
                                    ";
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["login.login"]), "html", null, true);
        echo "
                                </button>
                            </div>

                            ";
        // line 73
        if ( !twig_test_empty(call_user_func_array($this->env->getFunction('config')->getCallable(), ["oauth"]))) {
            // line 74
            echo "                                <div class=\"row\">
                                    <div class=\"mb-3 btn-group\">
                                        ";
            // line 76
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFunction('config')->getCallable(), ["oauth"]));
            foreach ($context['_seq'] as $context["name"] => $context["config"]) {
                // line 77
                echo "                                            <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl(("oauth/" . $context["name"])), "html", null, true);
                echo "\" class=\"btn btn-primary btn-lg";
                if (((twig_get_attribute($this->env, $this->source, $context["config"], "hidden", [], "any", true, true, false, 77)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["config"], "hidden", [], "any", false, false, false, 77), false)) : (false))) {
                    echo " d-none";
                }
                echo "\">
                                                ";
                // line 78
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["oauth.login-using-provider", [0 => call_user_func_array($this->env->getFunction('__')->getCallable(), [((twig_get_attribute($this->env, $this->source,                 // line 80
$context["config"], "name", [], "any", true, true, false, 80)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["config"], "name", [], "any", false, false, false, 80), twig_capitalize_string_filter($this->env, $context["name"]))) : (twig_capitalize_string_filter($this->env, $context["name"])))])]]), "html", null, true);
                // line 81
                echo "
                                            </a>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['config'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "                                    </div>
                                </div>
                            ";
        }
        // line 87
        echo "
                            <div class=\"text-center\">
                                <a href=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("/password/reset"), "html", null, true);
        echo "\" class=\"\">
                                    ";
        // line 90
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["I forgot my password"]), "html", null, true);
        echo "
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"row mb-5\">
            <div class=\"col-sm-6 text-center\">
                <h2>";
        // line 101
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Register"]), "html", null, true);
        echo "</h2>
                ";
        // line 102
        if ((call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["register"]) && call_user_func_array($this->env->getFunction('config')->getCallable(), ["registration_enabled"]))) {
            // line 103
            echo "                    <p>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Please sign up, if you want to help us!"]), "html", null, true);
            echo "</p>
                    <a href=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("register"), "html", null, true);
            echo "\" class=\"btn btn-primary\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Register"]), "html", null, true);
            echo " &raquo;</a>
                ";
        } else {
            // line 106
            echo "                    ";
            echo twig_call_macro($macros["m"], "macro_alert", [call_user_func_array($this->env->getFunction('__')->getCallable(), ["Registration is disabled."]), "danger"], 106, $context, $this->getSourceContext());
            echo "
                ";
        }
        // line 108
        echo "            </div>

            <div class=\"col-sm-6 text-center\">
                <h2>";
        // line 111
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["What can I do?"]), "html", null, true);
        echo "</h2>
                <p>";
        // line 112
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Please read about the jobs you can do to help us."]), "html", null, true);
        echo "</p>
                <a href=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("angeltypes", ["action" => "about"]), "html", null, true);
        echo "\" class=\"btn btn-primary\">
                    ";
        // line 114
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Teams/Job description"]), "html", null, true);
        echo " &raquo;
                </a>
            </div>

            <div class=\"col-md-12 text-center\">
                ";
        // line 119
        echo twig_call_macro($macros["m"], "macro_icon", ["info-circle"], 119, $context, $this->getSourceContext());
        echo " ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Please note: You have to activate cookies!"]), "html", null, true);
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/login";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 119,  276 => 114,  272 => 113,  268 => 112,  264 => 111,  259 => 108,  253 => 106,  246 => 104,  241 => 103,  239 => 102,  235 => 101,  221 => 90,  217 => 89,  213 => 87,  208 => 84,  200 => 81,  198 => 80,  197 => 78,  188 => 77,  184 => 76,  180 => 74,  178 => 73,  171 => 69,  161 => 62,  153 => 57,  143 => 50,  132 => 42,  128 => 41,  122 => 38,  118 => 36,  116 => 35,  111 => 33,  105 => 29,  99 => 28,  93 => 25,  89 => 24,  85 => 23,  82 => 22,  79 => 21,  76 => 20,  74 => 15,  66 => 10,  61 => 7,  57 => 6,  50 => 4,  45 => 1,  43 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/login", "/var/www/html/engelsystem/resources/views/pages/login.twig");
    }
}
