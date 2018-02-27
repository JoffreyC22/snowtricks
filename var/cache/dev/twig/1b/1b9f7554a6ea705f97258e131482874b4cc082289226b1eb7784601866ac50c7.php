<?php

/* base.html.twig */
class __TwigTemplate_58fcb55423d3274a662181a229734752e725144dd63773cc99fa1c7691dad048 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_88841c1bc1581ad038c428f9c23b1ae5b4b318acc0fe5e07063c2b402d614562 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_88841c1bc1581ad038c428f9c23b1ae5b4b318acc0fe5e07063c2b402d614562->enter($__internal_88841c1bc1581ad038c428f9c23b1ae5b4b318acc0fe5e07063c2b402d614562_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_ba4b7c9a8de24e2b68b10af9179f5c4756a33118611da0850d5437768ced364f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ba4b7c9a8de24e2b68b10af9179f5c4756a33118611da0850d5437768ced364f->enter($__internal_ba4b7c9a8de24e2b68b10af9179f5c4756a33118611da0850d5437768ced364f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_88841c1bc1581ad038c428f9c23b1ae5b4b318acc0fe5e07063c2b402d614562->leave($__internal_88841c1bc1581ad038c428f9c23b1ae5b4b318acc0fe5e07063c2b402d614562_prof);

        
        $__internal_ba4b7c9a8de24e2b68b10af9179f5c4756a33118611da0850d5437768ced364f->leave($__internal_ba4b7c9a8de24e2b68b10af9179f5c4756a33118611da0850d5437768ced364f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_842a7a963ef649cc21eaec32b94ce366a4f4f71fc072a22dd880942ac5a5720d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_842a7a963ef649cc21eaec32b94ce366a4f4f71fc072a22dd880942ac5a5720d->enter($__internal_842a7a963ef649cc21eaec32b94ce366a4f4f71fc072a22dd880942ac5a5720d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_a8c54075d26d68648455bfc367c352a551c479890a4c799e0dcbcd5495130469 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a8c54075d26d68648455bfc367c352a551c479890a4c799e0dcbcd5495130469->enter($__internal_a8c54075d26d68648455bfc367c352a551c479890a4c799e0dcbcd5495130469_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_a8c54075d26d68648455bfc367c352a551c479890a4c799e0dcbcd5495130469->leave($__internal_a8c54075d26d68648455bfc367c352a551c479890a4c799e0dcbcd5495130469_prof);

        
        $__internal_842a7a963ef649cc21eaec32b94ce366a4f4f71fc072a22dd880942ac5a5720d->leave($__internal_842a7a963ef649cc21eaec32b94ce366a4f4f71fc072a22dd880942ac5a5720d_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_173d0962c569d66c28ca308bfc7cf4915b96daedb849132e99d7ceaf1d7cd05f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_173d0962c569d66c28ca308bfc7cf4915b96daedb849132e99d7ceaf1d7cd05f->enter($__internal_173d0962c569d66c28ca308bfc7cf4915b96daedb849132e99d7ceaf1d7cd05f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_fa4b02bbc92d23c5a55e045099e1be5ae89c20ba2946c83849d674dcf038d230 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fa4b02bbc92d23c5a55e045099e1be5ae89c20ba2946c83849d674dcf038d230->enter($__internal_fa4b02bbc92d23c5a55e045099e1be5ae89c20ba2946c83849d674dcf038d230_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_fa4b02bbc92d23c5a55e045099e1be5ae89c20ba2946c83849d674dcf038d230->leave($__internal_fa4b02bbc92d23c5a55e045099e1be5ae89c20ba2946c83849d674dcf038d230_prof);

        
        $__internal_173d0962c569d66c28ca308bfc7cf4915b96daedb849132e99d7ceaf1d7cd05f->leave($__internal_173d0962c569d66c28ca308bfc7cf4915b96daedb849132e99d7ceaf1d7cd05f_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_28a09f2b2f1f7192a743f2debf92498add51c955735bfec5cb51ad550063a83b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_28a09f2b2f1f7192a743f2debf92498add51c955735bfec5cb51ad550063a83b->enter($__internal_28a09f2b2f1f7192a743f2debf92498add51c955735bfec5cb51ad550063a83b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_8a52d9779121ba641d9330de01daa2fe6dd2261e61f9314424c566560ec47a30 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8a52d9779121ba641d9330de01daa2fe6dd2261e61f9314424c566560ec47a30->enter($__internal_8a52d9779121ba641d9330de01daa2fe6dd2261e61f9314424c566560ec47a30_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_8a52d9779121ba641d9330de01daa2fe6dd2261e61f9314424c566560ec47a30->leave($__internal_8a52d9779121ba641d9330de01daa2fe6dd2261e61f9314424c566560ec47a30_prof);

        
        $__internal_28a09f2b2f1f7192a743f2debf92498add51c955735bfec5cb51ad550063a83b->leave($__internal_28a09f2b2f1f7192a743f2debf92498add51c955735bfec5cb51ad550063a83b_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_fd93552f4172d14f0fb548eb8fcb469097e05577280a98f630c676246bc33445 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fd93552f4172d14f0fb548eb8fcb469097e05577280a98f630c676246bc33445->enter($__internal_fd93552f4172d14f0fb548eb8fcb469097e05577280a98f630c676246bc33445_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6e59e424102a02e987944e9288e455733ff42515336e90e4a83cc293b4a8c01c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6e59e424102a02e987944e9288e455733ff42515336e90e4a83cc293b4a8c01c->enter($__internal_6e59e424102a02e987944e9288e455733ff42515336e90e4a83cc293b4a8c01c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6e59e424102a02e987944e9288e455733ff42515336e90e4a83cc293b4a8c01c->leave($__internal_6e59e424102a02e987944e9288e455733ff42515336e90e4a83cc293b4a8c01c_prof);

        
        $__internal_fd93552f4172d14f0fb548eb8fcb469097e05577280a98f630c676246bc33445->leave($__internal_fd93552f4172d14f0fb548eb8fcb469097e05577280a98f630c676246bc33445_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 11,  100 => 10,  83 => 6,  65 => 5,  53 => 12,  50 => 11,  48 => 10,  41 => 7,  39 => 6,  35 => 5,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/var/www/html/snowtricks/app/Resources/views/base.html.twig");
    }
}
