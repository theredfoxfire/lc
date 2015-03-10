<?php

/* LcLcBundle:Default:index.html.twig */
class __TwigTemplate_1f88cf50eba2013b78fa4d91ebe8f5389af48eb132775cd4068e1fa180ae17a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Lucidcouple - Temukan takdirmu disini!</title>

    <!-- Bootstrap Core CSS -->
    ";
        // line 15
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 26
        echo "\t<script>
\t\t\$(function() {
\t\t\$( \"#birthday\" ).datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tyearRange: \"-65:-15\",
\t\t\tdateFormat:'yy-mm-dd'
\t\t});
\t});
\t</script>
    <!--<link href=\"http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"http://fonts.googleapis.com/css?family=Montserrat:400,700\" rel=\"stylesheet\" type=\"text/css\">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body id=\"page-top\" data-spy=\"scroll\" data-target=\".navbar-fixed-top\">

    <!-- Navigation -->
    <nav class=\"navbar navbar-custom navbar-fixed-top\" role=\"navigation\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-main-collapse\">
                    <i class=\"fa fa-bars\"></i>
                </button>
                <a class=\"navbar-brand page-scroll\" href=\"#page-top\">
                    <i class=\"glyphicon glyphicon-heart-empty\"></i>  <span class=\"light\">Lucid</span>Couple
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse navbar-right navbar-main-collapse\">
                <ul class=\"nav navbar-nav\">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class=\"hidden\">
                        <a href=\"#page-top\"></a>
                    </li>
                    
                    <li>
                        <a class=\"page-scroll\" href=\"#daftar\">Daftar</a>
                    </li>
                    <li>
                        <a class=\"page-scroll\" href=\"#login\">Login</a>
                    </li>
                    <li>
                        <a class=\"page-scroll\" href=\"#contact\">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class=\"intro\">
        <div class=\"intro-body\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-8 col-md-offset-2\">
                        <h1 class=\"brand-heading\">LucidCouple</h1>
                        <p class=\"intro-text\">Layanan aplikasi yang akan membantu mu menemukan pasangan yang terbaik.<br>Daftar sekarang! Geratis, selamanya.</p>
                        <a href=\"#daftar\" class=\"btn btn-circle page-scroll\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Daftar!\">
                            <i class=\"fa fa-angle-double-down animated\"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id=\"daftar\" class=\"container content-section text-center\">
        <div class=\"row\">
            <div class=\"col-lg-8 col-lg-offset-2\">
                <h2>Daftar LucidCouple</h2>
                <p><form role=\"form\" class=\"register-area\">
\t\t\t\t\t\t<div class=\"well well-sm f-well form-area\" ><strong><span class=\"glyphicon glyphicon-asterisk\"></span>Harus diisi</strong></div>
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputName\">Nama</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"InputName\" id=\"InputName\" placeholder=\"Masukan nama\" required>
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-asterisk\"></span></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputEmail\">Email</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"email\" class=\"form-control\" id=\"InputEmailFirst\" name=\"InputEmail\" placeholder=\"Masukan email\" required>
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-asterisk\"></span></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputEmail\">Password</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" id=\"InputPassword\" name=\"InputPassword\" placeholder=\"Masukan password\" required>
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-asterisk\"></span></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputEmail\">Ulangi Password</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" id=\"InputPasswordSecond\" name=\"InputPasswordSecond\" placeholder=\"Ulangi password\" required>
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-asterisk\"></span></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputEmail\">Tanggal Lahir</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"birthday\" name=\"InputBirth\" placeholder=\"Tanggal lahir\" required=\"true\" readonly=\"true\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon add-on\"><span class=\"glyphicon glyphicon-asterisk\"></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Daftar\" class=\"btn btn-default btn-lg pull-right\">
\t\t\t\t</form>
\t\t\t\t</p>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id=\"login\" class=\"content-section text-center\">
        <div class=\"download-section\">
            <div class=\"container\">
                <div class=\"col-lg-8 col-lg-offset-2\">
                    <h2>Login LucidCouple</h2>
                    <p>
\t\t\t\t\t\t<form role=\"form\" class=\"login-area\">
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputEmail\">Email</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"email\" class=\"form-control\" id=\"InputEmailFirst\" name=\"InputEmail\" placeholder=\"Masukan email\" required>
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-asterisk\"></span></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group form-area\">
\t\t\t\t\t\t\t\t<label for=\"InputEmail\">Password</label>
\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" id=\"InputPassword\" name=\"InputPassword\" placeholder=\"Masukan password\" required>
\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-asterisk\"></span></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Login\" class=\"btn btn-default btn-lg pull-right\">
\t\t\t\t\t\t</form>
\t\t\t\t\t</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id=\"contact\" class=\"container content-section text-center\">
        <div class=\"row\">
            <div class=\"col-lg-8 col-lg-offset-2\">
                <h2>Hubungi LucidCouple</h2>
                <p>Tidak usah sungkan, silahkan hubungi kami untuk menyampaikan saran, memasang iklan atau hanya sekedar ingin menyapa kami!</p>
                <p><a href=\"mailto:call@lucidcouple.com\">call@lucidcouple.com</a>
                </p>
                <ul class=\"list-inline banner-social-buttons\">
                    <li>
                        <a href=\"#\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-twitter fa-fw\"></i> <span class=\"network-name\">Twitter</span></a>
                    </li>
                    <li>
                        <a href=\"#\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-facebook fa-fw\"></i> <span class=\"network-name\">Facebook</span></a>
                    </li>
                    <li>
                        <a href=\"#\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-google-plus fa-fw\"></i> <span class=\"network-name\">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    

    <!-- Footer -->
    <footer>
        <div class=\"container text-center\">
            <p>Copyright &copy; lucidcouple.com 2014</p>
        </div>
    </footer>

            <script type=\"text/javascript\" src=\"";
        // line 217
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/js/jquery.easing.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 218
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/js/grayscale.js"), "html", null, true);
        echo "\"></script>
            
    <!-- Bootstrap Core JavaScript -->

    <!-- Custom Theme JavaScript -->
    
\t<script>
\t\t\$(function(){
\t\t\t\$('[data-toggle=\"tooltip\"]').tooltip();
\t\t});
\t</script>
</body>

</html>
";
    }

    // line 15
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 16
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/css/grayscale.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/css/jquery-ui.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
            <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/css/jobs.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    ";
    }

    // line 22
    public function block_javascripts($context, array $blocks = array())
    {
        // line 23
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/js/jquery-1.10.2.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/lclc/js/jquery-ui.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "LcLcBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 24,  291 => 23,  288 => 22,  282 => 20,  278 => 19,  274 => 18,  270 => 17,  265 => 16,  262 => 15,  243 => 219,  239 => 218,  235 => 217,  42 => 26,  39 => 22,  37 => 15,  21 => 1,);
    }
}
