<?php

/* blank.html */
class __TwigTemplate_ee91629b0b2c0c81533da26acabe2345 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />
\t\t<meta charset=\"utf-8\" />
\t\t<title>Blank Page - Ace Admin</title>

\t\t<meta name=\"description\" content=\"\" />
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\" />

\t\t<!-- bootstrap & fontawesome -->
\t\t<link rel=\"stylesheet\" href=\"../assets/css/bootstrap.css\" />
\t\t<link rel=\"stylesheet\" href=\"../components/font-awesome/css/font-awesome.css\" />

\t\t<!-- page specific plugin styles -->

\t\t<!-- text fonts -->
\t\t<link rel=\"stylesheet\" href=\"../assets/css/ace-fonts.css\" />

\t\t<!-- ace styles -->
\t\t<link rel=\"stylesheet\" href=\"../assets/css/ace.css\" class=\"ace-main-stylesheet\" id=\"main-ace-style\" />

\t\t<!--[if lte IE 9]>
\t\t\t<link rel=\"stylesheet\" href=\"../assets/css/ace-part2.css\" class=\"ace-main-stylesheet\" />
\t\t<![endif]-->
\t\t<link rel=\"stylesheet\" href=\"../assets/css/ace-skins.css\" />
\t\t<link rel=\"stylesheet\" href=\"../assets/css/ace-rtl.css\" />

\t\t<!--[if lte IE 9]>
\t\t  <link rel=\"stylesheet\" href=\"../assets/css/ace-ie.css\" />
\t\t<![endif]-->

\t\t<!-- inline styles related to this page -->

\t\t<!-- ace settings handler -->
\t\t<script src=\"../assets/js/ace-extra.js\"></script>

\t\t<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

\t\t<!--[if lte IE 8]>
\t\t<script src=\"../components/html5shiv/dist/html5shiv.min.js\"></script>
\t\t<script src=\"../components/respond/dest/respond.min.js\"></script>
\t\t<![endif]-->
\t</head>

\t<body class=\"no-skin\">
\t\t<!-- #section:basics/navbar.layout -->
\t\t<div id=\"navbar\" class=\"navbar navbar-default          ace-save-state\">
\t\t\t<div class=\"navbar-container ace-save-state\" id=\"navbar-container\">
\t\t\t\t<!-- #section:basics/sidebar.mobile.toggle -->
\t\t\t\t<button type=\"button\" class=\"navbar-toggle menu-toggler pull-left\" id=\"menu-toggler\" data-target=\"#sidebar\">
\t\t\t\t\t<span class=\"sr-only\">Toggle sidebar</span>

\t\t\t\t\t<span class=\"icon-bar\"></span>

\t\t\t\t\t<span class=\"icon-bar\"></span>

\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t</button>

\t\t\t\t<!-- /section:basics/sidebar.mobile.toggle -->
\t\t\t\t<div class=\"navbar-header pull-left\">
\t\t\t\t\t<!-- #section:basics/navbar.layout.brand -->
\t\t\t\t\t<a href=\"#\" class=\"navbar-brand\">
\t\t\t\t\t\t<small>
\t\t\t\t\t\t\t<i class=\"fa fa-leaf\"></i>
\t\t\t\t\t\t\tAce Admin
\t\t\t\t\t\t</small>
\t\t\t\t\t</a>

\t\t\t\t\t<!-- /section:basics/navbar.layout.brand -->

\t\t\t\t\t<!-- #section:basics/navbar.toggle -->

\t\t\t\t\t<!-- /section:basics/navbar.toggle -->
\t\t\t\t</div>

