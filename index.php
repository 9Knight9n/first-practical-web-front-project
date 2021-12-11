<?php
    var_dump(false);
    print_r(false);
    $hello = array("hello"=>'hello world');
    $hello2 = explode(' ',"hello World");
    foreach($hello as $k => $value)
    {
        echo "key=",$k," val=",$value,"\n";
    }
    for ($i = 0 ; $i<count($hello);$i++)
    {
        continue;
    }


?><p>hello</p>