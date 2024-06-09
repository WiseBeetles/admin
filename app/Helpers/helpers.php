<?php
if (! function_exists('printVariable')) {
    function printVariable($entry)
    {
        echo "<pre>";
        var_dump($entry);
        echo "</pre>";
    }
}