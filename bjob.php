<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

</style>
</head>

<body>
<h2>Busqueda de Trabajo</h2>

<div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<?php
error_reporting(E_ALL);
$data = file_get_contents('https://jobs.github.com/positions.json?description=python&location=new+york');
$job_lists = json_decode($data, TRUE);

if (is_array($job_lists) || is_object($job_lists))
{
?>  
<div class="caja">


<?php
  foreach ($job_lists as $job_list)
    {

 print "<div class='row'>";
 print "<div class='column' style='background-color:#aaa;'>";
 print "<h2>".$job_list['company']."</h2>";
 print "<p>".$job_list['company_url']."</p>";
  print "<p>".$job_list['location']."</p>";
  print "<p>".$job_list['title']."</p>";
  print "<text>".$job_list['description']."</text>";
  print "</div>"; 
  


  
  

print "</div>"; 
  
 }


}
?>  


</div>
 
<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

</script>

</body>
</html>
