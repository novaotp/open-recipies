<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/config/app.php');

class Template {
    public static function link(string $relativePath) {
        $link = WEBSITE_ROOT . $relativePath;
        return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$link\" />";
    }
}
