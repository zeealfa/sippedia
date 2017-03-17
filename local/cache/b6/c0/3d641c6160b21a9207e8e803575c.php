<?php

/* utama.phtml */
class __TwigTemplate_b6c03d641c6160b21a9207e8e803575c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "depan.phtml";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"row\">
\t<div class=\"col-xs-12\">
\t\t";
        // line 5
        $this->env->loadTemplate("header.phtml")->display(array_merge($context, array("Judul" => "Selamat Datang", "SubJudul" => "Halaman Informasi PPDB [TAHUN]")));
        // line 6
        echo "\t</div><!-- /.col -->
</div><!-- /.row -->
";
    }

    public function getTemplateName()
    {
        return "utama.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
