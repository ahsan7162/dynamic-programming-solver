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
// A dynamic programming based PHP program to 
// find length of the shortest supersequence
if(isset($_POST['submit'])){
$input_1 = "owais";
$input_2 = "ahsan";
$input = $input_1 . $input_2;
$random1 = "";
$random2 = "";
$random_input = mt_rand(30,100);
// echo $random_input;
for($i = 0; $i < 10  ;$i++)
{
  for ($j =0 ;$j < $random_input; $j++)
  {
    $random1.= $input_1[mt_rand(0,strlen($input_1)-1)];
    $random2.= $input_2[mt_rand(0,strlen($input_2)-1)];
    // echo $random1 . "<br>";
    // echo $random2 . "<br>";
    
  }
  $generate_string = $i+1 . " ". $random1 . "," . "$random2" . "\n";
$myfile = fopen("SCS.txt", "a+") or die("Unable to open file!");
fwrite($myfile, $generate_string);
fclose($myfile);
  $random1= "";
  $random2= "";

}
}

$record = $_GET['f_index'];
$matches = array();
$handle = fopen("ld.txt", "r");
if ($handle)
{
    
    while (!feof($handle))
    {
        
        $buffer = fgets($handle);
        // echo $buffer . "<br>";
        if(strpos($buffer, $record) !== FALSE)
            $matches[] = $buffer;
    }
    fclose($handle);
}

//show results:
// echo $matches[0];
$string  = $matches[0];

$remove_index = substr($string,$record,strlen($string)-1);
// echo $remove_index;
$remove_comma = strstr($remove_index,',',true);
// echo $remove_comma . "<br>";
$comma_index = strpos($remove_index,',');
// echo $comma_index . "<br>";
$X = $remove_comma;
$Y = substr($remove_index ,$comma_index+1 , strlen($remove_index) -1);
$m = strlen($X);  
$n = strlen($Y)-1;

// Returns length of the shortest 
// supersequence of X and Y
echo "<h1>INPUT</h1>";
echo "<p><b>STRING 1:</b>    {$X}</p>";
echo "<p><b>STRING 2:</b>    {$Y}</p>";

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
               var str1 =  document.getElementsByClassName("st1");
               console.log(element);
               element[0].classList.remove("hidden");
               str1[k].classList.add("green");
               i++;
                console.log(k);
                if(i==count){
                    var remove =  document.getElementsByClassName("green");
                    remove[0].classList.remove("green");
                    k++;
                    i=0;
                }
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
echo"<table><tr>";
for($i=0;$i<$n+2;$i++){
    if($i<=1){
        echo"<th>0</th>";
    }
    else
    {
        $num=$i-2;
        echo"<th class='st2 $i'>$Y[$num]</th>";
    }

}
echo"</tr>";
    $dp = array_fill(0, $m + 1, 
          array_fill(0, $n + 1, 0));
 
    // Fill table in bottom up manner
    for ($i = 0; $i <= $m; $i++)
    {
        echo"<tr>";
        if($i===0)
        {
            echo"<th class='st1'>0</th>";
        }
        else
        {
            $num=$i-1;
            echo"<th class='st1 $i'>$X[$num]</th>";
        }
        for ($j = 0; $j <= $n; $j++)
        {
             
            // Below steps follow above recurrence
            if (!$i){
                $dp[$i][$j] = $j;
                echo "<td class='hidden'>{$dp[$i][$j]}</td>";
            }
            else if (!$j){
                $dp[$i][$j] = $i;
                echo "<td class='hidden'>{$dp[$i][$j]}</td>";
            }
            else if ($X[$i - 1] == $Y[$j - 1]){
                    $dp[$i][$j] = 1 + $dp[$i - 1][$j - 1];
                    echo "<td class='hidden'>{$dp[$i][$j]}</td>";
            }
            else{
                    $dp[$i][$j] = 1 + min($dp[$i - 1][$j], 
                                          $dp[$i][$j - 1]);
                    echo "<td class='hidden'>{$dp[$i][$j]}</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>
<p>The maximum length of shortest common sequence is <?php echo"{$dp[$m][$n]}"?>