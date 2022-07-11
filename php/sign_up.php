<?php

    session_start();
    include_once "config.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $re_pass = mysqli_real_escape_string($conn, $_POST['re_password']);
    $dob = mysqli_real_escape_string($conn, $_POST['date']);
    $dob = date("Y-m-d", strtotime($dob));
    // $dob_s = $dob;

    if(!empty($name) && !empty($email) && !empty($pass) && !empty($re_pass) && !empty($dob) && ($pass === $re_pass)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $name.$dob.$img_name;
                            $new_img_name = str_replace('/','_',$new_img_name);
                            $new_img_name = str_replace(' ','_',$new_img_name);
                            $new_img_name = str_replace('-','_',$new_img_name);
                            if(move_uploaded_file($tmp_name,"../image/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $encrypt_pass = md5($pass);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, email, password, dbarth, img, status)
                                VALUES ({$ran_id}, '{$name}', '{$email}', '{$encrypt_pass}','{$dob}' ,'{$new_img_name}', '{$status}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "Email is not valid";
        }
    }else{
        echo "fill all input";
    }


?>