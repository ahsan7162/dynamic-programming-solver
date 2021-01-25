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



$dict = 'abcdefghijklmnopqrstuvwxyz';
$input = ['syedmuhammadowais','ahsanimran'];
$array = [];
$count = 0;
$record_count = 0;
if(isset($_POST['submit'])){
for($i = 0; $i < 10  ;$i++)
{
    
    $random_input3 = mt_rand(0,1);
 
    // $random[$i] = $random_input;
    // echo $random_input . "<br>";
  for ($j =0 ;$j < 23; $j++)
  {
    $random_input1 = mt_rand(0,26);
    $random_input2 = mt_rand(0,26);
    if($random_input2>$random_input1){
    $array[$j] = substr($dict,$random_input1,$random_input2);
    }
    else
    {
        
    $array[$j] = substr($dict,$random_input2,$random_input1);
    }
    
    
    
  }
  echo substr($input[0],12,14);
  $array[23] = substr($input[0],0,4);
  $array[24] = substr($input[0],4,8);
  $array[25] = substr($input[0],12,14);

  

  
    $str = implode("," , $array);
  $w[] = $input[$random_input3];
$str2 = implode(",",$w);
  echo $str . "<br";
$generate_string1 = $i+1 . ",".  "$str"  . "\n";
$generate_string2 = $i+1 . ",".  "$str2"  . "\n";
$record_count++;
 $myfile = fopen("WB.txt", "a+") or die("Unable to open file!");
 fwrite($myfile, $generate_string1);
 fwrite($myfile, $generate_string2);
 fclose($myfile);
   $array = [];
   $w = [];

 }
}


$values = [];
$weight = [];
$record = $_GET['file_i'];

$handle = fopen("WB.txt", "r");
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
                break;
            }
            
            
        }
    }
    fclose($handle);
}
$input1 = [];
$input2 = [];

$val = [];//original array for values
$wt = [];//original array for weights

$input1 = explode(',',$values);
$count1 = count($input1);
for($i = 0 ;$i<$count1-1 ; $i++)
{
    $val[$i] = $input1[$i+1];
}
$input2 = explode(',',$weight);
// print_r($input2);
$count2 = count($input2);
// echo "count2 : ".$count2."<br>";
for($i = 0 ;$i<$count2-1 ; $i++)
{
    $wt[$i] = $input2[$i+1];
}

function dictionaryContains($word,$val) 
{ 
    
    //  echo "word : ".strlen($word)."<br>";
    // echo "word : ".$word . "<br>";
    
    $dictionary= $val;
    // echo "<pre>";
    //     print_r($dictionary);
    // echo "</pre>";
    //  echo implode(",",$dictionary)."<br>";
     $dictionary = preg_replace('/\s+/', '', $dictionary);
     echo "<pre>";
        // print_r($dictionary);
    echo "</pre>";
     $size =  count($dictionary);
    //  echo strlen($dictionary[0])."<br>";
     
    for ( $i = 0; $i < $size; $i++) 
    
        if (strcmp($dictionary[$i],$word) == 0)
        
            
           return true; 
        
    
    return false; 
}

function wordBreak($str,$val)
{
    
    $size = strlen($str);
   
    if($size == 0){
        return true;
    }
    // $wb = array_fill(0,$size+1,0);
    $wb[$size+1]=array(); 
	
	for ($i=0; $i <= $size; $i++) { 
		$wb[$i]=0;
	}
   

    for($i = 1;$i <= $size ; $i++)
    {
        
        if($wb[$i] == false && dictionaryContains(substr($str,0,$i),$val))
        {
            
            $wb[$i] = true;
        }
        if($wb[$i] == true)
        {
            if($i == $size)
            {
                return true;
            }
            for($j = $i+1 ; $j<=$size ;$j++)
            {
                if($wb[$j] == false && dictionaryContains(substr($str,$i,$j-$i),$val))
                {
                    $wb[$j] = true;
                }
                if($j == $size && $wb[$j] == 1)
                {
                    return true;
                }
            }
        }
    }
    return false;
}
$wt = implode("",$wt);
$wt = preg_replace('/\s+/', '', $wt);
// echo "wt : ". strlen($wt)."<br>" ;
// if(wordBreak($wt) == true )
// {
//     echo "yes\n";
// }
// else
// {
//     echo "no";
// }
echo "<h1 style='text-align: center;'>WORD BREAK</h1>";
echo "<h1>INPUT</h1>";
echo "<h2>Dictionary</h2>";
echo"<table>";
echo"<tr>";
for($i = 0 ; $i < count($val) ; $i++){
    echo "<th class='matrix'>$i</th>";
}
echo"</tr>";
echo"<tr>";
for($i = 0 ; $i < count($val) ; $i++){
    echo "<td>$val[$i] </td>";
}
echo"</tr>";
echo "</table>";
echo "<br><br><h2><b>Word to be found: </b>$wt</h2>";
if(wordBreak($wt,$val) == true )
{
    echo "<h1>OUTPUT</h1>";
    echo "<span>The word can be found in Dictionary</span>";
}
else
{
    echo "<span>The word cannot be found in Dictionary</span>";
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        // var i=0,j=0,k=0;
        // var count =""
        // function print_array(){
        //        var element =  document.getElementsByClassName("hidden");
        //        var str1 =  document.getElementsByClassName("st1");
        //        console.log(element);
        //        element[0].classList.remove("hidden");
        //        str1[k].classList.add("green");
        //        i++;
        //         console.log(k);
        //         if(i==count){
        //             var remove =  document.getElementsByClassName("green");
        //             remove[0].classList.remove("green");
        //             k++;
                //     i=0;
                // }
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
        //    }
</script>
</head>
<!-- <body>
    <button id = 'show' onclick = "print_array()" >Next Iterations</button>
    <form action = '' method = 'post'>
    <input type = 'submit' name = 'submit' value = 'generate text file'></input>
    <form>
</body> -->
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
    <!-- <button id = 'show' onclick = "print_array()" >Next Iterations</button>
    <form action = '' method = 'post'>
    <input type = 'submit' name = 'submit' value = 'generate text file'></input> -->
    <form>
</body>



</html>