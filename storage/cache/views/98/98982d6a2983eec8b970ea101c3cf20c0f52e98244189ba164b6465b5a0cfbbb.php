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

/* macros/form.twig */
class __TwigTemplate_a52afcbb479407ce8ca24bdcc7b14db9a2be0d272e2eb961c2ad4593ece2561d extends Template
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
        // line 23
        echo "
";
        // line 39
        echo "
";
        // line 52
        echo "
";
        // line 64
        echo "
";
        // line 68
        echo "
";
        // line 81
        echo "
";
        // line 85
        echo "
";
    }

    // line 1
    public function macro_input($__name__ = null, $__label__ = null, $__type__ = null, $__opt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "type" => $__type__,
            "opt" => $__opt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 2
            echo "    <div class=\"mb-3\">
        ";
            // line 3
            if (($context["label"] ?? null)) {
                // line 4
                echo "<label for=\"";
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "\" class=\"form-label ";
                if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "hide_label", [], "any", true, true, false, 4)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "hide_label", [], "any", false, false, false, 4), false)) : (false))) {
                    echo "sr-only";
                }
                echo "\">";
                echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
                echo "</label>";
            }
            // line 6
            echo "        <input
            type=\"";
            // line 7
            echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text")), "html", null, true);
            echo "\" class=\"form-control\"
            id=\"";
            // line 8
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\"
            value=\"";
            // line 9
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", true, true, false, 9)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", false, false, false, 9), "")) : ("")), "html_attr");
            echo "\"";
            // line 10
            if (twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "min", [], "any", true, true, false, 10)) {
                echo " minlength=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "min", [], "any", false, false, false, 10), "html", null, true);
                echo "\"";
            }
            // line 11
            if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "required", [], "any", true, true, false, 11)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "required", [], "any", false, false, false, 11), false)) : (false))) {
                // line 12
                echo "                required";
            }
            // line 14
            if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "disabled", [], "any", true, true, false, 14)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "disabled", [], "any", false, false, false, 14), false)) : (false))) {
                // line 15
                echo "                disabled";
            }
            // line 17
            if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "readonly", [], "any", true, true, false, 17)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "readonly", [], "any", false, false, false, 17), false)) : (false))) {
                // line 18
                echo "                readonly";
            }
            // line 20
            echo ">
    </div>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 24
    public function macro_textarea($__name__ = null, $__label__ = null, $__opt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "opt" => $__opt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 25
            echo "    <div class=\"mb-3\">
        ";
            // line 26
            if (($context["label"] ?? null)) {
                // line 27
                echo "<label class=\"form-label\" for=\"";
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
                echo "</label>";
            }
            // line 29
            echo "        <textarea class=\"form-control\" id=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\"";
            // line 30
            if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "required", [], "any", true, true, false, 30)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "required", [], "any", false, false, false, 30), false)) : (false))) {
                // line 31
                echo "                required";
            }
            // line 33
            if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "rows", [], "any", true, true, false, 33)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "rows", [], "any", false, false, false, 33), 0)) : (0))) {
                // line 34
                echo "                rows=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "rows", [], "any", false, false, false, 34), "html", null, true);
                echo "\"";
            }
            // line 36
            echo ">";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", true, true, false, 36)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", false, false, false, 36), "")) : ("")), "html", null, true);
            echo "</textarea>
    </div>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 40
    public function macro_select($__name__ = null, $__data__ = null, $__label__ = null, $__selected__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "data" => $__data__,
            "label" => $__label__,
            "selected" => $__selected__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 41
            echo "    <div class=\"mb-3\">
        ";
            // line 42
            if (($context["label"] ?? null)) {
                // line 43
                echo "<label class=\"form-label\" for=\"";
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
                echo "</label>
        ";
            }
            // line 45
            echo "        <select id=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" class=\"form-control\">
            ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["value"] => $context["decription"]) {
                // line 47
                echo "<option value=\"";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
                if (($context["value"] == ($context["selected"] ?? null))) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["decription"], "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['decription'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "        </select>
    </div>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 53
    public function macro_checkbox($__name__ = null, $__label__ = null, $__checked__ = null, $__value__ = null, $__disabled__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "checked" => $__checked__,
            "value" => $__value__,
            "disabled" => $__disabled__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 54
            echo "    <div class=\"form-check mb-3\">
        <label>
            <input type=\"checkbox\" id=\"";
            // line 56
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ((array_key_exists("value", $context)) ? (_twig_default_filter(($context["value"] ?? null), "1")) : ("1")), "html", null, true);
            echo "\" class=\"form-check-input\"";
            // line 57
            if (((array_key_exists("checked", $context)) ? (_twig_default_filter(($context["checked"] ?? null), false)) : (false))) {
                echo " checked";
            }
            // line 58
            if (((array_key_exists("disabled", $context)) ? (_twig_default_filter(($context["disabled"] ?? null), false)) : (false))) {
                echo " disabled";
            }
            // line 59
            echo "            >
            ";
            // line 60
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "
        </label>
    </div>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 65
    public function macro_hidden($__name__ = null, $__value__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "value" => $__value__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 66
            echo "    <input type=\"hidden\" id=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html_attr");
            echo "\">";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 69
    public function macro_button($__label__ = null, $__opt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "opt" => $__opt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 70
            echo "    <button
        class=\"btn btn-";
            // line 71
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "btn_type", [], "any", true, true, false, 71)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "btn_type", [], "any", false, false, false, 71), "secondary")) : ("secondary")), "html", null, true);
            // line 72
            if (twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "size", [], "any", true, true, false, 72)) {
                echo " btn-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "size", [], "any", false, false, false, 72), "html", null, true);
            }
            echo "\"";
            // line 73
            if (twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "type", [], "any", true, true, false, 73)) {
                echo " type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "type", [], "any", false, false, false, 73), "html", null, true);
                echo "\"";
            }
            // line 74
            if (twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "name", [], "any", true, true, false, 74)) {
                echo " name=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "name", [], "any", false, false, false, 74), "html", null, true);
                echo "\"";
            }
            // line 75
            if (twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "title", [], "any", true, true, false, 75)) {
                echo " title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "title", [], "any", false, false, false, 75), "html", null, true);
                echo "\"";
            }
            // line 76
            if ((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", true, true, false, 76) || twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "name", [], "any", true, true, false, 76))) {
                echo " value=\"";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", true, true, false, 76)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", false, false, false, 76), "1")) : ("1")), "html", null, true);
                echo "\"";
            }
            // line 77
            echo ">
        ";
            // line 78
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "
    </button>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 82
    public function macro_submit($__label__ = null, $__opt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "opt" => $__opt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 83
            echo "    ";
            echo twig_call_macro($macros["_self"], "macro_button", [((array_key_exists("label", $context)) ? (_twig_default_filter(($context["label"] ?? null), call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.submit"]))) : (call_user_func_array($this->env->getFunction('__')->getCallable(), ["form.submit"]))), twig_array_merge(["type" => "submit", "btn_type" => "primary"], ((array_key_exists("opt", $context)) ? (_twig_default_filter(($context["opt"] ?? null), [])) : ([])))], 83, $context, $this->getSourceContext());

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 86
    public function macro_switch($__name__ = null, $__label__ = null, $__checked__ = null, $__opt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "checked" => $__checked__,
            "opt" => $__opt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 87
            echo "    <div class=\"form-check form-switch mb-3\">
        <input class=\"form-check-input\" type=\"checkbox\" id=\"";
            // line 88
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", true, true, false, 88)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "value", [], "any", false, false, false, 88), "1")) : ("1")), "html", null, true);
            echo "\"";
            // line 89
            if (((array_key_exists("checked", $context)) ? (_twig_default_filter(($context["checked"] ?? null), false)) : (false))) {
                echo " checked";
            }
            // line 90
            if (((twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "disabled", [], "any", true, true, false, 90)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["opt"] ?? null), "disabled", [], "any", false, false, false, 90), false)) : (false))) {
                echo " disabled";
            }
            // line 91
            echo "        >
        <label class=\"form-check-label\" for=\"";
            // line 92
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
    </div>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "macros/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  466 => 92,  463 => 91,  459 => 90,  455 => 89,  448 => 88,  445 => 87,  429 => 86,  419 => 83,  405 => 82,  394 => 78,  391 => 77,  385 => 76,  379 => 75,  373 => 74,  367 => 73,  361 => 72,  359 => 71,  356 => 70,  342 => 69,  327 => 66,  313 => 65,  301 => 60,  298 => 59,  294 => 58,  290 => 57,  283 => 56,  279 => 54,  262 => 53,  252 => 49,  237 => 47,  233 => 46,  226 => 45,  218 => 43,  216 => 42,  213 => 41,  197 => 40,  185 => 36,  180 => 34,  178 => 33,  175 => 31,  173 => 30,  167 => 29,  160 => 27,  158 => 26,  155 => 25,  140 => 24,  130 => 20,  127 => 18,  125 => 17,  122 => 15,  120 => 14,  117 => 12,  115 => 11,  109 => 10,  106 => 9,  100 => 8,  96 => 7,  93 => 6,  82 => 4,  80 => 3,  77 => 2,  61 => 1,  56 => 85,  53 => 81,  50 => 68,  47 => 64,  44 => 52,  41 => 39,  38 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "macros/form.twig", "/var/www/html/engelsystem/resources/views/macros/form.twig");
    }
}
