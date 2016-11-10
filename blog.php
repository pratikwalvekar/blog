<html>
<head>

<html>

<link rel="stylesheet" type="text/css" href="index3.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<?php
session_start();
if(isset($_GET['username'])){
   $name = $_GET['username'];
}
if(isset($_GET['rate'])){
   $rating = $_GET['rate'];
}
if(isset($_GET['comment'])){
   $comment = $_GET['comment'];
}
$conn = mysqli_connect('localhost', 'root', '', 'blog');

if(isset($_GET['username']) && isset($_GET['rate']) && $_GET['rate'] != 0 && isset($_GET['comment'])){
   $addCommand = "INSERT INTO `blog`.`comments` (`name`, `rating`, `comment`) VALUES ('$name', '$rating', '$comment')";
   $review = mysqli_query($conn, $addCommand);
}


echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";
echo "<div class='col-sm-6'>
<h1>Technological Advances in Computing</h1>
<p><br></p>
<p><br></p>
<p><h2>Computer On Stick</h2></p>
<p><img src='computestick.jpg' class='img-responsive' alt='Computer Stick'></p>
<p>
Portable computers are nothing new. Every year, laptops, tablets, even smartphones get more powerful and more capable of handling most users daily computing needs. Still, two intriguing pieces of hardware released in 2015 took the entire hardware of a computer and squeezed it into a device slightly larger than a tube of lipstick, and for a fraction of a fraction of the price. Intel’s Compute Stick and the Asus Chromebit both turn any HDMI enabled screen into a computer. Neither device will blow you away with specs, but they open a wealth of possibilities for small businesses, education and more.
<p>
<p>
Ever since Intel released the Compute Stick, we’ve seen a rush of tiny PCs built into HDMI dongles. Some take advantage of the free-to-manufacturers Windows with Bing offering, while others use more traditional free operating systems such as Android and Linux. While a number of stick PCs use Intel’s reference design and specs, these options stray from the norm to provide extra value.
</p>
<p>
Intel launched the first iteration of the Compute Stick back in March of 2015, and ever since, a number of other stick PCs have picked up on the Intel’s standard specs and carried them. The most recent version of the Compute Stick is powered by a quad-core Intel Atom x5-Z8300 processor and 2GB of RAM, with 32GB of eMMC storage. As for connectivity, it attaches to a TV or monitor via HDMI, and utilizes a pair of USB ports — one 2.0 and one 3.0 — a MicroSD slot, and a micro-USB for power. It also features Bluetooth 4.0 for keyboard and mouse support, and 802.11ac Wi-Fi.
</p>
<p>
There’s also an older model, which is currently more readily available than the new one. It has an Intel Atom Z3735 processor, which offers compute performance similar to the Z8300, but slower integrated graphics. The old model also has one less USB port and only 802.11b/g/n Wi-Fi. It’s probably wise to wait for the new edition, unless you can grab the old one at a bargain price.
</p>
</div>";
echo "<div class='col-sm-3'></div>";
echo "</div>";



echo "<form action='blog.php' method='get'>";
echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";
echo "<div class='col-sm-6'>";
echo"<div class='col-sm-6'>";
echo"<label>Name</label>";
echo"<input type='text' class='form-control' id='name' name='username'>";
echo"</div>";
echo "</div>";
echo "<div class='col-sm-3'></div>";
echo "</div>";


echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";
echo "<div class='col-sm-6'>";
echo"<div class='col-sm-6'>";
echo"<label>Rating</label>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><input type='radio' name='rate' value='1'/>1</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><input type='radio' name='rate' value='2'/>2</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><input type='radio' name='rate' value='3'/>3</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><input type='radio' name='rate' value='4'/>4</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><input type='radio' name='rate' value='5'/>5</td>";
echo"</div>";
echo "</div>";
echo "<div class='col-sm-3'></div>";
echo "</div>";




echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";
echo "<div class='col-sm-6'>";
echo"<div class='col-sm-6'>";
echo"<label>Comment</label>";
echo"<textarea class='form-control' rows='5' id='comment' name='comment'></textarea>";
echo"</div>";
echo "</div>";
echo "<div class='col-sm-3'></div>";
echo "</div>";


echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";
echo "<div class='col-sm-6'>";
echo"<div class='col-sm-6'>";
echo"<button type='submit' class='btn btn-default'>Submit</button>";
echo"</div>";
echo "</div>";
echo "<div class='col-sm-3'></div>";
echo "</div>";

echo"</form>";







   $showCommand = "SELECT DISTINCT `name`, `rating`, `comment` FROM comments";
   $displayReview = mysqli_query($conn, $showCommand);

   if ($displayReview->num_rows > 0) {
      // output data of each row
      for($i=1;$i<= $displayReview->num_rows;$i++) {
         $row=$displayReview->fetch_assoc();
         $showName[$i] = $row['name'];
         $showRating[$i] = $row['rating'];
         $showComment[$i] = $row['comment'];
      }
   }

   
echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";
echo "<div class='col-sm-6'>";
for ($num=1;$num<=$displayReview->num_rows;$num++){
echo "<h3>".$showName[$num]."</h3>";
if ($showRating[$num] == 1) {
echo "<h4><span class='glyphicon glyphicon-star'></span></h4>";
}
if ($showRating[$num] == 2) {
echo "<h4><span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span></h4>";
}
if ($showRating[$num] == 3) {
echo "<h4><span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span></h4>";
}
if ($showRating[$num] == 4) {
echo "<h4><span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span></h4>";
}
if ($showRating[$num] == 5) {
echo "<h4><span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span> <span class='glyphicon glyphicon-star'></span></h4>";
}
echo "<p><i>".$showComment[$num]."</i></p>";
echo "<h6><hr></h6>";
}
echo "</div>";
echo "<div class='col-sm-3'></div>";
echo "</div>";
?>


</body>
</html>