\t\t\t\t<!-- #section:basics/navbar.dropdown -->
\t\t\t\t<div class=\"navbar-buttons navbar-header pull-right\" role=\"navigation\">
\t\t\t\t\t<ul class=\"nav ace-nav\">
\t\t\t\t\t\t<li class=\"grey dropdown-modal\">
\t\t\t\t\t\t\t<a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-tasks\"></i>
\t\t\t\t\t\t\t\t<span class=\"badge badge-grey\">4</span>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<ul class=\"dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close\">
\t\t\t\t\t\t\t\t<li class=\"dropdown-header\">
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-check\"></i>
\t\t\t\t\t\t\t\t\t4 Tasks to complete
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"dropdown-content\">
\t\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-navbar\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Software Update</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right\">65%</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress progress-mini\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"width:65%\" class=\"progress-bar\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Hardware Upgrade</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right\">35%</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress progress-mini\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"width:35%\" class=\"progress-bar progress-bar-danger\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Unit Testing</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right\">15%</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress progress-mini\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"width:15%\" class=\"progress-bar progress-bar-warning\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">Bug Fixes</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right\">90%</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress progress-mini progress-striped active\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"width:90%\" class=\"progress-bar progress-bar-success\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"dropdown-footer\">
\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\tSee tasks with details
\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-arrow-right\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"purple dropdown-modal\">
\t\t\t\t\t\t\t<a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-bell icon-animated-bell\"></i>
\t\t\t\t\t\t\t\t<span class=\"badge badge-important\">8</span>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<ul class=\"dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close\">
\t\t\t\t\t\t\t\t<li class=\"dropdown-header\">
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-exclamation-triangle\"></i>
\t\t\t\t\t\t\t\t\t8 Notifications
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"dropdown-content\">
\t\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-navbar navbar-pink\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"btn btn-xs no-hover btn-pink fa fa-comment\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tNew Comments
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right badge badge-info\">+12</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"btn btn-xs btn-primary fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\t\t\tBob just signed up as an editor ...
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"btn btn-xs no-hover btn-success fa fa-shopping-cart\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tNew Orders
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right badge badge-success\">+8</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"btn btn-xs no-hover btn-info fa fa-twitter\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tFollowers
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"pull-right badge badge-info\">+11</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"dropdown-footer\">
\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\tSee all notifications
\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-arrow-right\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"green dropdown-modal\">
\t\t\t\t\t\t\t<a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-envelope icon-animated-vertical\"></i>
\t\t\t\t\t\t\t\t<span class=\"badge badge-success\">5</span>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<ul class=\"dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close\">
\t\t\t\t\t\t\t\t<li class=\"dropdown-header\">
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-envelope-o\"></i>
\t\t\t\t\t\t\t\t\t5 Messages
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"dropdown-content\">
\t\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-navbar\">
\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"../assets/avatars/avatar.png\" class=\"msg-photo\" alt=\"Alex's Avatar\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-body\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"blue\">Alex:</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tCiao sociis natoque penatibus et auctor ...
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-time\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-clock-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>a moment ago</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"../assets/avatars/avatar3.png\" class=\"msg-photo\" alt=\"Susan's Avatar\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-body\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"blue\">Susan:</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tVestibulum id ligula porta felis euismod ...
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-time\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-clock-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>20 minutes ago</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"../assets/avatars/avatar4.png\" class=\"msg-photo\" alt=\"Bob's Avatar\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-body\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"blue\">Bob:</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tNullam quis risus eget urna mollis ornare ...
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-time\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-clock-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>3:15 pm</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"../assets/avatars/avatar2.png\" class=\"msg-photo\" alt=\"Kate's Avatar\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-body\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"blue\">Kate:</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tCiao sociis natoque eget urna mollis ornare ...
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-time\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-clock-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>1:33 pm</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"../assets/avatars/avatar5.png\" class=\"msg-photo\" alt=\"Fred's Avatar\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-body\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"blue\">Fred:</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tVestibulum id penatibus et auctor  ...
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"msg-time\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-clock-o\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>10:09 am</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"dropdown-footer\">
\t\t\t\t\t\t\t\t\t<a href=\"inbox.html\">
\t\t\t\t\t\t\t\t\t\tSee all messages
\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-arrow-right\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<!-- #section:basics/navbar.user_menu -->
\t\t\t\t\t\t<li class=\"light-blue dropdown-modal\">
\t\t\t\t\t\t\t<a data-toggle=\"dropdown\" href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t\t<img class=\"nav-user-photo\" src=\"../assets/avatars/user.jpg\" alt=\"Jason's Photo\" />
\t\t\t\t\t\t\t\t<span class=\"user-info\">
\t\t\t\t\t\t\t\t\t<small>Welcome,</small>
\t\t\t\t\t\t\t\t\tJason
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-caret-down\"></i>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<ul class=\"user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-cog\"></i>
\t\t\t\t\t\t\t\t\t\tSettings
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"profile.html\">
\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\tProfile
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"divider\"></li>

