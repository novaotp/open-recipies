<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/config/app.php');

/**
 * An intrinsic object to generate commonly-used tags.
 */
class Tag
{
  /**
   * Generates a CSS link tag.
   * @param string $pathFromStyles The relative path of the file from the `/src/resources/styles` directory
   * @return string A link tag
   */
  public static function link(string $pathFromStyles): string
  {
    $link = WEBSITE_ROOT . '/src/resources/styles' . $pathFromStyles;
    return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$link\" />";
  }

  /**
   * Generates a JS script tag.
   * @param string $pathFromComponentDir The relative path of the file from the `/src/resources/scripts` directory
   * @param bool $asModule If true, adds `type="module"`, else `nomodule`
   * @return string A script tag
   */
  public static function script(string $pathFromScripts, bool $asModule)
  {
    $link = WEBSITE_ROOT . '/src/resources/scripts' . $pathFromScripts;
    $module = $asModule ? "type=\"module\"" : "nomodule";
    return "<script type=\"text/javascript\" $module src=\"$link\"></script>";
  }

  /**
   * Generates a PHP require tag.
   * @param string $pathFromComponentDir The relative path of the file from the `/src/resources/components` directory
   * @return string A require tag
   */
  public static function component(string $pathFromComponents)
  {
    $path = WEBSITE_ROOT . '/src/resources/components' . $pathFromComponents;
    return "<?= require_once($path); ?>";
  }
}
