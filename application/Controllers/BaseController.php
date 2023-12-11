<?php

namespace App\Controllers;

abstract class BaseController {
  /** The `GET` function of the main page. */
  protected function index() {
    echo "Default implementation for the index function";
  }

  /** The `GET` function for adding a new item. */
  protected function create() {
    echo "Default implementation for the create function";
  }

  /** The `POST` function for adding a new item. */
  protected function store() {
    echo "Default implementation for the store function";
  }

  /** The `GET` function to show a specific item. */
  protected function show() {
    echo "Default implementation for the show function";
  }

  /** The `GET` function to edit a specific item. */
  protected function edit() {
    echo "Default implementation for the edit function";
  }

  /** The `PUT` function to edit a specific item. */
  protected function update() {
    echo "Default implementation for the update function";
  }
  
  /** The `DELETE` function to edit a specific item. */
  protected function destroy() {
    echo "Default implementation for the destroy function";
  }
}
