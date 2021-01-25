<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="index.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<!--  -->

</head>
<body style="background-color:#202020;">
<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="index.php">AHSAN/OWAIS</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="index.php">Algorithms</a></li>
                </ul>
            </div>
            
        </div>
    </nav>

    <section class="home">
    </section>
    <div >
        <!-- just to make scrolling effect possible -->
			<div class="main">
        <a href="lcs/sendfile.php"><button class="button" type="submit">Longest Common Subsequence</button></a><br>
        <a href="scs/sendfile.php"><button class="button" type="submit">Shortest Common SuperSequence</button></a><br>
        <a href="editdistance/sendfile.php"><button class="button" type="submit">Levenshtein Distance</button></a><br>
        <a href="lis/sendfile.php"><button class="button" type="submit">Longest Increasing Subsequence</button></a><br>
        <a href="matrixchain/sendfile.php"><button class="button" type="submit">Matrix Chain Multiplication</button></a> <br>
        <a href="knapsack/send_file.php"><button class="button" type="submit">0-1 Knapscack Problem</button></a><br>
        <a href="partition_problem/send_file.php"><button class="button" type="submit">Partition-problem</button></a><br>
        <a href="CuttingRod/send_file.php"><button class="button" type="submit">Rod Cutting Problem</button></a><br>
        <a href="coinchange/sendfile.php"><button class="button" type="submit">Coin Change Problem</button></a><br>
        <a href="WordBreak/send_file.php"><button class="button" type="submit">Word Break Problem</button></a><br>

      </div>
    </div>

<!-- Jquery needed -->
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
