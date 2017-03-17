<?php

/* standar.phtml */
class __TwigTemplate_24d74e4e91b86f677e9a5071e4338fa7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'navHeader' => array($this, 'block_navHeader'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
            'rightSlider' => array($this, 'block_rightSlider'),
            'jscript' => array($this, 'block_jscript'),
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
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->env->loadTemplate("bread.phtml")->display($context);
    }

    // line 6
    public function block_navHeader($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $this->env->loadTemplate("navHeader.phtml")->display($context);
        echo " ";
        // line 8
        echo "
";
    }

    // line 11
    public function block_sidebar($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->env->loadTemplate("sidebar.phtml")->display($context);
        echo " ";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "    ";
        $this->env->loadTemplate("header.phtml")->display(array_merge($context, array("Judul" => "Selamat Datang", "SubJudul" => "Nama Admin")));
        // line 18
        echo "    <div class=\"row\">
    </div><!-- /.row -->
";
    }

    // line 24
    public function block_rightSlider($context, array $blocks = array())
    {
        // line 25
        echo "    ";
        $this->env->loadTemplate("rightSlider.phtml")->display($context);
    }

    // line 28
    public function block_jscript($context, array $blocks = array())
    {
        // line 29
        echo "    <script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.aside.js\"></script>
    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('.modal.aside').ace_aside();

            \$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});

            //\$('#top-menu').modal('show')

            \$(document).one('ajaxloadstart.page', function (e) {
                //in ajax mode, remove before leaving page
                \$('.modal.aside').remove();
                \$(window).off('.aside')
            });


            //make content sliders resizable using jQuery UI (you should include jquery ui files)
            //\$('#right-menu > .modal-dialog').resizable({handles: \"w\", grid: [ 20, 0 ], minWidth: 200, maxWidth: 600});
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "standar.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
