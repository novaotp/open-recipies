<?php

namespace Utils;

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
    $link = '/open-recipies/resources/styles' . $pathFromStyles;
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
    $link = '/open-recipies/resources/js' . $pathFromScripts;
    $module = $asModule ? "type=\"module\"" : "nomodule";
    return "<script type=\"text/javascript\" $module src=\"$link\"></script>";
  }
}