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

/* pages/credits.twig */
class __TwigTemplate_af42ae48718194e62c5be5fdf86420dd428b46be2d1862991069d0065a1c1aeb extends Template
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
        $this->parent = $this->loadTemplate("layouts/app.twig", "pages/credits.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Credits"]), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"container\">
        <h1>";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Credits"]), "html", null, true);
        echo "</h1>
        <div class=\"row\">
            ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["credits"] ?? null));
        foreach ($context['_seq'] as $context["title"] => $context["credit"]) {
            // line 10
            echo "                <div class=\"col-md-4\">
                    <h2>";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["title"]]), "html", null, true);
            echo "</h2>
                    ";
            // line 12
            echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(call_user_func_array($this->env->getFunction('__')->getCallable(), [$context["credit"]]));
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['title'], $context['credit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "
            <div class=\"col-md-4\">
                <h2>";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), ["Source code"]), "html", null, true);
        echo "</h2>
                <p>";
        // line 18
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(call_user_func_array($this->env->getFunction('__')->getCallable(), ["Version: _%s_", [0 => ($context["version"] ?? null)]]));
        echo "</i></p>
                <p>
                    ";
        // line 20
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(call_user_func_array($this->env->getFunction('__')->getCallable(), ["credits.credit"]));
        echo "
                </p>
                <p>
                    ";
        // line 23
        echo $this->extensions['Engelsystem\Renderer\Twig\Extensions\Markdown']->render(call_user_func_array($this->env->getFunction('__')->getCallable(), ["credits.contributors"]));
        echo "
                </p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/credits.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 23,  99 => 20,  94 => 18,  90 => 17,  86 => 15,  77 => 12,  73 => 11,  70 => 10,  66 => 9,  61 => 7,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/credits.twig", "/var/www/html/engelsystem/resources/views/pages/credits.twig");
    }
}
