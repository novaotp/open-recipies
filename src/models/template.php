<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/config/app.php');

class Template {
    public static function link(string $relativePath) {
        $link = WEBSITE_ROOT . $relativePath;
        return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$link\" />";
    }

    public static function script(string $relativePath) {
        $src = WEBSITE_ROOT . $relativePath;
        return "<script type=\"text/javascript\" src=\"$src\"></script>";
    }
}
