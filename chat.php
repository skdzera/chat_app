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
      <link rel="stylesheet" href="css/chat.css">
      
      <title>Hello, world!</title>
</head>
<body>
    <?php
        include_once "php/config.php";

        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

        $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if(mysqli_num_rows($sql1)>0){
            $row = mysqli_fetch_assoc($sql1);
        }


    ?>

    <div class="chat_page">
        <div class="profile">
            <div class="img">
                <img src="image/<?php echo $row['img']; ?>" alt="">
            </div>
            <div class="status">
                <div class="name"><?php echo $row['name']; ?></div>
                <div class="status"><?php echo $row['status']; ?></div>
            </div>
        </div>
        <div class="chat_space">
                
                
                
        </div>
        <form class="msg_send" autocomplete="off" action="chat.php">
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <div class="type_msg">
                <input name="message" type="text">
            </div>
            <div class="msg_send_img">
                <button>
                    <img src="image/send_icon.jpg" alt="">
                </button>
            </div>
        </form>
    </div> 

   


    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="javasc/chat_list.js" ></script> -->
<script src="javasc/chat.js" ></script>
    
</body>
</html>