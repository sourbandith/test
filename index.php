<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Document</title>
  <style>
    .container{
      position: relative;
      top: 10rem;
    }
  </style>
</head>
<body>
<?php
 $servername = "ls-2c83f3bef30b5389ef663bfb2abbad4cb34d3ba1.c5qquews0ebp.ap-southeast-1.rds.amazonaws.com";
  $username = "dbmasteruser";
  $password = "L[#`pU7im3DaA:{3G75%,^=a<op`RXnL";
  $dbname = "dbmaster";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $result='';
// Check connection
try {
  if ($conn->connect_error) {
    echo '<script>
      Swal.fire({
        title: "Connection failed:",
        icon: "error"
      });
    </script>';
  }

  echo '<script>
    Swal.fire({
      title: "Connected Successfully",
      text: "",
      icon: "success"
    });
  </script>';

  $sql = "SELECT * FROM new_table";
  $result = $conn->query($sql);
  
  $conn->close();

} catch (\Throwable $th) {
  echo "ERRO =>".$th;
}
?>
  <div class="container">
    <div class="card outline-info">
      <div class="card-header">
        <em>MIS</em>
      </div>
      <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">FULL NAME</th>
            <th scope="col">FIRST NAME</th>
            <th scope="col">LAST NAME</th>
            <th scope="col">GROUP</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach($result as $r){
              echo '
                <tr>
                  <th scope="row">'.$r['id'].'</th>
                  <td>'.$r['full_name'].'</td>
                  <td>'.$r['first_name'].'</td>
                  <td>'.$r['last_name'].'</td>
                  <td>'.$r['group'].'</td>
                </tr>
              ';
            }
          ?>
        </tbody>
      </table>
      </div>
      <div class="card-footer">

      </div>
    </div>
  </div>
</div>

</body>
</html>
