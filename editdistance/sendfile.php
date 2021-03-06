<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit distance</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h3{
            color: white;
            font-size: 30px;
        }
        label{
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        select{
            background-color: #202020;
            color: white;
            font-size: 20px;
        }
        input{
            background-color: #202020;
            color: white;
            font-size: 20px;
            border: 0.5px solid white;
        }
        button{
    height: 30px;
    width: 100px;
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
</head>
<body style="background-color:#202020;">
<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="../index.php">AHSAN/OWAIS</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="../index.php">Algorithms</a></li>
                </ul>
            </div>
            
        </div>
    </nav>
    <section class="home">
    </section>
    <h1 style="font-size: 50px; text-align:center;color:white;">LEVENSHTEIN DISTANCE (EDIT DISTANCE)</h1>
    <div class="inputs">
    <h3>Select Input Number</h3>
    <form action="edit_distance_f.php">
        <select name="f_index">
            <optgroup>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </optgroup>
        </select>
        <button type="submit">submit</button>
    </form>
    <h3>OR</h3>
    <div>
    <h3>Enter Two Strings</h3>
    <form action="edit_distance_u.php">
    <label>String1</label><br><input type="text" name="str1" required></input><br><br>
    <label>String2</label><br><input type="text" name="str2" required></input><br><br>
        <button type="submit">submit</button>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
</body>
</html>