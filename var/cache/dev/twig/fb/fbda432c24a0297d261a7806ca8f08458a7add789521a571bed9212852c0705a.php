<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_a6d5f47775eae9850b0e5f541b5c0dcb4b38377a11f553de088e708b28b9c897 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
        $__internal_b1a86fc34ab498bee9cc2091fedab50499760a7a66462198e343a4d89ede2acb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b1a86fc34ab498bee9cc2091fedab50499760a7a66462198e343a4d89ede2acb->enter($__internal_b1a86fc34ab498bee9cc2091fedab50499760a7a66462198e343a4d89ede2acb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_21afce1a65ad07183b483b4383079adbbdc6e2987a129326bfcf51d0486fdf1f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_21afce1a65ad07183b483b4383079adbbdc6e2987a129326bfcf51d0486fdf1f->enter($__internal_21afce1a65ad07183b483b4383079adbbdc6e2987a129326bfcf51d0486fdf1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b1a86fc34ab498bee9cc2091fedab50499760a7a66462198e343a4d89ede2acb->leave($__internal_b1a86fc34ab498bee9cc2091fedab50499760a7a66462198e343a4d89ede2acb_prof);

        
        $__internal_21afce1a65ad07183b483b4383079adbbdc6e2987a129326bfcf51d0486fdf1f->leave($__internal_21afce1a65ad07183b483b4383079adbbdc6e2987a129326bfcf51d0486fdf1f_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_8667ba9eb562c7691be4ebada7e855d105a5dcb727313406486f0df39067750e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8667ba9eb562c7691be4ebada7e855d105a5dcb727313406486f0df39067750e->enter($__internal_8667ba9eb562c7691be4ebada7e855d105a5dcb727313406486f0df39067750e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_4fdd9e0b9518949a1da5c7b9aaf25629f11fdef84b829afce07b2c9531a679eb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4fdd9e0b9518949a1da5c7b9aaf25629f11fdef84b829afce07b2c9531a679eb->enter($__internal_4fdd9e0b9518949a1da5c7b9aaf25629f11fdef84b829afce07b2c9531a679eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_4fdd9e0b9518949a1da5c7b9aaf25629f11fdef84b829afce07b2c9531a679eb->leave($__internal_4fdd9e0b9518949a1da5c7b9aaf25629f11fdef84b829afce07b2c9531a679eb_prof);

        
        $__internal_8667ba9eb562c7691be4ebada7e855d105a5dcb727313406486f0df39067750e->leave($__internal_8667ba9eb562c7691be4ebada7e855d105a5dcb727313406486f0df39067750e_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_c216f9a68adaf8ff4fab7c20ca7153885b95f4d58291a98fc48dab14a3e34793 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c216f9a68adaf8ff4fab7c20ca7153885b95f4d58291a98fc48dab14a3e34793->enter($__internal_c216f9a68adaf8ff4fab7c20ca7153885b95f4d58291a98fc48dab14a3e34793_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_3fa56c657c4679c31cd75befea4e16934710fd21bb9383ea74cb093e83ddf0d9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3fa56c657c4679c31cd75befea4e16934710fd21bb9383ea74cb093e83ddf0d9->enter($__internal_3fa56c657c4679c31cd75befea4e16934710fd21bb9383ea74cb093e83ddf0d9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_3fa56c657c4679c31cd75befea4e16934710fd21bb9383ea74cb093e83ddf0d9->leave($__internal_3fa56c657c4679c31cd75befea4e16934710fd21bb9383ea74cb093e83ddf0d9_prof);

        
        $__internal_c216f9a68adaf8ff4fab7c20ca7153885b95f4d58291a98fc48dab14a3e34793->leave($__internal_c216f9a68adaf8ff4fab7c20ca7153885b95f4d58291a98fc48dab14a3e34793_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_3e36948144c4a95d397a51437f07397083e850205a5d3b4f0f36b096651d5b64 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3e36948144c4a95d397a51437f07397083e850205a5d3b4f0f36b096651d5b64->enter($__internal_3e36948144c4a95d397a51437f07397083e850205a5d3b4f0f36b096651d5b64_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_a2fbb9525365a4c11cd56bf5b91bea293e9ca1a1643d30f81a2d54271e5ce196 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a2fbb9525365a4c11cd56bf5b91bea293e9ca1a1643d30f81a2d54271e5ce196->enter($__internal_a2fbb9525365a4c11cd56bf5b91bea293e9ca1a1643d30f81a2d54271e5ce196_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_a2fbb9525365a4c11cd56bf5b91bea293e9ca1a1643d30f81a2d54271e5ce196->leave($__internal_a2fbb9525365a4c11cd56bf5b91bea293e9ca1a1643d30f81a2d54271e5ce196_prof);

        
        $__internal_3e36948144c4a95d397a51437f07397083e850205a5d3b4f0f36b096651d5b64->leave($__internal_3e36948144c4a95d397a51437f07397083e850205a5d3b4f0f36b096651d5b64_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
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

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/var/www/html/snowtricks/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
