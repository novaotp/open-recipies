<?php

namespace App\Providers;

/**
 * A class implementation to make requests more easily.
 */
class Curl
{
    /**
     * Makes a GET request to the specified URL with the specified parameters.
     *
     * @param string $url The URL to make the request to.
     * @param array $params The parameters to pass to the URL as a query string.
     * @return string|null The response from the API, or null on error.
     */
    public static function get(string $url, array $params = []): array|string|null
    {
        if (count($params) > 0) {
            $url .= "?" . http_build_query($params);
        }

        $curlHandler = curl_init($url);

        curl_setopt($curlHandler, CURLOPT_URL, $url);

        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30); // Timeout
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true); // Response as string
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, false); // Avoid redirections

        $response = curl_exec($curlHandler);

        if (curl_errno($curlHandler)) {
            var_dump('Curl error: ' . curl_error($curlHandler));
            curl_close($curlHandler);

            return null;
        }

        curl_close($curlHandler);

        return json_decode($response, true);
    }
}
