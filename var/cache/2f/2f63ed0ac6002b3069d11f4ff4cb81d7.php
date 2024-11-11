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

/* pages/signPage.twig */
class __TwigTemplate_8159ce242acba176018e409a33e4c69a extends Template
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
        $this->parent = $this->loadTemplate("/templates/base_concept.twig", "pages/signPage.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_link(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield " href=\"/views/stylesheet/styleSign.css\"";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "    <div class=\"form-sign\">
        <div class=\"container right-panel-active\">
            <!-- Sign Up -->
            <div class=\"container__form container--signup\">
                <form action=\"#\" method=\"post\" class=\"form\" id=\"form1\">
                    <h2 class=\"form__title\">Sign Up</h2>
                    <input type=\"text\" name=\"name\" placeholder=\"Name\" class=\"input\" required />
                    <input type=\"text\" name=\"surname\" placeholder=\"Surname (optional)\" class=\"input\" required />
                    <input type=\"email\" name=\"email\" placeholder=\"Email\" class=\"input\" required />
                    <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"input\" required />
                    <input type=\"text\" name=\"address\" placeholder=\"Address (optional)\" class=\"input\" required />
                    <input type=\"tel\" name=\"phone_number\" placeholder=\"Phone Number\" class=\"input\" required />

                    <!-- Country Selection -->
                    <select name=\"country\" class=\"input\" required>
                        <option value=\"\" disabled selected>Select Country</option>
                        <option value=\"Ukraine\">Ukraine</option>
                        <option value=\"Poland\">Poland</option>
                        <option value=\"Germany\">Germany</option>
                        <!-- Add more countries as needed -->
                    </select>

                    <button type=\"submit\" class=\"btn\">Sign Up</button>
                </form>
            </div>

            <!-- Sign In -->
            <div class=\"container__form container--signin\">
                <form action=\"#\" method=\"post\" class=\"form\" id=\"form2\">
                    <h2 class=\"form__title\">Sign In</h2>
                    <input type=\"email\" name=\"email\" placeholder=\"Email\" class=\"input\" required />
                    <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"input\" required />
                    <a href=\"#\" class=\"link\">Forgot your password?</a>
                    <button type=\"submit\" class=\"btn\">Sign In</button>
                </form>
            </div>

            <!-- Overlay -->
            <div class=\"container__overlay\">
                <div class=\"overlay\">
                    <div class=\"overlay__panel overlay--left\">
                        <button class=\"btn\" id=\"signIn\">Sign In</button>
                    </div>
                    <div class=\"overlay__panel overlay--right\">
                        <button class=\"btn\" id=\"signUp\">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signInBtn = document.getElementById(\"signIn\");
        const signUpBtn = document.getElementById(\"signUp\");
        const container = document.querySelector(\".container\");

        signInBtn.addEventListener(\"click\", () => {
            container.classList.remove(\"right-panel-active\");
        });

        signUpBtn.addEventListener(\"click\", () => {
            container.classList.add(\"right-panel-active\");
        });
    </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/signPage.twig";
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
        return array (  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '/templates/base_concept.twig' %}

{% block link %} href=\"/views/stylesheet/styleSign.css\"{% endblock %}

{% block content %}
    <div class=\"form-sign\">
        <div class=\"container right-panel-active\">
            <!-- Sign Up -->
            <div class=\"container__form container--signup\">
                <form action=\"#\" method=\"post\" class=\"form\" id=\"form1\">
                    <h2 class=\"form__title\">Sign Up</h2>
                    <input type=\"text\" name=\"name\" placeholder=\"Name\" class=\"input\" required />
                    <input type=\"text\" name=\"surname\" placeholder=\"Surname (optional)\" class=\"input\" required />
                    <input type=\"email\" name=\"email\" placeholder=\"Email\" class=\"input\" required />
                    <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"input\" required />
                    <input type=\"text\" name=\"address\" placeholder=\"Address (optional)\" class=\"input\" required />
                    <input type=\"tel\" name=\"phone_number\" placeholder=\"Phone Number\" class=\"input\" required />

                    <!-- Country Selection -->
                    <select name=\"country\" class=\"input\" required>
                        <option value=\"\" disabled selected>Select Country</option>
                        <option value=\"Ukraine\">Ukraine</option>
                        <option value=\"Poland\">Poland</option>
                        <option value=\"Germany\">Germany</option>
                        <!-- Add more countries as needed -->
                    </select>

                    <button type=\"submit\" class=\"btn\">Sign Up</button>
                </form>
            </div>

            <!-- Sign In -->
            <div class=\"container__form container--signin\">
                <form action=\"#\" method=\"post\" class=\"form\" id=\"form2\">
                    <h2 class=\"form__title\">Sign In</h2>
                    <input type=\"email\" name=\"email\" placeholder=\"Email\" class=\"input\" required />
                    <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"input\" required />
                    <a href=\"#\" class=\"link\">Forgot your password?</a>
                    <button type=\"submit\" class=\"btn\">Sign In</button>
                </form>
            </div>

            <!-- Overlay -->
            <div class=\"container__overlay\">
                <div class=\"overlay\">
                    <div class=\"overlay__panel overlay--left\">
                        <button class=\"btn\" id=\"signIn\">Sign In</button>
                    </div>
                    <div class=\"overlay__panel overlay--right\">
                        <button class=\"btn\" id=\"signUp\">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signInBtn = document.getElementById(\"signIn\");
        const signUpBtn = document.getElementById(\"signUp\");
        const container = document.querySelector(\".container\");

        signInBtn.addEventListener(\"click\", () => {
            container.classList.remove(\"right-panel-active\");
        });

        signUpBtn.addEventListener(\"click\", () => {
            container.classList.add(\"right-panel-active\");
        });
    </script>
{% endblock %}
", "pages/signPage.twig", "C:\\Users\\dmitr\\PhpstormProjects\\Containers\\views\\pages\\signPage.twig");
    }
}
