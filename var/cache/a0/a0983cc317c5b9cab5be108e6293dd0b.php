<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* /templates/base_concept.twig */
class __TwigTemplate_3ed8e6cce94185bf011af48e9186304d extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'link' => [$this, 'block_link'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>Logistics Company - Container Rental</title>
    <link href=\"/vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/views/stylesheet/styleBase.css\">
    <link rel=\"stylesheet\" ";
        // line 9
        yield from $this->unwrap()->yieldBlock('link', $context, $blocks);
        yield ">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">


    <script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" defer></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js\" defer></script>
    <script src=\"/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js\" defer></script>

<body>
<!-- Navigation Bar -->
<nav class=\"navbar navbar-expand-lg navbar-dark custom-navbar\">
    <a class=\"navbar-brand\" href=\"#\">Logistics Co.</a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
        <ul class=\"navbar-nav ms-auto\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Home</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Services</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Contact</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link login-link\" href=\"/views/pages/signPage.twig\">Account Login</a>
            </li>
        </ul>
    </div>

</nav>
";
        // line 42
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 43
        yield "<!-- Footer -->
<footer class=\"footer py-5\">
    <div class=\"container\">
        <div class=\"footer-top pb-4 mb-4\">
            <div class=\"row\">
                <!-- Company Info -->
                <div class=\"col-lg-4 mb-4\">
                    <h5 class=\"text-uppercase\">Logistics Co.</h5>
                    <p>Providing comprehensive ocean freight and container rental services worldwide. Reliable, secure, and efficient logistics solutions for your business needs.</p>
                </div>

                <!-- Navigation Links -->
                <div class=\"col-lg-2 mb-4\">
                    <h6 class=\"text-uppercase\">Quick Links</h6>
                    <ul class=\"list-unstyled\">
                        <li><a href=\"#\">Home</a></li>
                        <li><a href=\"#\">Services</a></li>
                        <li><a href=\"#\">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class=\"col-lg-3 mb-4\">
                    <h6 class=\"text-uppercase\">Contact Us</h6>
                    <ul class=\"list-unstyled\">
                        <li><i class=\"fas fa-phone-alt text-primary\"></i> +1 (800) 123-4567</li>
                        <li><i class=\"fas fa-envelope text-primary\"></i> info@logisticsco.com</li>
                        <li><i class=\"fas fa-map-marker-alt text-primary\"></i> 1234 Ocean Drive, Suite 567, City, Country</li>
                    </ul>
                </div>

                <!-- Social Media Links -->
                <div class=\"col-lg-3 mb-4 text-center text-lg-left\">
                    <h6 class=\"text-uppercase\">Follow Us</h6>
                    <div class=\"social-icons\">
                        <a href=\"https://www.facebook.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/facebook-logo.png\" alt=\"Facebook\" class=\"social-img\">
                        </a>
                        <a href=\"https://www.twitter.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/twitter-logo.png\" alt=\"Twitter\" class=\"social-img\">
                        </a>
                        <a href=\"https://www.instagram.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/instagram-new.png\" alt=\"Instagram\" class=\"social-img\">
                        </a>
                        <a href=\"https://www.linkedin.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/linkedin-logo.png\" alt=\"LinkedIn\" class=\"social-img\">
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class=\"footer-bottom text-center mt-4 pt-4\">
            <div class=\"decorative-line mb-3\"></div>
            <p class=\"mb-0\">&copy; 2024 Logistics Co. All rights reserved. | <a href=\"#\">Privacy Policy</a> | <a href=\"#\">Terms of Service</a></p>
        </div>
    </div>
</footer>



</body>
</html>";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_link(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield " href=\"/views/stylesheet/styleIndex.css\"";
        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/templates/base_concept.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  170 => 42,  159 => 9,  92 => 43,  90 => 42,  54 => 9,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <title>Logistics Company - Container Rental</title>
    <link href=\"/vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/views/stylesheet/styleBase.css\">
    <link rel=\"stylesheet\" {% block link %} href=\"/views/stylesheet/styleIndex.css\"{% endblock %}>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">


    <script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" defer></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js\" defer></script>
    <script src=\"/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js\" defer></script>

<body>
<!-- Navigation Bar -->
<nav class=\"navbar navbar-expand-lg navbar-dark custom-navbar\">
    <a class=\"navbar-brand\" href=\"#\">Logistics Co.</a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
        <ul class=\"navbar-nav ms-auto\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Home</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Services</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Contact</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link login-link\" href=\"/views/pages/signPage.twig\">Account Login</a>
            </li>
        </ul>
    </div>

</nav>
{% block content %}{% endblock %}
<!-- Footer -->
<footer class=\"footer py-5\">
    <div class=\"container\">
        <div class=\"footer-top pb-4 mb-4\">
            <div class=\"row\">
                <!-- Company Info -->
                <div class=\"col-lg-4 mb-4\">
                    <h5 class=\"text-uppercase\">Logistics Co.</h5>
                    <p>Providing comprehensive ocean freight and container rental services worldwide. Reliable, secure, and efficient logistics solutions for your business needs.</p>
                </div>

                <!-- Navigation Links -->
                <div class=\"col-lg-2 mb-4\">
                    <h6 class=\"text-uppercase\">Quick Links</h6>
                    <ul class=\"list-unstyled\">
                        <li><a href=\"#\">Home</a></li>
                        <li><a href=\"#\">Services</a></li>
                        <li><a href=\"#\">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class=\"col-lg-3 mb-4\">
                    <h6 class=\"text-uppercase\">Contact Us</h6>
                    <ul class=\"list-unstyled\">
                        <li><i class=\"fas fa-phone-alt text-primary\"></i> +1 (800) 123-4567</li>
                        <li><i class=\"fas fa-envelope text-primary\"></i> info@logisticsco.com</li>
                        <li><i class=\"fas fa-map-marker-alt text-primary\"></i> 1234 Ocean Drive, Suite 567, City, Country</li>
                    </ul>
                </div>

                <!-- Social Media Links -->
                <div class=\"col-lg-3 mb-4 text-center text-lg-left\">
                    <h6 class=\"text-uppercase\">Follow Us</h6>
                    <div class=\"social-icons\">
                        <a href=\"https://www.facebook.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/facebook-logo.png\" alt=\"Facebook\" class=\"social-img\">
                        </a>
                        <a href=\"https://www.twitter.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/twitter-logo.png\" alt=\"Twitter\" class=\"social-img\">
                        </a>
                        <a href=\"https://www.instagram.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/instagram-new.png\" alt=\"Instagram\" class=\"social-img\">
                        </a>
                        <a href=\"https://www.linkedin.com\" class=\"social-icon\" target=\"_blank\">
                            <img src=\"https://img.icons8.com/3d-fluency/94/linkedin-logo.png\" alt=\"LinkedIn\" class=\"social-img\">
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class=\"footer-bottom text-center mt-4 pt-4\">
            <div class=\"decorative-line mb-3\"></div>
            <p class=\"mb-0\">&copy; 2024 Logistics Co. All rights reserved. | <a href=\"#\">Privacy Policy</a> | <a href=\"#\">Terms of Service</a></p>
        </div>
    </div>
</footer>



</body>
</html>", "/templates/base_concept.twig", "C:\\Users\\dmitr\\PhpstormProjects\\Containers\\views\\templates\\base_concept.twig");
    }
}