\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-power-off\"></i>
\t\t\t\t\t\t\t\t\t\tLogout
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<!-- /section:basics/navbar.user_menu -->
\t\t\t\t\t</ul>
\t\t\t\t</div>

\t\t\t\t<!-- /section:basics/navbar.dropdown -->
\t\t\t</div><!-- /.navbar-container -->
\t\t</div>

\t\t<!-- /section:basics/navbar.layout -->
\t\t<div class=\"main-container ace-save-state\" id=\"main-container\">
\t\t\t<script type=\"text/javascript\">
\t\t\t\ttry{ace.settings.loadState('main-container')}catch(e){}
\t\t\t</script>

\t\t\t<!-- #section:basics/sidebar -->
\t\t\t<div id=\"sidebar\" class=\"sidebar                  responsive                    ace-save-state\">
\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\ttry{ace.settings.loadState('sidebar')}catch(e){}
\t\t\t\t</script>

\t\t\t\t<div class=\"sidebar-shortcuts\" id=\"sidebar-shortcuts\">
\t\t\t\t\t<div class=\"sidebar-shortcuts-large\" id=\"sidebar-shortcuts-large\">
\t\t\t\t\t\t<button class=\"btn btn-success\">
\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-signal\"></i>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<button class=\"btn btn-info\">
\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-pencil\"></i>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<!-- #section:basics/sidebar.layout.shortcuts -->
\t\t\t\t\t\t<button class=\"btn btn-warning\">
\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-users\"></i>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<button class=\"btn btn-danger\">
\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-cogs\"></i>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<!-- /section:basics/sidebar.layout.shortcuts -->
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"sidebar-shortcuts-mini\" id=\"sidebar-shortcuts-mini\">
\t\t\t\t\t\t<span class=\"btn btn-success\"></span>

\t\t\t\t\t\t<span class=\"btn btn-info\"></span>

\t\t\t\t\t\t<span class=\"btn btn-warning\"></span>

\t\t\t\t\t\t<span class=\"btn btn-danger\"></span>
\t\t\t\t\t</div>
\t\t\t\t</div><!-- /.sidebar-shortcuts -->

\t\t\t\t<ul class=\"nav nav-list\">
\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"index.html\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-tachometer\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\"> Dashboard </span>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-desktop\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\">
\t\t\t\t\t\t\t\tUI &amp; Elements
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>

\t\t\t\t\t\t\t\t\tLayouts
\t\t\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"top-menu.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\t\t\tTop Menu
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"two-menu-1.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\t\t\tTwo Menus 1
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"two-menu-2.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\t\t\tTwo Menus 2
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"mobile-menu-1.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\t\t\tDefault Mobile Menu
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"mobile-menu-2.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\t\t\tMobile Menu 2
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"mobile-menu-3.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\t\t\tMobile Menu 3
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"typography.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tTypography
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"elements.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tElements
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"buttons.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tButtons &amp; Icons
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"content-slider.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tContent Sliders
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"treeview.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tTreeview
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"jquery-ui.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tjQuery UI
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"nestable-list.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tNestable Lists
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>

\t\t\t\t\t\t\t\t\tThree Level Menu
\t\t\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-leaf green\"></i>
\t\t\t\t\t\t\t\t\t\t\tItem #1
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-pencil orange\"></i>

\t\t\t\t\t\t\t\t\t\t\t4th level
\t\t\t\t\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-plus purple\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\tAdd Product
\t\t\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-eye pink\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\tView Products
\t\t\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-list\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\"> Tables </span>

\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"tables.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tSimple &amp; Dynamic
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"jqgrid.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tjqGrid plugin
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-pencil-square-o\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\"> Forms </span>

