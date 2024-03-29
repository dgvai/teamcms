<?php 
    
    function slugify($string, $delimeters = '-') 
    {
        return preg_replace('/\s+/u', $delimeters, trim($string));
    }

    function deslugify($string, $delimeters = '-')
    {
        return ucwords(str_replace($delimeters, ' ', $string));
    }

    function updateEnv(array $data = []) 
    {
        if (count($data) > 0) 
        {
            $env = file_get_contents(base_path().'/.env');
            $env = preg_split('/(\r\n|\n|\r)/', $env);;

            foreach((array) $data as $key => $value) 
            {
                foreach($env as $env_key => $env_value) 
                {
                    $entry = explode("=", $env_value, 2);

                    if ($entry[0] == $key) 
                    {
                        $env[$env_key] = $key."=\"".$value."\"";
                    } else 
                    {
                        $env[$env_key] = $env_value;
                    }
                }
            }

            $env = implode("\n", $env);
            file_put_contents(base_path().'/.env', $env);
            return true;
        } 
        else 
        {
            return false;
        }
    }