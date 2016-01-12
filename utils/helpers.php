<?php

 function get_domain(){
	//$domain = $_SERVER['HTTP_HOST'];
	return $_SERVER['HTTP_HOST'];
	//return getenv('SITE_URL');
}

 function parse_extras($rule) 
{
    if ($rule[0] == "#") //1
    {
        $id = substr($rule,1,strlen($rule)); //2
        $data = ' id="' . $id . '"'; //3
        return $data;
    }
     
    if ($rule[0] == ".") //4
    {
        $class = substr($rule,1,strlen($rule));
        $data = ' class="' . $class . '"';
        return $data;
    }
     
    if ($rule[0] == "_") //5
    {
        $data = ' target="' . $rule . '"';
        return $data;
    }
}

 function anchor($link, $text, $title, $extras)//1
{
    $domain = get_domain();
    $link = $link;
    $data = '<a href="' . $link . '"';
     
    if ($title)
    {
        $data .= ' title="' . $title . '"';
    }
    else
    {
        $data .= ' title="' . $text . '"';
    }
     
    if (is_array($extras))//2
    {
        foreach($extras as $rule)//3
        {
            $data .= parse_extras($rule);//4
        }
    }
     
    if (is_string($extras))//5
    {
        $data .= parse_extras($extras);//6
    }
         
    $data.= '>';
     
    $data .= $text;
    $data .= "</a>";

    //echo $data;exit;
     
    return $data;
}
