<?php

class QueryParam
{

  /**
   * Removes a query parameter from the URL.
   * @param string $url The URL to remove the parameter from
   * @param string $key The key of the parameter to remove
   * @return string The newly formed URL
   */
  public static function remove(string $url, string $key): string
  {
    $temp = preg_replace('~(\?|&)' . $key . '=[^&]*~', '$1', $url);

    if (substr($temp, -1) === '?') {
      $temp = substr($temp, 0, -1);
    }

    if (substr($temp, -1) === '&') {
      $temp = substr($temp, 0, -1);
    }

    return $temp;
  }

  /**
   * Adds a query parameter to the URL.
   * @param string $url The URL to add the parameter to
   * @param string $key The key of the parameter to add
   * @param string $value The value of the parameter to add
   * @return string The newly formed URL
   */
  public static function add(string $url, string $key, string $value): string
  {
    if (strpos($url, '?') === false) {
      $url .= '?';
    } else {
      $url .= '&';
    }

    // Now add the parameter
    return "$url$key=$value";
  }

  /**
   * Replaces a query parameter in the URL.
   * @param string $url The URL to replace the parameter with
   * @param string $key The key of the parameter to replace
   * @param string $value The value of the parameter to replace it with
   * @return string The newly formed URL
   */
  public static function replace(string $url, string $key, string $value)
  {
    $tempUrl = QueryParam::remove($url, $key);
    return QueryParam::add($tempUrl, $key, $value);
  }
}
