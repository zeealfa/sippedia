<?php

/* 404.phtml */
class __TwigTemplate_7cf9acf6c326e2937f0be6e64352d4e2 extends Twig_Template
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
        return "utama.phtml";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        $this->displayParentBlock("content", $context, $blocks);
        echo "
<h3 class=\"page-title\">Ups....!</h3>
<div class=\"row\">
    <div class=\"col-md-12\">
        <!-- Begin: life time stats -->
        <div class=\"portlet light portlet-fit round  bordered\">
            <div class=\"portlet-title\">
                <div class=\"caption\">
                    <i class=\"fa fa-chart font-dark\"></i>
                    <span class=\"caption-subject font-dark sbold uppercase\">         Halaman yang Anda cari tidak ditemukan
</span>
                    </span>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "404.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