\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"form-elements.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tForm Elements
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"form-elements-2.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tForm Elements 2
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"form-wizard.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tWizard &amp; Validation
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"wysiwyg.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tWysiwyg &amp; Markdown
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"dropzone.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tDropzone File Upload
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"widgets.html\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-list-alt\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\"> Widgets </span>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"calendar.html\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-calendar\"></i>

\t\t\t\t\t\t\t<span class=\"menu-text\">
\t\t\t\t\t\t\t\tCalendar

\t\t\t\t\t\t\t\t<!-- #section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t\t<span class=\"badge badge-transparent tooltip-error\" title=\"2 Important Events\">
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-exclamation-triangle red bigger-130\"></i>
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<!-- /section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"gallery.html\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-picture-o\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\"> Gallery </span>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-tag\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\"> More Pages </span>

\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"profile.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tUser Profile
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"inbox.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tInbox
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"pricing.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tPricing Tables
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"invoice.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tInvoice
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"timeline.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tTimeline
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"search.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tSearch Results
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"email.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tEmail Templates
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"login.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tLogin &amp; Register
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>

\t\t\t\t\t<li class=\"active open\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-file-o\"></i>

\t\t\t\t\t\t\t<span class=\"menu-text\">
\t\t\t\t\t\t\t\tOther Pages

\t\t\t\t\t\t\t\t<!-- #section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t\t<span class=\"badge badge-primary\">5</span>

\t\t\t\t\t\t\t\t<!-- /section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t</a>

\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"faq.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tFAQ
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"error-404.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tError 404
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"error-500.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tError 500
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t<a href=\"grid.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tGrid
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li class=\"active\">
\t\t\t\t\t\t\t\t<a href=\"blank.html\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\t\tBlank Page
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t</ul><!-- /.nav-list -->

\t\t\t\t<!-- #section:basics/sidebar.layout.minimize -->
\t\t\t\t<div class=\"sidebar-toggle sidebar-collapse\" id=\"sidebar-collapse\">
\t\t\t\t\t<i id=\"sidebar-toggle-icon\" class=\"ace-icon fa fa-angle-double-left ace-save-state\" data-icon1=\"ace-icon fa fa-angle-double-left\" data-icon2=\"ace-icon fa fa-angle-double-right\"></i>
\t\t\t\t</div>

\t\t\t\t<!-- /section:basics/sidebar.layout.minimize -->
\t\t\t</div>

\t\t\t<!-- /section:basics/sidebar -->
\t\t\t<div class=\"main-content\">
\t\t\t\t<div class=\"main-content-inner\">
\t\t\t\t\t<!-- #section:basics/content.breadcrumbs -->
\t\t\t\t\t<div class=\"breadcrumbs ace-save-state\" id=\"breadcrumbs\">
\t\t\t\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-home home-icon\"></i>
\t\t\t\t\t\t\t\t<a href=\"#\">Home</a>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\">Other Pages</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"active\">Blank Page</li>
\t\t\t\t\t\t</ul><!-- /.breadcrumb -->

\t\t\t\t\t\t<!-- #section:basics/content.searchbox -->
\t\t\t\t\t\t<div class=\"nav-search\" id=\"nav-search\">
\t\t\t\t\t\t\t<form class=\"form-search\">
\t\t\t\t\t\t\t\t<span class=\"input-icon\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"Search ...\" class=\"nav-search-input\" id=\"nav-search-input\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-search nav-search-icon\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div><!-- /.nav-search -->

\t\t\t\t\t\t<!-- /section:basics/content.searchbox -->
\t\t\t\t\t</div>

