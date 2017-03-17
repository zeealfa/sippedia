<?php

/* depan.phtml */
class __TwigTemplate_f0fafa671b51dcfed584832753e1f356 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'navHeader' => array($this, 'block_navHeader'),
            'sidebar' => array($this, 'block_sidebar'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'content' => array($this, 'block_content'),
            'rightSlider' => array($this, 'block_rightSlider'),
            'jscript' => array($this, 'block_jscript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\"/>
    <meta charset=\"utf-8\"/>
    <title>PPDB ONLINE [TAHUN][DINAS]</title>
    <link rel=\"shortcut icon\" href=\"https://stock.schoolmedia.id/general/logo/faveicon.ico\"/>
    <meta name=\"description\" content=\"\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\"/>

    <!-- bootstrap & fontawesome -->
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/bootstrap.min.css\"/>
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-fonts.css\"/>

    <!-- ace styles -->
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace.css\" class=\"ace-main-stylesheet\" id=\"main-ace-style\"/>

    <!--[if lte IE 9]>
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-part2.css\" class=\"ace-main-stylesheet\"/>
    <![endif]-->
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-skins.css\"/>
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-rtl.css\"/>

    <!--[if lte IE 9]>
    <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-ie.css\"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src=\"https://stock.schoolmedia.id/f02/assets/js/ace-extra.js\"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src=\"../components/html5shiv/dist/html5shiv.min.js\"></script>
    <script src=\"../components/respond/dest/respond.min.js\"></script>
    <![endif]-->
</head>

<body class=\"skin-1\">
<!-- #section:basics/navbar.layout -->
<div id=\"navbar\" class=\"navbar navbar-default navbar-fixed-top\">
    <div class=\"navbar-container ace-save-state\" id=\"navbar-container\">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type=\"button\" class=\"navbar-toggle menu-toggler pull-left\" id=\"menu-toggler\" data-target=\"#sidebar\">
            <span class=\"sr-only\">Toggle sidebar</span>

            <span class=\"icon-bar\"></span>

            <span class=\"icon-bar\"></span>

            <span class=\"icon-bar\"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class=\"navbar-header pull-left\">
            <!-- #section:basics/navbar.layout.brand -->
            <a href=\"/\" class=\"navbar-brand\">
                ";
        // line 66
        echo "                <small>
                    PPDB Online [TAHUN]
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        ";
        // line 79
        $this->displayBlock('navHeader', $context, $blocks);
        // line 82
        echo "        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class=\"main-container ace-save-state\" id=\"main-container\" \">
    <script type=\"text/javascript\">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>

    <!-- #section:basics/sidebar -->
    ";
        // line 96
        $this->displayBlock('sidebar', $context, $blocks);
        // line 98
        echo "    <!-- /section:basics/sidebar -->
    <div class=\"main-content\">
        <div class=\"main-content-inner\">
            <!-- #section:basics/content.breadcrumbs -->
            ";
        // line 102
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 104
        echo "            <!-- /section:basics/content.breadcrumbs -->
            <div class=\"page-content\">
                <!-- #section:settings.box -->
                ";
        // line 107
        $this->displayBlock('content', $context, $blocks);
        // line 110
        echo "
                ";
        // line 111
        $this->displayBlock('rightSlider', $context, $blocks);
        // line 114
        echo "            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class=\"footer\">
        <div class=\"footer-inner\">
            <!-- #section:basics/footer -->
            <div class=\"footer-content\">
\t\t\t\t\t\t<span class=\"bigger-120\">
\t\t\t\t\t\t\t<span class=\"blue bolder\">[NAMA DINAS]</span>
\t\t\t\t\t\t\tKota &copy; [TAHUN]
\t\t\t\t\t\t</span>

                &nbsp; &nbsp;
\t\t\t\t\t\t<span class=\"action-buttons\">
\t\t\t\t\t\t\t<a href=\"#\">
                                <i class=\"ace-icon fa fa-twitter-square light-blue bigger-150\"></i>
                            </a>

\t\t\t\t\t\t\t<a href=\"#\">
                                <i class=\"ace-icon fa fa-facebook-square text-primary bigger-150\"></i>
                            </a>

\t\t\t\t\t\t\t<a href=\"#\">
                                <i class=\"ace-icon fa fa-rss-square orange bigger-150\"></i>
                            </a>
\t\t\t\t\t\t</span>
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>
    <a href=\"#\" id=\"btn-scroll-up\" class=\"btn-scroll-up btn btn-sm btn-inverse\">
        <i class=\"ace-icon fa fa-angle-double-up icon-only bigger-110\"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src=\"https://stock.schoolmedia.id/f02/components/jquery/dist/jquery.js\"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src=\"https://stock.schoolmedia.id/f02/components/jquery.1x/dist/jquery.js\"></script>
<![endif]-->
<script type=\"text/javascript\">
    if ('ontouchstart' in document.documentElement) document.write(\"<script src='../components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>\" + \"<\" + \"/script>\");
</script>
<script src=\"https://stock.schoolmedia.id/f02/components/bootstrap/dist/js/bootstrap.js\"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.scroller.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.colorpicker.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.fileinput.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.typeahead.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.wysiwyg.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.spinner.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.treeview.js\"></script>-->
<!--\t\t<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/elements.wizard.js\"></script>-->
<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/ace.js\"></script>
<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/ace.basics.js\"></script>
<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/ace.scrolltop.js\"></script>
";
        // line 182
        echo "<script src=\"https://stock.schoolmedia.id/f02/assets/js/src/ace.sidebar.js\"></script>
";
        // line 191
        echo "
<!-- inline scripts related to this page -->

";
        // line 194
        $this->displayBlock('jscript', $context, $blocks);
        // line 197
        echo "
</body>
</html>
";
    }

    // line 79
    public function block_navHeader($context, array $blocks = array())
    {
        // line 80
        echo "            <!--BLOCK UNTUK PROFIL KANAN ATAS -->
        ";
    }

    // line 96
    public function block_sidebar($context, array $blocks = array())
    {
        // line 97
        echo "    ";
    }

    // line 102
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 103
        echo "            ";
    }

    // line 107
    public function block_content($context, array $blocks = array())
    {
        // line 108
        echo "                    <!-- /section:settings.box -->
                ";
    }

    // line 111
    public function block_rightSlider($context, array $blocks = array())
    {
        // line 112
        echo "
                ";
    }

    // line 194
    public function block_jscript($context, array $blocks = array())
    {
        // line 195
        echo "
";
    }

    public function getTemplateName()
    {
        return "depan.phtml";
    }

}
