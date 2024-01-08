<?php

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

/**
 * A fully-fledged controller with every method.
 */
class {Name}
{
    /**
     * Shows a list of the all resources.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function index(RouteCollection $routes) 
    {
        // Show all the resources here...
    }

    /**
     * Shows a form to create a new resource.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function create(RouteCollection $routes) 
    {
        // Show a form here...
    }

    /**
     * Handles the creation of a resource.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function store(RouteCollection $routes) 
    {
        // Handle the resource creation here...
    }

    /**
     * Shows a specific resource.
     * @param int $id The id of the resource to show.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function show(int $id, RouteCollection $routes) 
    {
        // Show the resource here...
    }

    /**
     * Shows a form to edit a resource.
     * @param int $id The id of the resource to edit.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function edit(int $id, RouteCollection $routes) 
    {
        // Show a form here...
    }

    /**
     * Handles the update of a resource.
     * @param int $id The id of the resource to update.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function update(int $id, RouteCollection $routes) 
    {
        // Handle the resource update here...
    }

    /**
     * Handles the deletion of a resource.
     * @param int $id The id of the resource to delete.
     * @param RouteCollection $routes All the defined routes in `/routes/web.php` file. Automatically injected by the framework.
     */
    public function destroy(int $id, RouteCollection $routes) 
    {
        // Handle the resource deletion here...
    }
}
