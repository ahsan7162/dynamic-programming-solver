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
.hidden,.hidden1{
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
</style>
<?php
error_reporting(E_ALL ^ E_NOTICE); 
$count = 0;
$values = [];
$weight = [];
$Weight = [];

$array1 = [];
$array1 = [];
$random = [];
$weight = ['260','181'];


if(isset($_POST['submit'])){
for($i = 0; $i < 10  ;$i++)
{
    $random_input = mt_rand(30,100);
    $random_weight = mt_rand(0,1);
    $random[$i] = $random_input;
    // echo $random_input ;
    
  for ($j =0 ;$j < $random_input; $j++)
  {
    $array1[$j] = mt_rand(1,100);
    $array2[$j] = mt_rand(1,100);
    
    
    
  }
  $str = implode("," , $array1);
  $str1 = implode("," , $array2);
  $w[] = $weight[$random_weight];
  $str2 = implode(",",$w);
//   echo $str . "<br";

$generate_string1 = $i+1 . ",".  "$str"  . "\n";
$generate_string2 = $i+1 . ",".  "$str1"  . "\n";
$generate_string3 = $i+1 . ",".  "$str2"  . "\n";
 $myfile = fopen("KP.txt", "a+") or die("Unable to open file!");
 fwrite($myfile, $generate_string1);
 fwrite($myfile, $generate_string2);
 fwrite($myfile, $generate_string3);
 fclose($myfile);
   $array1 = [];
   $array2 = [];
   $w = [];
}
}
// "end"

$record = $_GET["file_i"];

$handle = fopen("KP.txt", "r");
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
$val = [];//original array for values
$wt = [];//original array for weights
$value = [1,2,3,4,5];
$we = [1,2,3,4,6];
$length = 8;
$cap = [];
$input1 = explode(',', $values);
$count1 = count($input1);
for($i = 0 ;$i<$count1-1 ; $i++)
{
    $val[$i] = $input1[$i+1];
}
$input2 = explode(',',$weight);
$count2 = count($input2);
for($i = 0 ;$i<$count2-1 ; $i++)
{
    $wt[$i] = $input2[$i+1];
}
$input3 = explode(',',$Weight);
$count3 = count($input3);
for($i = 0 ;$i<$count3-1 ; $i++)
{
    $cap[$i] = $input3[$i+1];
}
// print_r($val);
//  print_r($wt);
 echo "<br>";
// print_r($cap);
$W = $cap[0];//original capacity

$K = array(array());
echo "<h1>INPUTS</h1>";
echo "<table>";
echo"<tr>";
for($i=0;$i<count($val);$i++){
    echo "<th class='matrix'>V$i</th>";
}
echo"</tr>";
echo"<tr>";
for($i=0;$i<count($val);$i++){
    echo "<td>{$val[$i]}</td>";
}
echo"<tr>";
for($i=0;$i<count($val);$i++){
    echo "<th class='matrix'>W$i</th>";
}
echo"</tr>";
echo"<tr>";
for($i=0;$i<count($val);$i++){
    echo "<td>{$wt[$i]}</td>";
}
echo"</tr>";
echo "</table>";
echo "<h3>Total weight allowed: $W</h3>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var i=0,j=0,k=0;
        var count ="<?php echo $count2;?>"
        function print_array(){
               var element =  document.getElementsByClassName("hidden");
               var element1 =  document.getElementsByClassName("hidden1");
               console.log(element);
               element[0].classList.remove("hidden");
               element1[0].classList.remove("hidden1");
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
            var element1 =  document.getElementsByClassName("hidden1");
            var count=element.length;
            for(var i = 0 ; i < count ; i++){
                element[0].classList.remove("hidden");
                element1[0].classList.remove("hidden1");
            }
        }
</script>
    <br><br><button id = 'show' onclick = "print_array()" >Next Iterations</button>
    <button id = 'show' onclick = "finalize()" >finalize</button><br>
</body>



</html>

<?php
echo "<h1>OUTPUT</h1>";
echo"<table><tr>";
for($i=0;$i<=$W;$i++){
    if($i<1){
        echo"<th>0</th>";
    }
    else
    {
        $num=$i-2;
        echo"<th class='st2 $i'>$i</th>";
        
    }

}
echo "</tr>";
// echo "<tr>";
// for($i=0;$i<=$Capacity;$i++){
//     if($i<=$Capacity){
//         echo"<th>0</th>";
//     }
    
    
// }


//  echo"</tr>";
// echo "val array : ". "<br>";


// print_r($val);
// echo $count2;
for ($i = 0; $i <= $count2-1; $i++) 
    { 
        echo "<tr>";
        for ($w = 0; $w <= $W; $w++) 
        { 
            if ($i == 0 || $w == 0){
                $K[$i][$w] = 0; 
                echo "<td>0</td>";
            }
            else if ($wt[$i-1] <= $w) {
                
                    $K[$i][$w] = max($val[$i - 1] +   $K[$i - 1][$w -  $wt[$i - 1]],  
                                     $K[$i - 1][$w]); 
                                     echo "<td class='$i $w hidden'>{$K[$i][$w]}</td>"; 
            }
            else
            {
                    $K[$i][$w] = $K[$i - 1][$w]; 
                    echo "<td class='$i $w hidden'>{$K[$i][$w]}</td>";
            }
        } 
    }
      echo "</tr>";
 echo"</table>";
$k_t=array(array());
for($i = 0; $i <= $count2-1; $i++){
    for($j = 0; $j <= $W; $j++){
        if($i===0){
            $k_t[0][$j]=0;
        }
        else{
            if($K[$i-1][$j]!==$K[$i][$j]){
                $k_t[$i][$j]=1; 
            }
            else{
                $k_t[$i][$j]=0;
            }
        }
    }
}
echo "<h2>KEEP TABLE</h2>";
echo "<table>";
for($i = 0; $i <= $count2-1; $i++){
    echo "<tr>";
    for($j = 0; $j <= $W; $j++){
        if($j==0||$i==0){
            echo "<td>{$k_t[$i][$j]}</td>";
        }
        else
        echo "<td class='hidden1'>{$k_t[$i][$j]}</td>";
    }
    echo "</tr>";
}
echo "</table>";
// $ke2=$W;
// echo "$ke";
// $ke1=array();
// $j=0;
// echo "{$k_t[3][10]}";
// for($i=count($wt);$i>=0;$i--){
//     // echo "{$k_t[$i][$ke]} ";
//     // if($i==3 &&  $ke==4){
//     //     echo "{$k_t[3][4]}";
//     // }
//     if($k_t[$i][$ke-1]===1){
//         $ke1[$j]=$i-1;
//         // echo "$ke1[$j]";
//         $j++;
//         $ke=$ke-$wt[$i-1];
//         // echo "$ke ";
//         // echo "$i <br>";
//         // echo "$ke ";
//     }
// }
// // print_r($ke1);
// print_r($k_t);


?>
