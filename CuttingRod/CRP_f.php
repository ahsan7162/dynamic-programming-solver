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
span{
    font-size: 20px;
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
$count = 0;
$values = [];
$weight = [];
$Weight = [];
$array1 = [];
$array2 = [];
$random = [];
//$weight = ['260','181'];
$myfile = fopen("CRP_1.txt", "w");
$rod = $_GET['rod'];

// if(isset($_POST['submit']))
{
for($i = 0; $i < 10  ;$i++)
{
    $random_input = mt_rand(0,1);
    // $random_weight = mt_rand(0,1);
    // $random[$i] = $random_input;
    // echo $random_input ;
    
  for ($j =0 ;$j < $rod; $j++)
  {
    $array1[$j] = mt_rand(1,100);
    $array2[$j] = mt_rand(1,100);
    
    
    
  }
  $str = implode("," , $array1);
  $str1 = implode("," , $array2);
//   $w[] = $weight[$random_weight];
   
//   echo $str . "<br";

$generate_string1 = $i+1 . ",".  "$str"  . "\n";
$generate_string2 = $i+1 . ",".  "$str1"  . "\n";
$generate_string3 = $i+1 . ",".  "$rod"  . "\n";
 $myfile = fopen("CRP_1.txt", "a+") or die("Unable to open file!");
 fwrite($myfile, $generate_string1);
 fwrite($myfile, $generate_string2);
 fwrite($myfile, $generate_string3);
 fclose($myfile);
   $array1 = [];
   $array2 = [];
  
}
}

 $record = $_GET["file_i"];


$handle = fopen("CRP_1.txt", "r");
if ($handle)
{
    
    while (!feof($handle))
    {
        
        $buffer = fgets($handle);
        // echo $buffer[0] . "<br>";
        if(strpos($buffer[0], $record) !== FALSE){
            $count++;
            // echo "count : ". $count . "<br>";
            if($count == 1)
            {
              $values = $buffer;
            //   echo $values . "<br>";
            }
            if($count == 2)
            {
                $weight = $buffer;
                // echo $weight . "<br>";
            }
            if($count == 3)
            {
                $Weight = $buffer;
                // echo $Weight . "<br>";
                break;
            }
            // else{
            // break;
            // }
        }
    }
    fclose($handle);
}

 
$input1 = [];
$input2 = [];
$input3 = [];
$price = [];//original array for price
$weights = [];//original array for weights
$cap = [];
//  for($i = 0 ; $i < 100 ;$i++)
// {
//     $length[$i] = $i;
// }
// for($i = 0 ; $i < 100 ;$i++)
// {
//     $price1[$i] = mt_rand(1,100);
// }
// $price1 = [2,7,10,11,12];
 
$input1 = explode(',',$values);
$count1 = count($input1);
for($i = 0 ;$i<$count1-1 ; $i++)
{
    $price[$i] = $input1[$i+1];
}
$input2 = explode(',',$weight);
$count2 = count($input2);
for($i = 0 ;$i<$count2-1 ; $i++)
{
    $weights[$i] = $input2[$i+1];
}
$input3 = explode(',',$Weight);
$count3 = count($input3);
for($i = 0 ;$i<$count3-1 ; $i++)
{
    $cap[$i] = $input3[$i+1];
}
// print_r($price);
// print_r($weights);
// print_r($cap);
$price = array_map('intval', $price);
 $rod_length = $cap[0];//original rod length
//  echo "<br>";
 sort($price);
 sort($weights);


//  $price=[4,59,85,76,84,40,94,54,45,90,79,10,14,46,54,20,11,70,26,86,32,77,43,62,21,17,53,19,3,4,93,71,16,52,63,12,22,43,51,8,48,71,66,28,58,79,65,61,64,20,29,65,62,49,53,55,84,43,61,42,85,2,9,99,10,62,46];
//  $length=[94,82,42,9,52,52,40,66,67,95,81,84,23,60,16,58,21,9,69,73,69,30,34,41,73,21,32,18,72,51,68,96,42,40,42,56,53,26,16,43,62,37,20,36,78,26,32,43,30,84,33,43,57,97,73,35,27,87,39,70,13,69,7,11,21,65,45];
//  $rod_length = 181;
// sort($length);
//   sort($price);
  
      
    // Build the table val[] in bottom  
    // up manner and return the last 
    // entry from the table 
    // echo"<table><tr>";
    // for($i=0;$i<=$rod_length;$i++){
    // if($i<1){
    //     // echo"<th>0</th>";
    // }
    // else
    // {
    //     $num=$i-2;
    //     echo"<th class='st2 $i'>$i</th>";
        
    // }

    // }
    $count = 0;
   

// A Dynamic Programming solution for 
// Rod cutting problem 
  
/* Returns the best obtainable price  
for a rod of length n and price[] as 
prices of different pieces */
function cutRod($price, $n) 
{ 
    $val = array_fill(0,$n,0);
    for($i=0;$i<=$n;$i++){
        $val[$i]=0;
    }

    echo "<h1>INPUTS</h1>";
    echo "<span><b>Rod Length:</b> $n</span>";
    echo"<br><br>";
    echo "<span><b>Lengths & Price</b></span>";
    echo "<table><tr>";
    for($i=1;$i<=$n;$i++){
        echo"<th class='matrix'>$i</td>";
    }
    echo"</tr>";
    echo"<tr>";
    for($i=0;$i<$n;$i++){
        echo"<td>$price[$i]</td>";
    }
    echo "</tr>";
    echo "</table>";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var i=0,j=0,k=0;
        // var count ="<?php ?>"
        // ar rodcutting_table=[];
        // console.log(rodcutting_table);v
        function print_array(){
               var element =  document.getElementsByClassName("hidden");
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
    <button id = 'show' onclick = "finalize()" >finalize</button><br>
    
</body>
    <?php
    $i=0; 
    $j=0; 
   
    
    // echo "<pre>";
    // print_R($val);
    // echo "</pre>";
     
    // Build the table val[] in bottom  
    // up manner and return the last 
    // entry from the table 
    echo "<h1>OUTPUT TABLE</h1>";
    echo"<table>";
    for ($i = 0; $i <= $n; $i++){
        echo "<th class='matrix'>{$i}</th>";
    }

    for ($i = 1; $i <= $n; $i++) 
    { 
        $max_val = PHP_INT_MIN; 
          
        for ($j = 0; $j < $i; $j++) {
            // echo " i : ". $i . "<br>";
            // echo " j : ". $j . "<br>";
            $max_val = max($max_val,$price[$j] + $val[$i-$j-1]);

        }
        
        $val[$i] = $max_val; 
        echo "<tr>";
        for ($j = 0; $j <= $n; $j++) {
            // echo " i : ". $i . "<br>";
            // echo " j : ". $j . "<br>";
            echo "<td class='hidden'>{$val[$j]}</td>";

        }
        echo "</tr>";
    }
    echo"</table>";
    echo "Maximum obtainable value is : " .$val[$n]; 
    }
	

	
 
  
// Driver program to test above functions 

cutRod($price,$rod);
      


?>



