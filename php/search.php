<?php
    session_start();
    include_once "config.php";

    $sval = mysqli_real_escape_string($conn, $_POST['search_val']);

    $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE name LIKE '%{$sval}%' AND (NOT unique_id= {$_SESSION['unique_id']})");
    $output ="";
    if(mysqli_num_rows($sql1)>0){
        while($row = mysqli_fetch_assoc($sql1)){
            $output.= '<a href="#" id="'.$row['unique_id'].'">
                        <div class="fd">
                            <div class="img">
                                <img src="image/'.$row['img'].'" alt="fd">
                            </div>
                            <div class="fd_name">'.$row['name'].'</div>
                            <div class="'.$row['status'].'"></div>
                        </div>
                        </a>';
        }
    }

    echo $output;

?>