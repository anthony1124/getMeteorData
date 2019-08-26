 <html>
<head>
	
	
	<script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet href="css/bootstrap.min.css">
  <script src="js/jquery-3.4.1.js"></script>

<style type="text/css">

body {
font-family: Arial, Verdana, Tahoma;
}

label {
background-color: #c4c4c4;
padding: 10px;
}

</style>


<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getMeteor.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script src="js/jquery-3.4.1.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#MeteorTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<div>



<br>
<p>&nbsp;</p>
</div>
<form>


<div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Dropdown button
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Link 1</a>
    <a class="dropdown-item" href="#">Link 2</a>
    <a class="dropdown-item" href="#">Link 3</a>
  </div>
</div>

<p><label>Select a Classification
<select name="recclass" onChange="showUser(this.value)">
  <option value="">Select a Class:</option>
  <option value="L5">L5</option>
  <option value="H5">H5</option>
  <option value="L6">L6</option>
  <option value="Unknown">Unknown</option>
  <option value="LL5">LL5</option>
  <option value="H4">H4</option>
  </select></label></p>

<a href="classification-definitions.php">Classification Definitions</a>

  <h2>Filterable Table</h2>
<p>ie: 1985</p>  
<input id="myInput" type="text" placeholder="Search..">
  


</form>

<br>

<div id="txtHint"></div>

</body>
</html>