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
$X = $_GET['str1'];
$Y = $_GET['str2']; 
$m = strlen($X);  
$n = strlen($Y);
 
  
// declaring the array for  
// storing the dp values  
  
/*Following steps build L[m+1][n+1]  
in bottom up fashion . 
Note: L[i][j] contains length of  
LCS of X[0..i-1] and Y[0..j-1] */
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
        var count ="<?php echo$n?>";
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
for ($i = 0; $i <= $m; $i++)  
{
    echo"<tr>";
        if($i===0)
        {
            echo"<th>0</th>";
        }
        else
        {
            $num=$i-1;
            echo"<th class='st1 $i'>$X[$num]</th>";
        }
for ($j = 0; $j <= $n; $j++)  
{  
    if ($i == 0 || $j == 0){
        $L[$i][$j] = 0;
        echo "<td>0</td>";
    }
      
  
    else if ($X[$i - 1] == $Y[$j - 1])  
    {
        $L[$i][$j] = $L[$i - 1][$j - 1] + 1;
        echo "<td class='$i $j hidden'>{$L[$i][$j]}</td>"; 
    }
  
    else{
    $L[$i][$j] = max($L[$i - 1][$j], 
                     $L[$i][$j - 1]); 
                     echo "<td class='$i $j hidden'>{$L[$i][$j]}</td>";
    }
}
echo "</tr>";  
}
echo"</table>";
  
?>
<p>The maximum length of longest sequence is <?php echo"{$L[$m][$n]}"?>
