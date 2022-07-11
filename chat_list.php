<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/chat_list.css">
    <title>Hello, world!</title>
</head>
<body>
    <?php
        include_once "php/config.php";
        $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql1)>0){
            $row = mysqli_fetch_assoc($sql1);
        }
    ?>
    <div class="page">
        <div class="profile">
            <div class="img">
                <img src="image/<?php echo $row['img']; ?>" alt="">
            </div>
            <div class="name">
                <h3><?php echo $row['name']; ?></h3>
            </div>
        </div>
        <div class="friend_list">
            <div class="search">
                <input type="text" name="" id="">
                <button type="submit"><img src="image/search_icon.png" alt=""></button>
            </div>
            <div class="all_friend">
                
            </div>
        </div>
    </div>
   
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
<script src="javasc/chat_list.js"></script>
</body>
</html>