\t\t\t\t\t<!-- /section:basics/content.breadcrumbs -->
\t\t\t\t\t<div class=\"page-content\">
\t\t\t\t\t\t<!-- #section:settings.box -->
\t\t\t\t\t\t<div class=\"ace-settings-container\" id=\"ace-settings-container\">
\t\t\t\t\t\t\t<div class=\"btn btn-app btn-xs btn-warning ace-settings-btn\" id=\"ace-settings-btn\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-cog bigger-130\"></i>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"ace-settings-box clearfix\" id=\"ace-settings-box\">
\t\t\t\t\t\t\t\t<div class=\"pull-left width-50\">
\t\t\t\t\t\t\t\t\t<!-- #section:settings.skins -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t\t\t\t\t\t<select id=\"skin-colorpicker\" class=\"hide\">
\t\t\t\t\t\t\t\t\t\t\t\t<option data-skin=\"no-skin\" value=\"#438EB9\">#438EB9</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option data-skin=\"skin-1\" value=\"#222A2D\">#222A2D</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option data-skin=\"skin-2\" value=\"#C6487E\">#C6487E</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option data-skin=\"skin-3\" value=\"#D0D0D0\">#D0D0D0</option>
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<span>&nbsp; Choose Skin</span>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:settings.skins -->

\t\t\t\t\t\t\t\t\t<!-- #section:settings.navbar -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2 ace-save-state\" id=\"ace-settings-navbar\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-navbar\"> Fixed Navbar</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:settings.navbar -->

\t\t\t\t\t\t\t\t\t<!-- #section:settings.sidebar -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2 ace-save-state\" id=\"ace-settings-sidebar\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-sidebar\"> Fixed Sidebar</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:settings.sidebar -->

\t\t\t\t\t\t\t\t\t<!-- #section:settings.breadcrumbs -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2 ace-save-state\" id=\"ace-settings-breadcrumbs\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-breadcrumbs\"> Fixed Breadcrumbs</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:settings.breadcrumbs -->

\t\t\t\t\t\t\t\t\t<!-- #section:settings.rtl -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2\" id=\"ace-settings-rtl\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-rtl\"> Right To Left (rtl)</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:settings.rtl -->

\t\t\t\t\t\t\t\t\t<!-- #section:settings.container -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2 ace-save-state\" id=\"ace-settings-add-container\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-add-container\">
\t\t\t\t\t\t\t\t\t\t\tInside
\t\t\t\t\t\t\t\t\t\t\t<b>.container</b>
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:settings.container -->
\t\t\t\t\t\t\t\t</div><!-- /.pull-left -->

\t\t\t\t\t\t\t\t<div class=\"pull-left width-50\">
\t\t\t\t\t\t\t\t\t<!-- #section:basics/sidebar.options -->
\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2\" id=\"ace-settings-hover\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-hover\"> Submenu on Hover</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2\" id=\"ace-settings-compact\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-compact\"> Compact Sidebar</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"ace-settings-item\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"ace ace-checkbox-2\" id=\"ace-settings-highlight\" autocomplete=\"off\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"lbl\" for=\"ace-settings-highlight\"> Alt. Active Item</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- /section:basics/sidebar.options -->
\t\t\t\t\t\t\t\t</div><!-- /.pull-left -->
\t\t\t\t\t\t\t</div><!-- /.ace-settings-box -->
\t\t\t\t\t\t</div><!-- /.ace-settings-container -->

\t\t\t\t\t\t<!-- /section:settings.box -->
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t\t<!-- PAGE CONTENT BEGINS -->

\t\t\t\t\t\t\t\t<!-- PAGE CONTENT ENDS -->
\t\t\t\t\t\t\t</div><!-- /.col -->
\t\t\t\t\t\t</div><!-- /.row -->
\t\t\t\t\t</div><!-- /.page-content -->
\t\t\t\t</div>
\t\t\t</div><!-- /.main-content -->

\t\t\t<div class=\"footer\">
\t\t\t\t<div class=\"footer-inner\">
\t\t\t\t\t<!-- #section:basics/footer -->
\t\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t\t<span class=\"bigger-120\">
\t\t\t\t\t\t\t<span class=\"blue bolder\">Ace</span>
\t\t\t\t\t\t\tApplication &copy; 2013-2014
\t\t\t\t\t\t</span>

\t\t\t\t\t\t&nbsp; &nbsp;
\t\t\t\t\t\t<span class=\"action-buttons\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-twitter-square light-blue bigger-150\"></i>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-facebook-square text-primary bigger-150\"></i>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-rss-square orange bigger-150\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>

