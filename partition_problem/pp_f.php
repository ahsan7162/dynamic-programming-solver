<style>
    .st2{
        background-color: #03065a;
        
    }
    body{
        background-color:#202020;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .matrix{
        background-color: #03065a;
    }
    p{
        font-size: 18px;
    }
table {
    text-align: center;
  width: 100%;
  background-color: #202020;
  font-size: 18px;
  color: white;
  text-transform: uppercase;
  border-collapse: collapse;

}
tr,td,th{
    border: 0.5px solid;
    border-color: white;
    padding-left: 10px;
  padding-right: 10px;
}
.hidden{
    visibility: hidden;
}
.green{
    background-color: blue;
    color:white
}
button{
    height: 50px;
    width: 200px;
    border: 0px solid white;
    background-color: #03065a;
    color:white;
    font-size: 20px;
    border-radius: 10px;
    margin-bottom: 15px;
}
.inputs{
    padding-left: 35%;
}
button:hover{
    background-color: black;
    border:0.2px solid white;
}
</style>





<?php

$array = [];
$random = [];

if(isset($_POST['submit'])){
for($i = 0; $i < 10  ;$i++)
{
    $random_input = mt_rand(30,100);
    $random[$i] = $random_input;
    echo $random_input . "<br>";
  for ($j =0 ;$j < $random_input; $j++)
  {
    $array[$j] = mt_rand(0,100);
    
    
    
  }
  $str = implode("," , $array);
  echo $str . "<br";
$generate_string = $i+1 . ",".  "$str"  . "\n";
 $myfile = fopen("pp.txt", "a+") or die("Unable to open file!");
 fwrite($myfile, $generate_string);
 fclose($myfile);
   $array = [];

}
}
 $record = $_GET["file_i"];

$handle = fopen("pp.txt", "r");
if ($handle)
{
    
    while (!feof($handle))
    {
        
        $buffer = fgets($handle);
        // echo $buffer . "<br>";
        if(strpos($buffer[0], $record) !== FALSE){
            // echo $buffer . " <br>";
            $matches = $buffer;
            break;
        }
    }
    fclose($handle);
}

// echo $matches[0];
// $arr = [ 3, 1, 1, 2, 2, 1 ];


$input = [];
$original = [];
$input = explode(',',$matches);
 $count = count($input);
for($i = 0 ;$i<$count-1 ; $i++)
{
    $original[$i] = $input[$i+1];
}
// print_r($original);
$count = 0;
$count = count($original);


// echo 0 || 0;
function findPartition($arr , $count)
{
    
echo"<h1>INPUT ARRAY</h1>";
for($i=0; $i<$count;$i++){
    echo "<span>{$arr[$i]} </span>";
}
echo"<br><br>";
    
$sum = 0;
$i = $j = 0;
// echo "<pre>";

// // print_r($arr);

// echo "</pre>";
// Calculate sum of all elements
// for ($i = 0; $i < $count; $i++){
 $sum = Array_sum($arr);
 echo "<span><b>TOTAL ARRAY SUM</b>: ",$sum,"</span><br>";
// }

if ($sum % 2 != 0)
{
    
     return 0;
}
$part = array(array());
 
//echo $count . "<br>";
// initialize top row as true
for ($i = 0; $i <= $count; $i++)
    $part[0][$i] = 1;

// initialize leftmost column,
// except part[0][0], as 0
for ($i = 1; $i <= $sum / 2; $i++)
    $part[$i][0] = 0;

// Fill the partition table in bottom up manner
for ($i = 1; $i <= $sum / 2; $i++) {
    for ($j = 1; $j <= $count; $j++) {
        $part[$i][$j] = $part[$i][$j - 1];
        // echo "i : ".$i . "<br>";
        // echo "j : ".$j . "<br>";
        // echo "part : " .$part[$i][$j] ."<br>";
        
        if ($i >= $arr[$j - 1]){
            $part[$i][$j] = $part[$i][$j] || $part[$i - $arr[$j - 1]][$j - 1];
            if($part[$i][$j] == 0 && $part[$i - $arr[$j - 1]][$j - 1] == 0)
            {
                $part[$i][$j] = 0;
            }
        }
    }
}

 // uncomment this part to print table
// for ($i = 0; $i <= $sum/2; $i++)
// {
// for ($j = 0; $j <= $count; $j++){
//     echo $part[$i][$j];

// }
// echo "<br>";

// } 
echo "<h1>OUTPUT TABLE</h1>";

// print_r($part);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var i=0,j=0,k=0;
     
        function print_array(){
               var element =  document.getElementsByClassName("hidden");
               //var str1 =  document.getElementsByClassName("st1");
               console.log(element);
               element[0].classList.remove("hidden");
              
                
            //    var array_element = document.createTextNode(ary[i][j]);
            //    parent.appendChild(array_element);
            //     j++;
            //     if(j == (ary[i].length))
            //             {
            //                 j = 0;
            //                 i++;
            //                 counter++;
            //             }
            //             if(counter == ary.length)
            //             {
            //                 $('button').prop("disabled","true");
                               
            //             }
           }
</script>
</head>
<body>
<script>
function finalize(){
            var element =  document.getElementsByClassName("hidden");
            var count=element.length;
            for(var i = 0 ; i < count ; i++){
                element[0].classList.remove("hidden");
            }
        }
</script>
    <button id = 'show' onclick = "print_array()" >Next Iterations</button>
    <button id = 'show' onclick = "finalize()" >Finalize</button><br>
</body>



</html>
<?php
echo "</pre>";
echo "<table>";
for ($i = 0; $i <= $sum / 2; $i++) {
    echo "<tr >";
    for ($j = 1; $j <= $count; $j++) {
        echo "<td class = 'hidden'>{$part[$i][$j]}</td>";
    }
    echo "</tr>";

    
}
echo "</table>";

return $part[$sum / 2][$count];
}

error_reporting(E_ALL ^ E_WARNING ^E_NOTICE);
  
    // Function call
    if (findPartition($original, $count) == true)
        echo "<br><br>Can be divided into two subsets of equal sum<br><br>";
    else{
        echo  "<br><br>Can not be divided into two subsets of equal sum<br><br>";
    }



?>
