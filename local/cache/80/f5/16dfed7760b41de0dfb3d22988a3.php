<?php

/* login.phtml */
class __TwigTemplate_80f516dfed7760b41de0dfb3d22988a3 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />
\t\t<meta charset=\"utf-8\" />
\t\t<title>Login Admin</title>
\t\t<link rel=\"shortcut icon\" href=\"https://stock.schoolmedia.id/general/logo/faveicon.ico\"/>

\t\t<meta name=\"description\" content=\"User login page\" />
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\" />

\t\t<!-- bootstrap & fontawesome -->
\t\t<link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/bootstrap.css\" />
\t\t<link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\"/>

\t\t<!-- text fonts -->
\t\t<link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-fonts.css\" />

\t\t<!-- ace styles -->
\t\t<link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace.css\" />

\t\t<!--[if lte IE 9]>
\t\t\t<link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-part2.css\" />
\t\t<![endif]-->
\t\t<link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-rtl.css\" />

\t\t<!--[if lte IE 9]>
\t\t  <link rel=\"stylesheet\" href=\"https://stock.schoolmedia.id/f02/assets/css/ace-ie.css\" />
\t\t<![endif]-->

\t\t<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

\t\t<!--[if lte IE 8]>
\t\t<script src=\"https://stock.schoolmedia.id/f02/components/html5shiv/dist/html5shiv.min.js\"></script>
\t\t<script src=\"https://stock.schoolmedia.id/f02/components/respond/dest/respond.min.js\"></script>
\t\t<![endif]-->
\t</head>

\t<body class=\"login-layout\">
\t\t<div class=\"main-container\">
\t\t\t<div class=\"main-content\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-10 col-sm-offset-1\">
\t\t\t\t\t\t<div class=\"login-container\">
\t\t\t\t\t\t\t<div class=\"center\">
\t\t\t\t\t\t\t\t<h1>
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-leaf green\"></i>
\t\t\t\t\t\t\t\t\t<span class=\"red\">PPDB Online</span>
\t\t\t\t\t\t\t\t\t<span class=\"white\" id=\"id-text2\">[TAHUN]</span>
\t\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t\t<h4 class=\"blue\" id=\"id-company-text\">[DINAS]</h4>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"space-6\"></div>

\t\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t\t<div id=\"login-box\" class=\"login-box visible widget-box no-border\">
\t\t\t\t\t\t\t\t\t<div class=\"widget-body\">
\t\t\t\t\t\t\t\t\t\t<div class=\"widget-main\">
\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"header blue lighter bigger\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-coffee green\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tLogin Panitia
\t\t\t\t\t\t\t\t\t\t\t</h4>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"space-6\"></div>

\t\t\t\t\t\t\t\t\t\t\t<form>
\t\t\t\t\t\t\t\t\t\t\t\t<fieldset>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"block clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"block input-icon input-icon-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"NIP/Email\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"block clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"block input-icon input-icon-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" placeholder=\"Password\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-lock\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"space\"></div>

\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">

";
        // line 93
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"width-35 pull-right btn btn-sm btn-primary\" href=\"/berandaAdmin\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-key\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"bigger-110\">Login</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"space-4\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t</fieldset>
\t\t\t\t\t\t\t\t\t\t\t</form>

\t\t\t\t\t\t\t\t\t\t</div><!-- /.widget-main -->

\t\t\t\t\t\t\t\t\t\t<div class=\"toolbar clearfix\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" data-target=\"#forgot-box\" class=\"forgot-password-link\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-arrow-left\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\tKembali
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" data-target=\"#signup-box\" class=\"user-signup-link\">
\t\t\t\t\t\t\t\t\t\t\t\t\tLupa Password
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-arrow-right\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div><!-- /.widget-body -->
\t\t\t\t\t\t\t\t</div><!-- /.login-box -->
\t\t\t\t\t\t\t</div><!-- /.position-relative -->

\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- /.col -->
\t\t\t\t</div><!-- /.row -->
\t\t\t</div><!-- /.main-content -->
\t\t</div><!-- /.main-container -->

\t\t<!-- basic scripts -->

\t\t<!--[if !IE]> -->
\t\t<script src=\"https://stock.schoolmedia.id/f02/components/jquery/dist/jquery.js\"></script>

\t\t<!-- <![endif]-->

\t\t<!--[if IE]>
<script src=\"https://stock.schoolmedia.id/f02/components/jquery.1x/dist/jquery.js\"></script>
<![endif]-->
\t\t<script type=\"text/javascript\">
\t\t\tif('ontouchstart' in document.documentElement) document.write(\"<script src='https://stock.schoolmedia.id/f02/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>\"+\"<\"+\"/script>\");
\t\t</script>

\t\t<!-- inline scripts related to this page -->
\t\t<script type=\"text/javascript\">
\t\t</script>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "login.phtml";
    }

}
