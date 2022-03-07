<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <table border="1" width="350px">
        <?php

            for($row=1;$row<=8;$row++){
                 echo '<tr>';
                 for($cols=1;$cols<=8;$cols++){
                     if((($row + $cols)%2)==0){
                         echo '<td height=40 eidth=40 bgcolor=#FFFFFF></td>';
                     }
                     else{ echo '<td height=40 width=40 bgcolor=#000000></td>';}
                 }
                
              }
                 echo '</tr>';
             
            
      ?>




    </table>
</head>

<body>

</body>

</html>