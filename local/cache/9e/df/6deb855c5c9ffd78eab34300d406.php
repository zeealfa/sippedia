<?php

/* sidebar.phtml */
class __TwigTemplate_9edf6deb855c5c9ffd78eab34300d406 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"sidebar\" class=\"sidebar responsive ace-save-state\">
\t<script type=\"text/javascript\">
\t\ttry{ace.settings.loadState('sidebar')}catch(e){}
\t</script>

\t<div class=\"sidebar-shortcuts\" id=\"sidebar-shortcuts\">
\t\t<div class=\"sidebar-shortcuts-large\" id=\"sidebar-shortcuts-large\">
\t\t\t<button class=\"btn btn-success\">
\t\t\t\t<i class=\"ace-icon fa fa-signal\"></i>
\t\t\t</button>

\t\t\t<button class=\"btn btn-info\">
\t\t\t\t<i class=\"ace-icon fa fa-pencil\"></i>
\t\t\t</button>

\t\t\t<!-- #section:basics/sidebar.layout.shortcuts -->
\t\t\t<button class=\"btn btn-warning\">
\t\t\t\t<i class=\"ace-icon fa fa-users\"></i>
\t\t\t</button>

\t\t\t<button class=\"btn btn-danger\">
\t\t\t\t<i class=\"ace-icon fa fa-cogs\"></i>
\t\t\t</button>

\t\t\t<!-- /section:basics/sidebar.layout.shortcuts -->
\t\t</div>

\t\t<div class=\"sidebar-shortcuts-mini\" id=\"sidebar-shortcuts-mini\">
\t\t\t<span class=\"btn btn-success\"></span>

\t\t\t<span class=\"btn btn-info\"></span>

\t\t\t<span class=\"btn btn-warning\"></span>

\t\t\t<span class=\"btn btn-danger\"></span>
\t\t</div>
\t</div><!-- /.sidebar-shortcuts -->

\t<ul class=\"nav nav-list\">
\t\t<li class=\"\">
\t\t\t<a href=\"index.html\">
\t\t\t\t<i class=\"menu-icon fa fa-tachometer\"></i>
\t\t\t\t<span class=\"menu-text\"> Dashboard </span>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t<i class=\"menu-icon fa fa-desktop\"></i>
\t\t\t\t\t\t\t<span class=\"menu-text\">
\t\t\t\t\t\t\t\tUI &amp; Elements
\t\t\t\t\t\t\t</span>

\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>

\t\t\t<ul class=\"submenu\">
\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>

\t\t\t\t\t\tLayouts
\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"top-menu.html\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\tTop Menu
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"two-menu-1.html\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\tTwo Menus 1
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"two-menu-2.html\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\tTwo Menus 2
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"mobile-menu-1.html\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\tDefault Mobile Menu
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"mobile-menu-2.html\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\tMobile Menu 2
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"mobile-menu-3.html\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\t\t\tMobile Menu 3
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"typography.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tTypography
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"elements.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tElements
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"buttons.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tButtons &amp; Icons
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"content-slider.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tContent Sliders
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"treeview.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tTreeview
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"jquery-ui.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tjQuery UI
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"nestable-list.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tNestable Lists
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>

\t\t\t\t\t\tThree Level Menu
\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-leaf green\"></i>
\t\t\t\t\t\t\t\tItem #1
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-pencil orange\"></i>

\t\t\t\t\t\t\t\t4th level
\t\t\t\t\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t<b class=\"arrow\"></b>

\t\t\t\t\t\t\t<ul class=\"submenu\">
\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-plus purple\"></i>
\t\t\t\t\t\t\t\t\t\tAdd Product
\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t<li class=\"\">
\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t<i class=\"menu-icon fa fa-eye pink\"></i>
\t\t\t\t\t\t\t\t\t\tView Products
\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t<i class=\"menu-icon fa fa-list\"></i>
\t\t\t\t<span class=\"menu-text\"> Tables </span>

\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>

