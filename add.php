
<?php
  require ("database.php");
  $error = null;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["name"]) || empty($_POST["phone_number"])){
      $error = "Los campos no deben estar vacíos";
    }elseif(strlen($_POST["phone_number"]) < 9){
      $error = "El número de telefono debe ser de 9 digitos";
    }
    else{
      $name = $_POST["name"];
      $phoneNumber = $_POST["phone_number"];
      
      $statement = $conn->prepare("insert into contacts(name, phone_number) values (:name,:phone_number)");
      $statement->bindParam(":name",$_POST["name"]);
      $statement->bindParam(":phone_number",$_POST["phone_number"]);
      $statement->execute();
      header("Location: index.php");
    }
  }
  require "./partials/header.php";
?>

    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">
              <?php
              if($error != null){
              ?>
                <div class="text-danger">
                <?= $error ?>
                </div>
              <?php
                }
              ?>
              <form method="POST" action="add.php">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
    
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"  autocomplete="name" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
    
                  <div class="col-md-6">
                    <input id="phone_number" type="tel" class="form-control" name="phone_number"  autocomplete="phone_number" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
require "./partials/footer.php";
?>
