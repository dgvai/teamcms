<?php 
    
    function slugify($string, $delimeters = '-') 
    {
        return preg_replace('/\s+/u', $delimeters, trim($string));
    }

    function deslugify($string, $delimeters = '-')
    {
        return ucwords(str_replace($delimeters, ' ', $string));
    }