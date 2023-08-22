<?php

class URLHelper
{
    public function show404page(string $path): void
    {
        require_once("{$path}404.view.php");
    }

    public function getArrParams(string $query_string): array
    {
        $array = explode('&', $query_string);
        $count = count($array);

        for ($i = 0; $i < $count; $i++) {

            list($key, $value) = explode('=', $array[$i]);
            $result[$key] = $value;
        }

        return $result;
    }

    public function cleanURLParam($param)
    {
        return strip_tags(trim($param));
    }
}
