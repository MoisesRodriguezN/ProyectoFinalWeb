<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <form enctype="multipart/form-data" action="pruebaSubida.php" method="POST">
        <input name="imagen" type="file" />
        <input type="submit" value="Subir archivo" />
      </form> 
        <?php
          move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/" . $_FILES["imagen"]["name"]);
          echo $_FILES["imagen"]["name"]
        ?>
    </body>
</html>
