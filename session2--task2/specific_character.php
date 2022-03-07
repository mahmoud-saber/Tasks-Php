<?php
function char( $char){
    $nextchar = ++$char;
    if (strlen($nextchar) > 1) 
    {
        $nextchar = $nextchar[0];
    }

    echo $nextchar."<br>";
}
char('a');
char('z');

?>