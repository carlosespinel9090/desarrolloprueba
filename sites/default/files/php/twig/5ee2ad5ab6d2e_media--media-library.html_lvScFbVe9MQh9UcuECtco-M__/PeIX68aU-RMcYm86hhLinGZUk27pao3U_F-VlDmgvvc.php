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

/* core/modules/media_library/templates/media--media-library.html.twig */
class __TwigTemplate_66474755bbf37151bf2d9bbacbff66d5e456a30d666bcf9e7cd2ffefb0012eb0 extends \Twig\Template
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
        $tags = array("if" => 38);
        $filters = array("escape" => 37, "without" => 40, "t" => 43);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'without', 't'],
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
        // line 37
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 37, $this->source), "html", null, true);
        echo ">
  ";
        // line 38
        if (($context["content"] ?? null)) {
            // line 39
            echo "    <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["preview_attributes"] ?? null), "addClass", [0 => "js-media-library-item-preview"], "method", false, false, true, 39), 39, $this->source), "html", null, true);
            echo ">
      ";
            // line 40
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 40, $this->source), "name"), "html", null, true);
            echo "
    </div>
    ";
            // line 42
            if ( !($context["status"] ?? null)) {
                // line 43
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("unpublished"));
                echo "
    ";
            }
            // line 45
            echo "    <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata_attributes"] ?? null), 45, $this->source), "html", null, true);
            echo ">
      ";
            // line 46
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 46, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 49
        echo "</article>
";
    }

    public function getTemplateName()
    {
        return "core/modules/media_library/templates/media--media-library.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 49,  92 => 46,  87 => 45,  81 => 43,  79 => 42,  74 => 40,  69 => 39,  67 => 38,  62 => 37,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/media_library/templates/media--media-library.html.twig", "/var/www/html/drupal9/core/modules/media_library/templates/media--media-library.html.twig");
    }
}
