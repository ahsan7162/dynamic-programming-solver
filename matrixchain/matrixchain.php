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
// Dynamic Programming Python implementation 
// of Matrix Chain Multiplication. 

// See the Cormen book for details of the 
// following algorithm Matrix Ai has 
// dimension p[i-1] x p[i] for i = 1..n 
function MatrixChainOrder($p, $n) 
{ 
	/* For simplicity of the program, one 
	extra row and one extra column are 
	allocated in m[][]. 0th row and 0th 
    column of m[][] are not used */
    $m = array_fill(0, $n, array_fill(0, $n, 0));
    $k1 = array_fill(0, $n, array_fill(0, $n, 0)); 

	/* m[i, j] = Minimum number of scalar 
	multiplications needed to compute the 
	matrix A[i]A[i+1]...A[j] = A[i..j] where 
	dimension of A[i] is p[i-1] x p[i] */

	// L is chain length. 
	for ($L = 2; $L < $n; $L++) 
	{ 
		for ($i = 1; $i < $n - $L + 1; $i++) 
		{ 
			$j = $i + $L - 1; 
			if($j == $n) 
				continue; 
			$m[$i][$j] = PHP_INT_MAX; 
			for ($k = $i; $k <= $j - 1; $k++) 
			{ 
				// q = cost/scalar multiplications 
				$q = $m[$i][$k] + $m[$k + 1][$j] + 
					$p[$i - 1] * $p[$k] * $p[$j]; 
				if ($q < $m[$i][$j]){
                    $m[$i][$j] = $q;
                    $k1[$i][$j]=$k;
                }
					 
			} 
		} 
    }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var i=1,j=1,k=0;
        var count="<?php echo$n?>";
        var ini_i=i;
        var c=1;
function print_array(){
               $('.'+i+j).removeClass("hidden");
            //    element[0].classList.remove("hidden");
            $('.'+i+j).removeClass("hidden1");
               if(i==count-c){
                    i=ini_i;
                    j=i+c;
                    c++;
                    i--;
                    j--;
               }
               i++;
               j++;
               console.log(i);
               
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
    <button id = 'show' onclick = "print_array()" >Next Iterations</button>
    <button id = 'show' onclick = "finalize()" >finalize</button><br>
</body>



</html>
<?php
    echo"<h1>M-TABLE</h1>";
    echo "<div><table>";
    echo "<tr>";
    for($i=1;$i<$n;$i++)
    {
        echo "<th class='matrix'>M{$i}</th>";
    }
    echo "</tr>";
    for ($i =1; $i < $n; $i++) 
    { echo"<tr>";
        for ($j = 1; $j < $n; $j++) 
        { 
            if ($i > $j) 
            { 
                echo "<td>{$m[$i][$j]}</td>" ; 
            } 
            else
            echo "<td class='hidden $i$j'>{$m[$i][$j]}</td>" ;  
        }
        echo"</tr>"; 
    }
    echo"</table></div>";

    echo"<h1>K-TABLE</h1>";

    echo "<div><table class='k'>";
    echo "<tr>";
    for($i=1;$i<$n;$i++)
    {
        echo "<th class='matrix'>M{$i}</th>";
    }
    echo "</tr>";
    for ($i =1; $i < $n; $i++) 
    { echo"<tr>";
        for ($j = 1; $j < $n; $j++) 
        { 
            if ($i > $j) 
            { 
                echo "<td>{$k1[$i][$j]}</td>" ; 
            } 
            else
            echo "<td class='hidden1 $i$j'>{$k1[$i][$j]}</td>" ;  
        }
        echo"</tr>"; 
    }
    echo"</table></div>";
	return $m[1][$n-1];
} 

if(isset($_POST['submit'])){
for($i = 0; $i < 10  ;$i++)
{
    $random_input = mt_rand(30,100);
    $random[$i] = $random_input;
    // echo $random_input . "<br>";
  for ($j =0 ;$j < $random_input; $j++)
  {
    $array[$j] = mt_rand(0,100);
    
    
    
  }
  $str = implode("," , $array);
//   echo $str . "<br";
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
error_reporting(E_ALL ^ E_WARNING);//remove all warnings

//converting string array in integer
$result_array = array();
$strings_array = explode(',', $arr);

  foreach ($arr as $each_number) {
      $result_array[] = (int) $each_number;
  }
 
$size = sizeof($result_array); 


//print input array
echo "<table><tr>";
echo "<h1>INPUT TABLE</h1>";
for($i=1;$i<$size;$i++)
    {
        echo "<th class='matrix'>M{$i}</th>";
    }
    echo"</tr>";
    echo"<tr>";
    for($i=1;$i<$size;$i++)
    {
        echo "<td>{$result_array[$i]}</td>";
    }
    echo"</tr></table>";

echo"<p>Minimum number of multiplications is ". 
            MatrixChainOrder($result_array, $size); 
            echo"</p>";
            

// This code is contributed by Mukul Singh 
?> 