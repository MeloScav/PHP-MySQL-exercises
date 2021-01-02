<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page confidentielle</title>
</head>
<body>
    <?php
    // Check if the value exists and if correct
        if(isset($_POST['password']) AND $_POST['password'] == "kangourou") {
            // If true: show page
    ?>
    
    <h1>Voici les codes secret</h1>
    <p><strong>H5TM-TW35-Y5E6-W58P-53FG-I8O5</strong></p>

    <?php
     } 
    ?>
</body>
</html>