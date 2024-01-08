<?php

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

/**
 * A simple GET/FORM controller for form pages.
 */
class {Name}
{
    /**
     * Shows a form for the `/some-page` page.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function get(RouteCollection $routes) 
    {
        // Show a form here...
    }

    /**
     * Handles the `/some-page` form submission.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function form(RouteCollection $routes) 
    {
        // Handle the form here...
    }
}
