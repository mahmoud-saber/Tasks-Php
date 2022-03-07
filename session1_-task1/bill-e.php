<?php
$units=160;
$result=0;
if($units >0 && $units <=50){
    $result = $units * 3.5;
}
elseif($units >50 && $units <=150){
    $frist_unit = 50 * 3.5;
    $second_unit =($units - 50) * 4 ;

    $result = $frist_unit  + $second_unit;
}
else{
    $frist_unit = 50 * 3.5;
    $second_unit =100 * 4 ;
    $thirt_unit =($units - 150) * 6.5;
    $result = $frist_unit  + $second_unit + $thirt_unit  ;
}
echo $result;
?>
?>