<?php

/* header.phtml */
class __TwigTemplate_8698f33ca258a47f2650e8a653cd0e6d extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"page-header\">
\t<h1>
\t\t";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["Judul"]) ? $context["Judul"] : null), "html", null, true);
        echo "
\t\t<small>
\t\t\t<i class=\"ace-icon fa fa-angle-double-right\"></i>
\t\t\t";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["SubJudul"]) ? $context["SubJudul"] : null), "html", null, true);
        echo "
\t\t</small>
\t</h1>
</div>";
    }

    public function getTemplateName()
    {
        return "header.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
