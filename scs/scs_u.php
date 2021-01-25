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

// Returns length of the shortest 
// supersequence of X and Y
echo "<h1>INPUT</h1>";
echo "<p><b>STRING 1:</b>    {$X}</p>";
echo "<p><b>STRING 2:</b>    {$Y}</p>";

echo "<h1>OUTPUT TABLE</h1>";?>
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
    <button id = 'show' onclick = "finalize()" >Finalize</button><br>
    
</body>



</html>
<?php
echo"<table><tr>";
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