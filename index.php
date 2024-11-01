<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  </head>
  <body>

    <select id="selectDate" name="" onchange="handleChange()">
      <option value="" selected>-</option>
      <?php
        require_once("database_connection.php");
        $query = "SELECT * FROM seats order by date";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)) {
          ?>
            <option value="<?php echo $row['date'] ?> "> <?php echo $row['date'] ?></option>
          <?php
          }
        }
       ?>
    </select>
    <input id="num_input" type="number" onchange="handleChange()">
  </body>
</html>


<script type="text/javascript">
  function handleChange(){

    let date = document.getElementById("selectDate").value;
    console.log(date);
    $.ajax({
      url:"query.php?date=" + date
    }).done(function(e){
      document.getElementById("num_input").setAttribute("max",e);
    })
  }
</script>