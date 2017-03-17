<?php

/* utama.phtml */
class __TwigTemplate_a4da145515fe5e6d56dbdbb15074bf6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'navHeader' => array($this, 'block_navHeader'),
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
        echo "
    <!--
    TODO:
    Baris ini mesti hilang -->
    ";
        // line 7
        $context["Sambutan"] = array("NamaPenyambut" => "Drs. Ciprut", "JabatanPenyambut" => "Walikota Dampit", "IsiSambutan" => "", "FileFoto" => "");
        // line 13
        echo "    ";
        $context["Syarat"] = array(0 => array("Tingkat" => "SD", "TeksSyarat" => "Ini Syarat SD"), 1 => array("Tingkat" => "SMP", "TeksSyarat" => "Ini Syarat SMP"), 2 => array("Tingkat" => "SMA", "TeksSyarat" => "Ini Syarat SMA"), 3 => array("Tingkat" => "SMK", "TeksSyarat" => "Ini Syarat SMK"));
        // line 19
        echo "    ";
        $context["widgets"] = array(0 => array("Judul" => "Video", "IsiWidget" => "<iframe src=\"https://www.youtube.com/embed/ZKxxmxU8GNo\" frameborder=\"0\" allowfullscreen></iframe>"), 1 => array("Judul" => "Video 2", "IsiWidget" => "<iframe src=\"https://www.youtube.com/embed/72MeeEMDXps\" frameborder=\"0\" allowfullscreen></iframe>"));
        // line 23
        echo "    <!-- #DATA STATIC -->


    ";
        // line 26
        $this->env->loadTemplate("header.phtml")->display(array_merge($context, array("Judul" => "Selamat Datang", "SubJudul" => "Halaman Informasi PPDB [TAHUN]")));
        // line 27
        echo "    <div class=\"row\">
        <div class=\"col-md-8\">
            <!-- IF Radiogram object is available -->
            ";
        // line 30
        $this->env->loadTemplate("radiogram.phtml")->display(array_merge($context, array("Radiogram" => array("IsClosable" => false, "IsiPesan" => ""))));
        // line 31
        echo "            <!-- # RADIOGRAM -->
            <!-- Panel Kiri-->
            ";
        // line 33
        $this->env->loadTemplate("panelkiri.phtml")->display(array_merge($context, array("DataTab" => array("Sambutan" => (isset($context["Sambutan"]) ? $context["Sambutan"] : null), "Syarat" => (isset($context["Syarat"]) ? $context["Syarat"] : null)))));
        // line 37
        echo "            <!-- # PANEL KIRI -->
        </div><!-- /.col kiri -->
        <div class=\"col-md-4\">
            <div class=\" visible widget-box \" style=\"border: 1px solid #CCC; padding: 0px\">
                <div class=\"widget-header\">Login</div>
                <div class=\"widget-body\">
                    <div class=\"widget-main text-center\">

                        <h4 class=\"header blue lighter bigger\">
                            <i class=\"ace-icon fa fa-user green\"></i>
                            Login Calon Peserta Didik
                        </h4>

                        <div class=\"space-6\"></div>
                        <p> Gunakan <strong>Nomor Pendaftaran dan password</strong> yang anda dapatkan dari Panitia atau dari aplikasi Schoolmedia sekolah
                            Anda:
                        </p>

                        <form action=\"javascript:void(0)\" id=\"frmLogin\">
                            <fieldset>
                                <div class=\"form-group\">
                                    <label class=\"block clearfix\">
                                                        <span
                                                                class=\"block input-icon input-icon-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"No Pendaftaran\" autocomplete=\"off\" id=\"nodaf\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
                                    </label>
                                </div>
                                <div class=\"form-group\">
                                    <label class=\"block clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"block input-icon input-icon-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"passw\" type=\"password\" class=\"form-control password\" data-login=\"2\" placeholder=\"Password\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"ace-icon fa fa-lock\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
                                    </label>
                                </div>
                                <div class=\"space\"></div>

                                <div class=\"clearfix\">
                                    <button type=\"submit\" id=\"btnLogin\" class=\"width-35 pull-right btn btn-sm btn-primary\">
                                        <i class=\"ace-icon fa fa-key\"></i>
                                        <span class=\"bigger-110\">Login</span>
                                    </button>
                                </div>

                                <div class=\"space-4\"></div>
                            </fieldset>
                        </form>

                        <!-- /.widget-main -->
                    </div>
                </div>
            </div>

            ";
        // line 92
        if (((isset($context["widgets"]) ? $context["widgets"] : null) != null)) {
            // line 93
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["widgets"]) ? $context["widgets"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["kotak"]) {
                // line 94
                echo "                    <div class=\" visible widget-box \" style=\"border: 1px solid #CCC; padding: 0px\">
                        <div class=\"widget-header\">";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kotak"]) ? $context["kotak"] : null), "Judul"), "html", null, true);
                echo "</div>
                        <div class=\"widget-body\">
                            <div class=\"widget-main text-center\">
                                ";
                // line 98
                echo $this->getAttribute((isset($context["kotak"]) ? $context["kotak"] : null), "IsiWidget");
                echo "
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['kotak'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 103
            echo "            ";
        }
        // line 104
        echo "        </div><!-- /.col kanan -->
    </div><!-- /.row -->
";
    }

    // line 107
    public function block_navHeader($context, array $blocks = array())
    {
        // line 108
        echo "    <div class=\"navbar-buttons navbar-header pull-right \" role=\"navigation\">
        <ul class=\"nav ace-nav\">
            <li>
                <a class=\"btn btn-sm btn-success btn-circle\" href=\"/adminLogin\">
                    <i class=\"ace-icon fa fa-lock fa-2x\"></i>
                </a>

            </li>

        </ul>
    </div>
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
