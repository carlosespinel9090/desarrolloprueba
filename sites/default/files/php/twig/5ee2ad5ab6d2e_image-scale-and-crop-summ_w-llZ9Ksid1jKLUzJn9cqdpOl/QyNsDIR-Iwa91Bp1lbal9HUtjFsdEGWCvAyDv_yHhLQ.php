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

/* core/modules/image/templates/image-scale-and-crop-summary.html.twig */
class __TwigTemplate_5eecc8d6f90a174ae6aa2991ff86475671a5007d88303d820d18cfcb26b10e08 extends \Twig\Template
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
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = array("if" => 20, "trans" => 24);
        $filters = array("escape" => 21);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        if ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "width", [], "any", false, false, true, 20) && twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "height", [], "any", false, false, true, 20))) {
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "width", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo "×";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "height", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
        } else {
            // line 23
            if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "width", [], "any", false, false, true, 23)) {
                // line 24
                echo "    ";
                echo t("width @data.width", array("@data.width" => twig_get_attribute($this->env, $this->source,                 // line 25
($context["data"] ?? null), "width", [], "any", false, false, true, 25), ));
                // line 27
                echo "  ";
            } elseif (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "height", [], "any", false, false, true, 27)) {
                // line 28
                echo "    ";
                echo t("height @data.height", array("@data.height" => twig_get_attribute($this->env, $this->source,                 // line 29
($context["data"] ?? null), "height", [], "any", false, false, true, 29), ));
                // line 31
                echo "  ";
            }
        }
    }

    public function getTemplateName()
    {
        return "core/modules/image/templates/image-scale-and-crop-summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 31,  80 => 29,  78 => 28,  75 => 27,  73 => 25,  71 => 24,  69 => 23,  64 => 21,  62 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/image/templates/image-scale-and-crop-summary.html.twig", "/var/www/html/drupal9/core/modules/image/templates/image-scale-and-crop-summary.html.twig");
    }
}