\t\t\t\t\t<!-- /section:basics/footer -->
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<a href=\"#\" id=\"btn-scroll-up\" class=\"btn-scroll-up btn btn-sm btn-inverse\">
\t\t\t\t<i class=\"ace-icon fa fa-angle-double-up icon-only bigger-110\"></i>
\t\t\t</a>
\t\t</div><!-- /.main-container -->

\t\t<!-- basic scripts -->

\t\t<!--[if !IE]> -->
\t\t<script src=\"../components/jquery/dist/jquery.js\"></script>

\t\t<!-- <![endif]-->

\t\t<!--[if IE]>
<script src=\"../components/jquery.1x/dist/jquery.js\"></script>
<![endif]-->
\t\t<script type=\"text/javascript\">
\t\t\tif('ontouchstart' in document.documentElement) document.write(\"<script src='../components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>\"+\"<\"+\"/script>\");
\t\t</script>
\t\t<script src=\"../components/bootstrap/dist/js/bootstrap.js\"></script>

\t\t<!-- page specific plugin scripts -->

\t\t<!-- ace scripts -->
\t\t<script src=\"../assets/js/src/elements.scroller.js\"></script>
\t\t<script src=\"../assets/js/src/elements.colorpicker.js\"></script>
\t\t<script src=\"../assets/js/src/elements.fileinput.js\"></script>
\t\t<script src=\"../assets/js/src/elements.typeahead.js\"></script>
\t\t<script src=\"../assets/js/src/elements.wysiwyg.js\"></script>
\t\t<script src=\"../assets/js/src/elements.spinner.js\"></script>
\t\t<script src=\"../assets/js/src/elements.treeview.js\"></script>
\t\t<script src=\"../assets/js/src/elements.wizard.js\"></script>
\t\t<script src=\"../assets/js/src/elements.aside.js\"></script>
\t\t<script src=\"../assets/js/src/ace.js\"></script>
\t\t<script src=\"../assets/js/src/ace.basics.js\"></script>
\t\t<script src=\"../assets/js/src/ace.scrolltop.js\"></script>
\t\t<script src=\"../assets/js/src/ace.ajax-content.js\"></script>
\t\t<script src=\"../assets/js/src/ace.touch-drag.js\"></script>
\t\t<script src=\"../assets/js/src/ace.sidebar.js\"></script>
\t\t<script src=\"../assets/js/src/ace.sidebar-scroll-1.js\"></script>
\t\t<script src=\"../assets/js/src/ace.submenu-hover.js\"></script>
\t\t<script src=\"../assets/js/src/ace.widget-box.js\"></script>
\t\t<script src=\"../assets/js/src/ace.settings.js\"></script>
\t\t<script src=\"../assets/js/src/ace.settings-rtl.js\"></script>
\t\t<script src=\"../assets/js/src/ace.settings-skin.js\"></script>
\t\t<script src=\"../assets/js/src/ace.widget-on-reload.js\"></script>
\t\t<script src=\"../assets/js/src/ace.searchbox-autocomplete.js\"></script>

\t\t<!-- inline scripts related to this page -->

\t\t<!-- the following scripts are used in demo only for onpage help and you don't need them -->
\t\t<link rel=\"stylesheet\" href=\"../assets/css/ace.onpage-help.css\" />
\t\t<link rel=\"stylesheet\" href=\"../docs/assets/js/themes/sunburst.css\" />

\t\t<script type=\"text/javascript\"> ace.vars['base'] = '..'; </script>
\t\t<script src=\"../assets/js/src/elements.onpage-help.js\"></script>
\t\t<script src=\"../assets/js/src/ace.onpage-help.js\"></script>
\t\t<script src=\"../docs/assets/js/rainbow.js\"></script>
\t\t<script src=\"../docs/assets/js/language/generic.js\"></script>
\t\t<script src=\"../docs/assets/js/language/html.js\"></script>
\t\t<script src=\"../docs/assets/js/language/css.js\"></script>
\t\t<script src=\"../docs/assets/js/language/javascript.js\"></script>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "blank.html";
    }

}
