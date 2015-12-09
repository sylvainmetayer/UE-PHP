<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>

  <script type ="text/javascript">
    document.write("JS contient du PHP : "+ "<?php echo date("d/m/y h:i:s"); ?>" +" .");
  </script>

  <script type="text/javascript">
    <?php
    $date = date("d/m/y");
      echo "document.write(\"PHP génère du JS : \"+ $date +\" .\");";
    ?>
  </script>
</body>
