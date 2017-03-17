<?php

/* panelkiri.phtml */
class __TwigTemplate_c53f6a4d346ca2607512c8bf29cb4b53 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!--
TODO:
VARIABLES:
@DataTab (JSONObj):
\t@Sambutan(JSONObj):
\t\t@NamaPenyambut(Text)
\t\t@JabatanPenyambut(Text)
\t\t@IsiSambutan(Text)
\t\t@FileFoto(Text)
\t@Syarat (JSONObj)
\t    @Tingkat(Text)
\t    @TeksSyarat(Text)

-->
";
        // line 15
        $context["Sambutan"] = $this->getAttribute((isset($context["DataTab"]) ? $context["DataTab"] : null), "Sambutan");
        // line 16
        $context["Syarat"] = $this->getAttribute((isset($context["DataTab"]) ? $context["DataTab"] : null), "Syarat");
        // line 17
        echo "<div class=\"col-xs-12 profile-picture\">
    <!-- #section:elements.tab -->
    <div class=\"tabbable\">
        <ul class=\"nav nav-tabs padding-18 tab-size-bigger\" id=\"myTab\">
            <li class=\"active\">
                <a data-toggle=\"tab\" href=\"#sambutan\" aria-expanded=\"true\">
                    <i class=\"green ace-icon fa fa-user bigger-120\"></i>
                    Sambutan
                </a>
            </li>
            ";
        // line 27
        if (((isset($context["Syarat"]) ? $context["Syarat"] : null) != null)) {
            // line 28
            echo "                <li class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">
                        <i class=\"blue ace-icon fa fa-list-alt bigger-120 width-auto\"></i>
                        Syarat &nbsp;
                        <i class=\"ace-icon fa fa-caret-down bigger-120 width-auto\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-info\">
                        ";
            // line 35
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Syarat"]) ? $context["Syarat"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["tingkat"]) {
                // line 36
                echo "                            <li><a data-toggle=\"tab\" href=\"#syarat";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tingkat"]) ? $context["tingkat"] : null), "Tingkat"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tingkat"]) ? $context["tingkat"] : null), "Tingkat"), "html", null, true);
                echo "</a></li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tingkat'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 38
            echo "                    </ul>
                </li>
            ";
        }
        // line 41
        echo "            <li >
                <a data-toggle=\"tab\" href=\"#jadwal\" aria-expanded=\"false\">
                    <i class=\"text-warning ace-icon fa fa-calendar bigger-120\"></i>
                    Jadwal
                </a>
            </li>
            <li >
                <a data-toggle=\"tab\" href=\"#links\" aria-expanded=\"false\">
                    <i class=\"text-primary ace-icon fa fa-globe bigger-120\"></i>
                    Link
                </a>
            </li>

        </ul>
        <div class=\"tab-content\">
            <div id=\"sambutan\" class=\"tab-pane fade active in\">
                <p class=\"text-center\">
                    <!-- ambil dari Sambutan.FileFoto-->
                    <img src=\"https://stock.schoolmedia.id/general/logo/tutwuri.jpg\" width=\"100px\"/><br/>
                    <strong>";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Sambutan"]) ? $context["Sambutan"] : null), "NamaPenyambut"), "html", null, true);
        echo "</strong>
                </p>
                <div class=\"h4 text-center blue\">Sambutan ";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Sambutan"]) ? $context["Sambutan"] : null), "JabatanPenyambut"), "html", null, true);
        echo "</div>
                ";
        // line 63
        if (($this->getAttribute((isset($context["Sambutan"]) ? $context["Sambutan"] : null), "IsiSambutan") == "")) {
            // line 64
            echo "                    <p>";
            $this->env->loadTemplate("lipsum.txt ")->display($context);
            echo "</p>
                    <p>";
            // line 65
            $this->env->loadTemplate("lipsum.txt ")->display($context);
            echo "</p>
                    <p>";
            // line 66
            $this->env->loadTemplate("lipsum.txt ")->display($context);
            echo "</p>
                ";
        } else {
            // line 68
            echo "                    <p>";
            echo $this->getAttribute((isset($context["Sambutan"]) ? $context["Sambutan"] : null), "IsiSambutan");
            echo "</p>
                ";
        }
        // line 70
        echo "            </div>
            ";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["Syarat"]) ? $context["Syarat"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tingkat"]) {
            // line 72
            echo "            <div id=\"syarat";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tingkat"]) ? $context["tingkat"] : null), "Tingkat"), "html", null, true);
            echo "\" class=\"tab-pane fade in\">
                <div class=\"h4\">";
            // line 73
            echo $this->getAttribute((isset($context["tingkat"]) ? $context["tingkat"] : null), "TeksSyarat");
            echo "</div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tingkat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 76
        echo "            <div id=\"jadwal\" class=\"tab-pane fade in\">
                <div class=\"h4\">Jadwal PPDB</div>
            </div>
            <div id=\"links\" class=\"tab-pane fade in\">
                <div class=\"h4\">Link Website Sekolah Peserta PPDB</div>
            </div>
        </div>
    </div>

    <!-- /section:elements.tab -->
</div>
";
    }

    public function getTemplateName()
    {
        return "panelkiri.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