\t\t\t<ul class=\"submenu\">
\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"tables.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tSimple &amp; Dynamic
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"jqgrid.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tjqGrid plugin
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t<i class=\"menu-icon fa fa-pencil-square-o\"></i>
\t\t\t\t<span class=\"menu-text\"> Forms </span>

\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>

\t\t\t<ul class=\"submenu\">
\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"form-elements.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tForm Elements
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"form-elements-2.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tForm Elements 2
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"form-wizard.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tWizard &amp; Validation
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"wysiwyg.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tWysiwyg &amp; Markdown
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"dropzone.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tDropzone File Upload
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"widgets.html\">
\t\t\t\t<i class=\"menu-icon fa fa-list-alt\"></i>
\t\t\t\t<span class=\"menu-text\"> Widgets </span>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"calendar.html\">
\t\t\t\t<i class=\"menu-icon fa fa-calendar\"></i>

\t\t\t\t\t\t\t<span class=\"menu-text\">
\t\t\t\t\t\t\t\tCalendar

\t\t\t\t\t\t\t\t<!-- #section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t\t<span class=\"badge badge-transparent tooltip-error\" title=\"2 Important Events\">
\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-exclamation-triangle red bigger-130\"></i>
\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<!-- /section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t</span>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"gallery.html\">
\t\t\t\t<i class=\"menu-icon fa fa-picture-o\"></i>
\t\t\t\t<span class=\"menu-text\"> Gallery </span>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>
\t\t</li>

\t\t<li class=\"\">
\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t<i class=\"menu-icon fa fa-tag\"></i>
\t\t\t\t<span class=\"menu-text\"> More Pages </span>

\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>

\t\t\t<ul class=\"submenu\">
\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"profile.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tUser Profile
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"inbox.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tInbox
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"pricing.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tPricing Tables
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"invoice.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tInvoice
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"timeline.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tTimeline
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"search.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tSearch Results
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"email.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tEmail Templates
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"login.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tLogin &amp; Register
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>

\t\t<li class=\"active open\">
\t\t\t<a href=\"#\" class=\"dropdown-toggle\">
\t\t\t\t<i class=\"menu-icon fa fa-file-o\"></i>

\t\t\t\t\t\t\t<span class=\"menu-text\">
\t\t\t\t\t\t\t\tOther Pages

\t\t\t\t\t\t\t\t<!-- #section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t\t<span class=\"badge badge-primary\">5</span>

\t\t\t\t\t\t\t\t<!-- /section:basics/sidebar.layout.badge -->
\t\t\t\t\t\t\t</span>

\t\t\t\t<b class=\"arrow fa fa-angle-down\"></b>
\t\t\t</a>

\t\t\t<b class=\"arrow\"></b>

\t\t\t<ul class=\"submenu\">
\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"faq.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tFAQ
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"error-404.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tError 404
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"error-500.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tError 500
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"\">
\t\t\t\t\t<a href=\"grid.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tGrid
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>

\t\t\t\t<li class=\"active\">
\t\t\t\t\t<a href=\"blank.html\">
\t\t\t\t\t\t<i class=\"menu-icon fa fa-caret-right\"></i>
\t\t\t\t\t\tBlank Page
\t\t\t\t\t</a>

\t\t\t\t\t<b class=\"arrow\"></b>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>
\t</ul><!-- /.nav-list -->

\t<!-- #section:basics/sidebar.layout.minimize -->
\t<div class=\"sidebar-toggle sidebar-collapse\" id=\"sidebar-collapse\">
\t\t<i id=\"sidebar-toggle-icon\" class=\"ace-icon fa fa-angle-double-left ace-save-state\" data-icon1=\"ace-icon fa fa-angle-double-left\" data-icon2=\"ace-icon fa fa-angle-double-right\"></i>
\t</div>

\t<!-- /section:basics/sidebar.layout.minimize -->
</div>
";
    }

    public function getTemplateName()
    {
        return "sidebar.phtml";
    }

}
