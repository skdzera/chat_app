<?php
    session_start();

    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output= "";

    $sql = "SELECT * FROM message WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) order by msg_id ASC";
        
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] === $outgoing_id){  // if this is equal to then he is a msg sender
                $output.='<div class="send_msg">
                            <div class="send">
                                <p>'.$row['msg'].'</p>
                            </div>
                        </div>';
            }else{  // he is a msg receiver
                $output.='<div class="rec_msg">
                            <div class="rec">
                                <p>'.$row['msg'].'</p>
                            </div>
                        </div>';
            }
        }

        echo $output;
    }

    

        

?>