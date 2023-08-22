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

/* macros/base.twig */
class __TwigTemplate_03ac6d9b94ccad5008dde757900a73dbe13e1ef5c44d579ebcc961379569ee51 extends Template
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
        // line 4
        echo "
";
        // line 8
        echo "
";
        // line 12
        echo "
";
        // line 20
        echo "
";
        // line 28
        echo "
";
        // line 32
        echo "
";
        // line 36
        echo "
";
    }

    // line 1
    public function macro_angel(...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 2
            echo "    <span class=\"icon-icon_angel\"></span>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 5
    public function macro_icon($__icon__ = null, $__color__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "icon" => $__icon__,
            "color" => $__color__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 6
            echo "    <span class=\"bi bi-";
            echo twig_escape_filter($this->env, ($context["icon"] ?? null), "html", null, true);
            echo " ";
            if (($context["color"] ?? null)) {
                echo " text-";
                echo twig_escape_filter($this->env, ($context["color"] ?? null), "html", null, true);
                echo " ";
            }
            echo "\"></span>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 9
    public function macro_alert($__message__ = null, $__type__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "message" => $__message__,
            "type" => $__type__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 10
            echo "    <div class=\"alert alert-";
            echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "info")) : ("info")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "</div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 13
    public function macro_user($__user__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "user" => $__user__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 14
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Engelsystem\Renderer\Twig\Extensions\Url']->getUrl("users", ["action" => "view", "user_id" => twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 14)]), "html", null, true);
            echo "\"";
            // line 15
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "state", [], "any", false, false, false, 15), "arrived", [], "any", false, false, false, 15)) {
                echo " class=\"text-muted\"";
            }
            // line 16
            echo ">
        ";
            // line 17
            echo twig_call_macro($macros["_self"], "macro_angel", [], 17, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 17), "html", null, true);
            echo "
    </a>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 21
    public function macro_button($__label__ = null, $__url__ = null, $__type__ = null, $__size__ = null, $__title__ = null, $__icon_left__ = null, $__icon_right__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "url" => $__url__,
            "type" => $__type__,
            "size" => $__size__,
            "title" => $__title__,
            "icon_left" => $__icon_left__,
            "icon_right" => $__icon_right__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 22
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
            echo "\" class=\"btn btn-";
            echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "secondary")) : ("secondary")), "html", null, true);
            if (($context["size"] ?? null)) {
                echo " btn-";
                echo twig_escape_filter($this->env, ($context["size"] ?? null), "html", null, true);
            }
            echo "\"";
            if (($context["title"] ?? null)) {
                echo " title=\"";
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "\"";
            }
            echo ">";
            // line 23
            if (array_key_exists("icon_left", $context)) {
                echo twig_call_macro($macros["_self"], "macro_icon", [($context["icon_left"] ?? null)], 23, $context, $this->getSourceContext());
            }
            // line 24
            echo "        ";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            // line 25
            if (array_key_exists("icon_right", $context)) {
                echo twig_call_macro($macros["_self"], "macro_icon", [($context["icon_right"] ?? null)], 25, $context, $this->getSourceContext());
            }
            // line 26
            echo "    </a>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 29
    public function macro_info($__text__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 30
            echo "    <span class=\"help-block\">";
            echo twig_call_macro($macros["_self"], "macro_icon", ["info-circle"], 30, $context, $this->getSourceContext());
            echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
            echo "</span>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 33
    public function macro_type_bg_class(...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 34
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 34) == "light")) {
                echo "bg-white";
            } else {
                echo "bg-dark";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 37
    public function macro_type_text_class(...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 38
            if ((twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "type", [], "any", false, false, false, 38) == "light")) {
                echo "text-dark";
            } else {
                echo "text-light";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "macros/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  299 => 38,  287 => 37,  274 => 34,  262 => 33,  250 => 30,  237 => 29,  227 => 26,  223 => 25,  220 => 24,  216 => 23,  200 => 22,  181 => 21,  167 => 17,  164 => 16,  160 => 15,  156 => 14,  143 => 13,  129 => 10,  115 => 9,  97 => 6,  83 => 5,  73 => 2,  61 => 1,  56 => 36,  53 => 32,  50 => 28,  47 => 20,  44 => 12,  41 => 8,  38 => 4,);
    }

    public function getSourceContext()
    {
        return new Source("", "macros/base.twig", "/var/www/html/engelsystem/resources/views/macros/base.twig");
    }
}
