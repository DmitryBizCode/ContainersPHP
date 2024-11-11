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

/* pages/indexPage.twig */
class __TwigTemplate_8ff538917ff2bccb9cd51ad79ece7e14 extends Template
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

        $this->blocks = [
            'link' => [$this, 'block_link'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "/templates/base_concept.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("/templates/base_concept.twig", "pages/indexPage.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_link(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield " href=\"/views/stylesheet/styleIndex.css\" ";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "
<!-- Hero Section -->
<section class=\"hero-section\">
    <div class=\"container\">
        <h1 class=\"display-4\">Reliable Container Rentals for Global Shipping</h1>
        <p class=\"lead\">Manage your container rentals and monitor them through IoT-enabled devices, all in your personal account dashboard.</p>
        <a href=\"#\" class=\"btn btn-primary btn-lg\">Learn More</a>
    </div>
</section>
<!-- Features Section -->
<section class=\"feature-section py-5\">
    <div class=\"container\">
        <h2 class=\"text-center mb-5\">Our Key Features</h2>
        <div class=\"row\">
            <div class=\"col-md-4 feature\">
                <div class=\"feature-card p-4 text-center\">
                    <img src=\"/image/fu.webp\" alt=\"Global Coverage\" class=\"feature-image mb-3\">
                    <h4>Global Shipping Coverage</h4>
                    <p>We offer container rentals for shipping to multiple global destinations. Track your containers in real-time from anywhere in the world.</p>
                </div>
            </div>
            <div class=\"col-md-4 feature\">
                <div class=\"feature-card p-4 text-center\">
                    <img src=\"/image/fi.webp\" alt=\"IoT Monitoring\" class=\"feature-image mb-3\">
                    <h4>IoT Monitoring Solutions</h4>
                    <p>All containers are equipped with IoT devices for seamless tracking and monitoring of conditions, ensuring safe and secure transit.</p>
                </div>
            </div>
            <div class=\"col-md-4 feature\">
                <div class=\"feature-card p-4 text-center\">
                    <img src=\"/image/fe.webp\" alt=\"Easy Management\" class=\"feature-image mb-3\">
                    <h4>Easy Online Management</h4>
                    <p>Manage your rentals, monitor container conditions, and extend contracts easily through your online account dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class=\"services-section py-5\">
    <div class=\"container\">
        <h2 class=\"text-center mb-5\">Comprehensive Ocean Freight and Container Rental Services</h2>
        <div class=\"d-flex align-items-center\">
            <div class=\"col-md-5 text-center\">
                <img src=\"/image/500main.webp\" class=\"img-fluid single-service-image\" alt=\"Ocean Freight Service Illustration\">
            </div>
            <div class=\"col-md-7\">
                <div class=\"row\">
                    <div class=\"col-md-6 mb-4\">
                        <h4 class=\"text-primary\">Core Shipping Services</h4>
                        <ul class=\"list-unstyled\">
                            <li><i class=\"fas fa-ship text-primary\"></i> Full Container Load (FCL) Shipping</li>
                            <li><i class=\"fas fa-box-open text-primary\"></i> Less than Container Load (LCL) Shipping</li>
                            <li><i class=\"fas fa-handshake text-primary\"></i> End-to-End Container Management</li>
                            <li><i class=\"fas fa-search-location text-primary\"></i> Real-Time Cargo Tracking</li>
                            <li><i class=\"fas fa-file-alt text-primary\"></i> Customs Documentation Handling</li>
                        </ul>
                    </div>
                    <div class=\"col-md-6 mb-4\">
                        <h4 class=\"text-primary\">Value-Added Container Services</h4>
                        <ul class=\"list-unstyled\">
                            <li><i class=\"fas fa-warehouse text-primary\"></i> Secure Container Storage at Ports</li>
                            <li><i class=\"fas fa-cogs text-primary\"></i> Container Maintenance and Repair</li>
                            <li><i class=\"fas fa-wifi text-primary\"></i> IoT-Enabled Container Monitoring</li>
                            <li><i class=\"fas fa-shield-alt text-primary\"></i> Insurance Coverage for Containers</li>
                            <li><i class=\"fas fa-user-cog text-primary\"></i> Dedicated Customer Support</li>
                        </ul>
                    </div>
                    <div class=\"col-md-12 mt-4\">
                        <h4 class=\"text-primary\">Flexible Rental and Leasing Options</h4>
                        <ul class=\"list-unstyled\">
                            <li><i class=\"fas fa-calendar-alt text-primary\"></i> Short-Term Container Rental</li>
                            <li><i class=\"fas fa-calendar-check text-primary\"></i> Long-Term Container Leasing</li>
                            <li><i class=\"fas fa-money-bill-wave text-primary\"></i> Flexible Payment Options</li>
                            <li><i class=\"fas fa-hand-holding-usd text-primary\"></i> Competitive Pricing Plans</li>
                            <li><i class=\"fas fa-globe text-primary\"></i> Global Container Availability</li>
                        </ul>
                    </div>
                </div>
                <div class=\"text-center mt-4\">
                    <a href=\"#\" class=\"btn btn-primary btn-lg\">Learn More About Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Why Choose Us Section -->
<section class=\"why-choose-us py-5 bg-light\">
    <div class=\"container\">
        <h2 class=\"text-center mb-5\">Why Choose Our Logistics Services?</h2>
        <div class=\"row text-center\">
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/Reliable Delivery.webp\" alt=\"Reliable Delivery\" class=\"img-fluid\">
                </div>
                <h4>Reliable Delivery</h4>
                <p>Ensuring your cargo reaches the destination despite all challenges.</p>
            </div>
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/Warehouse Services.webp\" alt=\"Warehouse Services\" class=\"img-fluid\">
                </div>
                <h4>Warehouse Services</h4>
                <p>Secure storage solutions tailored to your needs.</p>
            </div>
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/EU and Global Reach.webp\" alt=\"EU and Global Reach\" class=\"img-fluid\">
                </div>
                <h4>EU and Global Reach</h4>
                <p>Delivering to Poland and other EU countries with ease.</p>
            </div>
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/Product Sourcing.webp\" alt=\"Product Sourcing\" class=\"img-fluid\">
                </div>
                <h4>Product Sourcing</h4>
                <p>Assisting you in finding and purchasing goods upon request.</p>
            </div>
        </div>
        <div class=\"text-center mt-4\">
            <a href=\"#\" class=\"btn btn-primary\">Submit a Request</a>
        </div>
    </div>
</section>

<!-- Company Stats Section -->
<section class=\"stats-section py-5 text-white\">
    <div class=\"container text-center\">
        <h2>Our Company in Numbers</h2>
        <div class=\"row\">
            <div class=\"col-md-3\">
                <h3>200</h3>
                <p>Employees</p>
            </div>
            <div class=\"col-md-3\">
                <h3>100,000</h3>
                <p>Clients</p>
            </div>
            <div class=\"col-md-3\">
                <h3>5</h3>
                <p>Continents Covered</p>
            </div>
            <div class=\"col-md-3\">
                <h3>25,000,000 kg</h3>
                <p>Goods Transported</p>
            </div>
        </div>
    </div>
</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/indexPage.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  70 => 5,  63 => 4,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '/templates/base_concept.twig' %}
{% block link %} href=\"/views/stylesheet/styleIndex.css\" {% endblock %}

{% block content %}

<!-- Hero Section -->
<section class=\"hero-section\">
    <div class=\"container\">
        <h1 class=\"display-4\">Reliable Container Rentals for Global Shipping</h1>
        <p class=\"lead\">Manage your container rentals and monitor them through IoT-enabled devices, all in your personal account dashboard.</p>
        <a href=\"#\" class=\"btn btn-primary btn-lg\">Learn More</a>
    </div>
</section>
<!-- Features Section -->
<section class=\"feature-section py-5\">
    <div class=\"container\">
        <h2 class=\"text-center mb-5\">Our Key Features</h2>
        <div class=\"row\">
            <div class=\"col-md-4 feature\">
                <div class=\"feature-card p-4 text-center\">
                    <img src=\"/image/fu.webp\" alt=\"Global Coverage\" class=\"feature-image mb-3\">
                    <h4>Global Shipping Coverage</h4>
                    <p>We offer container rentals for shipping to multiple global destinations. Track your containers in real-time from anywhere in the world.</p>
                </div>
            </div>
            <div class=\"col-md-4 feature\">
                <div class=\"feature-card p-4 text-center\">
                    <img src=\"/image/fi.webp\" alt=\"IoT Monitoring\" class=\"feature-image mb-3\">
                    <h4>IoT Monitoring Solutions</h4>
                    <p>All containers are equipped with IoT devices for seamless tracking and monitoring of conditions, ensuring safe and secure transit.</p>
                </div>
            </div>
            <div class=\"col-md-4 feature\">
                <div class=\"feature-card p-4 text-center\">
                    <img src=\"/image/fe.webp\" alt=\"Easy Management\" class=\"feature-image mb-3\">
                    <h4>Easy Online Management</h4>
                    <p>Manage your rentals, monitor container conditions, and extend contracts easily through your online account dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class=\"services-section py-5\">
    <div class=\"container\">
        <h2 class=\"text-center mb-5\">Comprehensive Ocean Freight and Container Rental Services</h2>
        <div class=\"d-flex align-items-center\">
            <div class=\"col-md-5 text-center\">
                <img src=\"/image/500main.webp\" class=\"img-fluid single-service-image\" alt=\"Ocean Freight Service Illustration\">
            </div>
            <div class=\"col-md-7\">
                <div class=\"row\">
                    <div class=\"col-md-6 mb-4\">
                        <h4 class=\"text-primary\">Core Shipping Services</h4>
                        <ul class=\"list-unstyled\">
                            <li><i class=\"fas fa-ship text-primary\"></i> Full Container Load (FCL) Shipping</li>
                            <li><i class=\"fas fa-box-open text-primary\"></i> Less than Container Load (LCL) Shipping</li>
                            <li><i class=\"fas fa-handshake text-primary\"></i> End-to-End Container Management</li>
                            <li><i class=\"fas fa-search-location text-primary\"></i> Real-Time Cargo Tracking</li>
                            <li><i class=\"fas fa-file-alt text-primary\"></i> Customs Documentation Handling</li>
                        </ul>
                    </div>
                    <div class=\"col-md-6 mb-4\">
                        <h4 class=\"text-primary\">Value-Added Container Services</h4>
                        <ul class=\"list-unstyled\">
                            <li><i class=\"fas fa-warehouse text-primary\"></i> Secure Container Storage at Ports</li>
                            <li><i class=\"fas fa-cogs text-primary\"></i> Container Maintenance and Repair</li>
                            <li><i class=\"fas fa-wifi text-primary\"></i> IoT-Enabled Container Monitoring</li>
                            <li><i class=\"fas fa-shield-alt text-primary\"></i> Insurance Coverage for Containers</li>
                            <li><i class=\"fas fa-user-cog text-primary\"></i> Dedicated Customer Support</li>
                        </ul>
                    </div>
                    <div class=\"col-md-12 mt-4\">
                        <h4 class=\"text-primary\">Flexible Rental and Leasing Options</h4>
                        <ul class=\"list-unstyled\">
                            <li><i class=\"fas fa-calendar-alt text-primary\"></i> Short-Term Container Rental</li>
                            <li><i class=\"fas fa-calendar-check text-primary\"></i> Long-Term Container Leasing</li>
                            <li><i class=\"fas fa-money-bill-wave text-primary\"></i> Flexible Payment Options</li>
                            <li><i class=\"fas fa-hand-holding-usd text-primary\"></i> Competitive Pricing Plans</li>
                            <li><i class=\"fas fa-globe text-primary\"></i> Global Container Availability</li>
                        </ul>
                    </div>
                </div>
                <div class=\"text-center mt-4\">
                    <a href=\"#\" class=\"btn btn-primary btn-lg\">Learn More About Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Why Choose Us Section -->
<section class=\"why-choose-us py-5 bg-light\">
    <div class=\"container\">
        <h2 class=\"text-center mb-5\">Why Choose Our Logistics Services?</h2>
        <div class=\"row text-center\">
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/Reliable Delivery.webp\" alt=\"Reliable Delivery\" class=\"img-fluid\">
                </div>
                <h4>Reliable Delivery</h4>
                <p>Ensuring your cargo reaches the destination despite all challenges.</p>
            </div>
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/Warehouse Services.webp\" alt=\"Warehouse Services\" class=\"img-fluid\">
                </div>
                <h4>Warehouse Services</h4>
                <p>Secure storage solutions tailored to your needs.</p>
            </div>
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/EU and Global Reach.webp\" alt=\"EU and Global Reach\" class=\"img-fluid\">
                </div>
                <h4>EU and Global Reach</h4>
                <p>Delivering to Poland and other EU countries with ease.</p>
            </div>
            <div class=\"col-md-3\">
                <div class=\"service-icon mb-3\">
                    <img src=\"/image/Product Sourcing.webp\" alt=\"Product Sourcing\" class=\"img-fluid\">
                </div>
                <h4>Product Sourcing</h4>
                <p>Assisting you in finding and purchasing goods upon request.</p>
            </div>
        </div>
        <div class=\"text-center mt-4\">
            <a href=\"#\" class=\"btn btn-primary\">Submit a Request</a>
        </div>
    </div>
</section>

<!-- Company Stats Section -->
<section class=\"stats-section py-5 text-white\">
    <div class=\"container text-center\">
        <h2>Our Company in Numbers</h2>
        <div class=\"row\">
            <div class=\"col-md-3\">
                <h3>200</h3>
                <p>Employees</p>
            </div>
            <div class=\"col-md-3\">
                <h3>100,000</h3>
                <p>Clients</p>
            </div>
            <div class=\"col-md-3\">
                <h3>5</h3>
                <p>Continents Covered</p>
            </div>
            <div class=\"col-md-3\">
                <h3>25,000,000 kg</h3>
                <p>Goods Transported</p>
            </div>
        </div>
    </div>
</section>
{% endblock %}

", "pages/indexPage.twig", "C:\\Users\\dmitr\\PhpstormProjects\\Containers\\views\\pages\\indexPage.twig");
    }
}
