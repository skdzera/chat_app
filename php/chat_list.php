<?php
    session_start();
    include_once "config.php";

    $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE (NOT unique_id= {$_SESSION['unique_id']}) ORDER BY name");
    $output = "";
    if(mysqli_num_rows($sql1)){
        while($row = mysqli_fetch_assoc($sql1)){
            $output.= '<a href="chat.php?user_id='.$row['unique_id'].'" >
                            <div class="fd">
                                <div class="img">
                                    <img src="image/'.$row['img'].'" alt="fd">
                                </div>
                                <div class="fd_name">'.$row['name'].'</div>
                                <div class="online">'.$row['status'].'</div>
                            </div>
                        </a>';
        }
    }

    echo $output;

?>