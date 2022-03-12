<?php
session_start();

  
//   if(isset($_SESSION['info'])){

//     if (!file_exists('info.txt')){
//     $filewrite = fopen("info.txt","w");
//       echo fwrite($filewrite,$_SESSION['info']['title']."\n".$_SESSION['info']['content']."\n");
//       fclose($filewrite);
//    }
  
//   else
//   {
//     $fileappend = fopen("info.txt","a");
//     echo fwrite($fileappend,$_SESSION['info']['title']."\n".$_SESSION['info']['content'])."<br>";
//     fclose($fileappend);
//   }
    
// }

// else{
//   echo 'No session with index (info)<br>';
// } 
//     //////
//     if (file_exists('info.txt')) {
//         $fileappend = fopen("info.txt","a");
//         echo fwrite($fileappend,$_SESSION['info']['title']."\n".$_SESSION['info']['content'])."<br>";
//         fclose($fileappend);
//     } 
//       else{
//         echo("unable to open file ");   
//       }
//  // ////////
//     // if ($fileread) {
//     //       // fread($fileread,filesize('info.txt'));
//     //     while(!feof($fileread)){ 
//     //         echo  fgets($fileread).'<br>';
//     //     }
//     //     fclose($fileread);
//     // } else{
//     //     echo("unable to open file ");   
//     //   }
    
////////////===================
  
//   if(isset($_SESSION['info'])){

//     if (!file_exists('info.txt')){
//       echo "Not Found File";
//    }
  
//   else
//   {
//     $fileappend = fopen("info.txt","r");
//        while(!feof($fileappend)){ 
//          echo  fgets($fileappend).'<br>'.'<button type="button">deleted</button>';

// }
//     fclose($fileappend);
//   }
// }
// else{
//   echo 'No data in (info)';
// }
include 'header.php';
?>

<body>

    <div class="container">
        <h2>show data</h2>
        <?php
        
  if(isset($_SESSION['info'])){

    if (!file_exists('info.txt')){
      echo "Not Found File";
   }
  
  else
  {
    $fileread= fopen("info.txt","r");
    
       while(!feof($fileread)){ 
        echo'<table border="1">';
        echo '<tr>';
        echo "<td>".fgets($fileread).'<button <?php include "deletSession.php" ?>Delet</button>'.'</td>'."<br>";
        echo '</tr>';
        echo '</table>';

        }
        fclose($fileread);
        }
        }
        else{
        echo 'No data in (info)';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>