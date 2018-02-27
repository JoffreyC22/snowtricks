<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_60d323e41511724e9a0795bfebea260f337c41c0c6ad284d1e6b781ac0094084 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ca0cb699ff6c91540bf209abd6b77a6a5645d900cc2d60f61e49076c01477c3d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ca0cb699ff6c91540bf209abd6b77a6a5645d900cc2d60f61e49076c01477c3d->enter($__internal_ca0cb699ff6c91540bf209abd6b77a6a5645d900cc2d60f61e49076c01477c3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_0d22f1563729672fb7d6c215bca47f70f442b1561a086591cfc6fd4b0388a6f5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0d22f1563729672fb7d6c215bca47f70f442b1561a086591cfc6fd4b0388a6f5->enter($__internal_0d22f1563729672fb7d6c215bca47f70f442b1561a086591cfc6fd4b0388a6f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ca0cb699ff6c91540bf209abd6b77a6a5645d900cc2d60f61e49076c01477c3d->leave($__internal_ca0cb699ff6c91540bf209abd6b77a6a5645d900cc2d60f61e49076c01477c3d_prof);

        
        $__internal_0d22f1563729672fb7d6c215bca47f70f442b1561a086591cfc6fd4b0388a6f5->leave($__internal_0d22f1563729672fb7d6c215bca47f70f442b1561a086591cfc6fd4b0388a6f5_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_8033ddac6eef753aebe40fd983ee8a61db3266a37fc09f47e66c89395f69d23b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8033ddac6eef753aebe40fd983ee8a61db3266a37fc09f47e66c89395f69d23b->enter($__internal_8033ddac6eef753aebe40fd983ee8a61db3266a37fc09f47e66c89395f69d23b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_61f64c0720c33603b7a85eb7eb73031aa217ac0df2231ecaa7b06ad84e006fbe = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_61f64c0720c33603b7a85eb7eb73031aa217ac0df2231ecaa7b06ad84e006fbe->enter($__internal_61f64c0720c33603b7a85eb7eb73031aa217ac0df2231ecaa7b06ad84e006fbe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_61f64c0720c33603b7a85eb7eb73031aa217ac0df2231ecaa7b06ad84e006fbe->leave($__internal_61f64c0720c33603b7a85eb7eb73031aa217ac0df2231ecaa7b06ad84e006fbe_prof);

        
        $__internal_8033ddac6eef753aebe40fd983ee8a61db3266a37fc09f47e66c89395f69d23b->leave($__internal_8033ddac6eef753aebe40fd983ee8a61db3266a37fc09f47e66c89395f69d23b_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_9cdb4b6c74a926323dde2c0428383cddd0d822f4357382d9a9b20e7aee0fb624 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9cdb4b6c74a926323dde2c0428383cddd0d822f4357382d9a9b20e7aee0fb624->enter($__internal_9cdb4b6c74a926323dde2c0428383cddd0d822f4357382d9a9b20e7aee0fb624_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_bd486618da58c53c9249a47074d354dbdfbd59e51ad71a4ba08330ff00097ea4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bd486618da58c53c9249a47074d354dbdfbd59e51ad71a4ba08330ff00097ea4->enter($__internal_bd486618da58c53c9249a47074d354dbdfbd59e51ad71a4ba08330ff00097ea4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_bd486618da58c53c9249a47074d354dbdfbd59e51ad71a4ba08330ff00097ea4->leave($__internal_bd486618da58c53c9249a47074d354dbdfbd59e51ad71a4ba08330ff00097ea4_prof);

        
        $__internal_9cdb4b6c74a926323dde2c0428383cddd0d822f4357382d9a9b20e7aee0fb624->leave($__internal_9cdb4b6c74a926323dde2c0428383cddd0d822f4357382d9a9b20e7aee0fb624_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_7f4a1c08fa3568a189a070f517e0d4501c9d0215fcf27118c67708851817fcf8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7f4a1c08fa3568a189a070f517e0d4501c9d0215fcf27118c67708851817fcf8->enter($__internal_7f4a1c08fa3568a189a070f517e0d4501c9d0215fcf27118c67708851817fcf8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_3f7667da10463789d67cc073c642fd3b14a139e3ba15a13e52ecede1ff642829 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3f7667da10463789d67cc073c642fd3b14a139e3ba15a13e52ecede1ff642829->enter($__internal_3f7667da10463789d67cc073c642fd3b14a139e3ba15a13e52ecede1ff642829_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_3f7667da10463789d67cc073c642fd3b14a139e3ba15a13e52ecede1ff642829->leave($__internal_3f7667da10463789d67cc073c642fd3b14a139e3ba15a13e52ecede1ff642829_prof);

        
        $__internal_7f4a1c08fa3568a189a070f517e0d4501c9d0215fcf27118c67708851817fcf8->leave($__internal_7f4a1c08fa3568a189a070f517e0d4501c9d0215fcf27118c67708851817fcf8_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/var/www/html/snowtricks/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
