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

/* layouts/app.twig */
class __TwigTemplate_8b0ebc751e40db0224d418434a18aec52074efe88d38c95276865f45e8b6c7d7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_split_filter($this->env, call_user_func_array($this->env->getFunction('session_get')->getCallable(), ["locale"]), "_")) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null), "html_attr");
        echo "\">
<head>
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 23
        echo "</head>
<body>

";
        // line 26
        $this->displayBlock('body', $context, $blocks);
        // line 46
        echo "
</body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "        <title>";
        $this->displayBlock('title', $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('config')->getCallable(), ["app_name"]), "html", null, true);
        echo "</title>

        <meta charset=\"UTF-8\"/>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"csrf-token\" content=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Csrf']->getCsrfToken(), "html", null, true);
        echo "\">

        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Assets']->getAsset((("assets/theme" . ($context["themeId"] ?? null)) . ".css")), "html", null, true);
        echo "\"/>
        <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Assets']->getAsset("assets/vendor.js"), "html", null, true);
        echo "\"></script>

        ";
        // line 14
        if (((twig_in_filter($this->extensions['Engelsystem\Renderer\Twig\Extensions\Legacy']->getPage(), [0 => "news", 1 => "meetings"]) && $this->extensions['Engelsystem\Renderer\Twig\Extensions\Authentication']->isAuthenticated()) && call_user_func_array($this->env->getFunction('has_permission_to')->getCallable(), ["atom"]))) {
            // line 15
            $context["parameters"] = ["key" => twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "api_key", [], "any", false, false, false, 15)];
            // line 16
            if (($this->extensions['Engelsystem\Renderer\Twig\Extensions\Legacy']->getPage() == "meetings")) {
                // line 17
                $context["parameters"] = twig_array_merge(["meetings" => 1], ($context["parameters"] ?? null));
            }
            // line 19
            echo "            <link href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("atom", ($context["parameters"] ?? null)), "html", null, true);
            echo "\" type=\"application/atom+xml\" rel=\"alternate\" title=\"Atom Feed\">
        ";
        }
        // line 21
        echo "
    ";
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
    }

    // line 26
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "    ";
        $this->displayBlock('header', $context, $blocks);
        // line 30
        echo "
    <div class=\"container-fluid\">
        <div id=\"content\">
            ";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 36
        echo "        </div>
        <div id=\"footer\">
            ";
        // line 38
        $this->displayBlock('footer', $context, $blocks);
        // line 41
        echo "        </div>
    </div>

    ";
        // line 44
        $this->displayBlock('scripts', $context, $blocks);
    }

    // line 27
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "        ";
        $this->loadTemplate("layouts/parts/navbar.twig", "layouts/app.twig", 28)->display($context);
        // line 29
        echo "    ";
    }

    // line 33
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "                ";
        echo ($context["content"] ?? null);
        echo "
            ";
    }

    // line 38
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
        echo "                ";
        $this->loadTemplate("layouts/parts/footer.twig", "layouts/app.twig", 39)->display($context);
        // line 40
        echo "            ";
    }

    // line 44
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layouts/app.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 44,  181 => 40,  178 => 39,  174 => 38,  167 => 34,  163 => 33,  159 => 29,  156 => 28,  152 => 27,  148 => 44,  143 => 41,  141 => 38,  137 => 36,  135 => 33,  130 => 30,  127 => 27,  123 => 26,  116 => 5,  111 => 21,  105 => 19,  102 => 17,  100 => 16,  98 => 15,  96 => 14,  91 => 12,  87 => 11,  82 => 9,  72 => 5,  68 => 4,  61 => 46,  59 => 26,  54 => 23,  52 => 4,  47 => 2,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layouts/app.twig", "/var/www/html/engelsystem/resources/views/layouts/app.twig");
    }
}
