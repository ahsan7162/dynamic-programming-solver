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
 $myfile = fopen("LIS.txt", "a+") or die("Unable to open file!");
 fwrite($myfile, $generate_string);
 fclose($myfile);
   $array = [];

}
}

$record = $_GET['f_index'];

$handle = fopen("LIS.txt", "r");
if ($handle)
{
    
    while (!feof($handle))
    {
        
        $buffer = fgets($handle);
        // echo $buffer . "<br>";
        if(strpos($buffer[0], $record) !== FALSE){
            // echo $buffer . "<br>";
            $matches = $buffer;
            break;
        }
    }
    fclose($handle);
}

// echo $matches[0];
$input = [];
$arr = [];
$input = explode(',',$matches);
$count = count($input);
for($i = 0 ;$i<$count-1 ; $i++)
{
    $arr[$i] = $input[$i+1];
}

$n=count($arr);
$i=$j=$max=0;
    $lis = array();
    echo "<table><tr>";
echo "<h1>INPUT TABLE</h1>";
for($i=0;$i<$n;$i++)
    {
        echo "<th class='matrix'>M{$i}</th>";
    }
    echo"</tr>";
    echo"<tr>";
    for($i=0;$i<$n;$i++)
    {
        echo "<td>{$arr[$i]}</td>";
    }
    echo"</tr></table>";
    
    /* Initialize LIS values for all indexes */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
function print_array(){
               var count ="<?php echo$count?>";
               console.log(count);
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
    echo "<h1>OUTPUT TABLE</h1>";
    echo "<table><tr>";
    for($i=0;$i<$n;$i++){
        echo"<th class='matrix'>$arr[$i]</th>";
    }
    echo "</tr>";   
    for($i=0;$i<$n;$i++){
        $lis[$i]=1;
        echo"<td>$lis[$i]</td>";
    }
    echo "</tr>";  
    /* Compute optimized LIS values in bottom up manner */
    for($i=1;$i<$n;$i++){
        echo "<tr>";
        for($j=0;$j<$i;$j++){
            if($arr[$i]>$arr[$j] && $lis[$i] < $lis[$j]+1){
                $lis[$i]=$lis[$j]+1;
            }
        }
        for($j=0;$j<$n;$j++){
            echo"<td class='hidden'>$lis[$j]</td>";
        }
        echo "</tr>";
            
    }
        
    /* Pick maximum of all LIS values */
    for($i=0;$i<$n;$i++){
        if($max<$lis[$i]){
            $max = $lis[$i];
            // echo "$max ";
        }
    }
        
            

echo "</table>"
 
?>   
<p>The maximum length of longest sequence is <?php echo"{$max}"?>