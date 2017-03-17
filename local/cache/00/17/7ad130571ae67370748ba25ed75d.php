<?php

/* radiogram.phtml */
class __TwigTemplate_00177ad130571ae67370748ba25ed75d extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!--
TODO:
Variable:
@Radiogram (JSON_OBJECT)
\t@IsClosable:boolean
\t@IsiPesan:text
-->
<div class=\"col-xs-12\">
\t<div class=\"alert alert-block alert-success\">
\t\t";
        // line 10
        if ($this->getAttribute((isset($context["Radiogram"]) ? $context["Radiogram"] : null), "IsClosable")) {
            // line 11
            echo "\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">
\t\t\t<i class=\"ace-icon fa fa-times \"></i>
\t\t</button>
\t\t";
        }
        // line 15
        echo "\t\t<!--#CLOSABLE -->
\t\t<div class=\"h4\"><i class=\"ace-icon fa fa-bullhorn green fa-2x\"></i> Pengumuman</div>
\t\t<div>
\t\t\t<p>
\t\t\t\t";
        // line 19
        if (($this->getAttribute((isset($context["Radiogram"]) ? $context["Radiogram"] : null), "IsiPesan") == "")) {
            // line 20
            echo "\t\t\t\t";
            $this->env->loadTemplate("lipsum.txt")->display($context);
            // line 21
            echo "\t\t\t\t";
        } else {
            // line 22
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["Radiogram"]) ? $context["Radiogram"] : null), "IsiPesan");
            echo "
\t\t\t\t";
        }
        // line 24
        echo "\t\t\t</p>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "radiogram.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
