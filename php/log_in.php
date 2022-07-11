<?php
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($pass)){
        $user_pass = md5($pass);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password= '{$user_pass}'");
        if(mysqli_num_rows($sql)>0){
            $status = 'Active';
            $row= mysqli_fetch_assoc($sql);
            $sql2 = mysqli_query($conn, "UPDATE users SET status='{$status}' WHERE unique_id= '{$row['unique_id']}'");

            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }else{
            echo "2-error";
        }
    }else{
        echo "1-error";
    }

?>