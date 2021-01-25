
<style>
    .st2{
        background-color: lightskyblue;
        
    }
    body{
        background-color:#202020;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .matrix{
        background-color: #03065a;
    }
table{
    text-align: center;
  width: 100%;
  background-color: #202020;
  font-size: 18px;
  color: white;
  text-transform: uppercase;
  border-collapse: collapse;

}
h1{
    color: white;
    background-color: #202020;
    text-align: center;
}
td{
    color: 	#C0C0C0;
}
tr,td,th{
    border:0.5px solid;
    border-color: #C0C0C0;
    padding-left: 10px;
  padding-right: 10px;
}
.hidden{
    visibility: hidden;
}
.hidden1{
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
// A Dynamic Programming based 
// PHP program to find minimum 
// of coins to make a given 
// change V.
 
// m is size of coins 
// array (number of different coins)
function minCoins($coins, $m, $V)
{
    // table[i] will be storing the
    // minimum number of coins
    // required for i value. So 
    // table[V] will have result
    $table = array_fill(0, $m+1, array_fill(0, $V+1, 0));
 
    // Initialize all table 
    // values as Infinite
    for ($i = 1; $i <= $V; $i++)
        $table[0][$i] = PHP_INT_MAX;
        

    // Compute minimum coins 
    // required for all
    // values from 1 to V
    for ($i = 1; $i <= $m; $i++)
    {
        // Go through all coins
        // smaller than i
        for ($j = 1; $j <= $V; $j++){
            if($coins[$i-1]>$j){
                $num=$i-1;
                $table[$i][$j]=$table[$num][$j];
            }
            else
            {
                $table[$i][$j]=min($table[$i-1][$j],(1+$table[$i][$j-$coins[$i-1]]));
            }
        }
    }
    echo "<h1>COIN CHANGE PROBLEM</h1>";
    echo "<h4>INPUT COINS</h4>";
    for($i=0;$i<$m;$i++){
        echo "{$coins[$i]}  ";
    }
    echo "<br><br>";
    echo "<h4>REQUIRED CHANGE</h4> ",$V,"<br><br>";
    echo "<h1>OUTPUT TABLE</h1>";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var i=0,j=0,k=0;
        var count ="<?php echo$m?>";
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



</html>
<?php
    // print_r($table);
    echo "<br>";
    echo "<table><tr>";
    for($i = 0;$i <=$V; $i++)
    {
        if($i===0){
            echo "<th class='matrix'>coins</th>"; 
        }
        else
        echo "<th class='matrix'>{$i}</th>";
    }
    echo "</tr>";
    for($i=1;$i<=$m;$i++)
    {
        echo"<tr>";
        echo"<th>{$coins[$i-1]}</th>";
        for ($j = 1; $j <= $V; $j++){
            
            
                echo"<td class='hidden'>{$table[$i][$j]}</td>";
            
            
        } 
        echo"</tr>";
    }
    echo "</table>";
    echo "<p class='hidden'>Minimum coins required is ", $table[$m][$V],"</p>";
}
 
// Driver Code
// $coins = array(3, 5, 1, 7);
// sort($coins);
// $m = sizeof($coins);
// $V = 38;
$values = [];
$weight = [];
$count = 0;
$array = [];
$random = [];
$weight = ['260','181'];

if(isset($_POST['submit'])){
for($i = 0; $i < 10  ;$i++)
{
    $random_input = mt_rand(30,100);
    $random[$i] = $random_input;
    $random_weight = mt_rand(0,1);
    //echo $random_input . "<br>";
  for ($j =0 ;$j < $random_input; $j++)
  {
    $array[$j] = mt_rand(0,100);
    
    
    
  }
  $str = implode("," , $array);
  $w[] = $weight[$random_weight];
  $str2 = implode(",",$w);
  echo $str . "<br";
$generate_string1 = $i+1 . ",".  "$str"  . "\n";
$generate_string2 = $i+1 . ",".  "$str2"  . "\n";
 $myfile = fopen("CCP.txt", "a+") or die("Unable to open file!");
 fwrite($myfile, $generate_string1);
 fwrite($myfile, $generate_string2);
 fclose($myfile);
   $array = [];
   $w = [];
}
}


$record = $_GET['f_index'];

error_reporting(E_ALL ^ E_WARNING);//remove all warnings
$handle = fopen("CCP.txt", "r");
if ($handle)
{
    
    while (!feof($handle))
    {
        
        $buffer = fgets($handle);
      
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

$price = [];//original array for price
$weights = [];

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

// print_r($price);
$m = count($price);
sort($price);
$result_array = array();
$strings_array = explode(',', $price);

  foreach ($price as $each_number) {
      $result_array[] = (int) $each_number;
  }
 
$size = sizeof($result_array);
$V = (int)$weights[0];
minCoins($result_array, $m, $V);
 
// This code is contributed by ajit
?>