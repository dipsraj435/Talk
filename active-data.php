<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        $record = $row['unique_id'];
        $output .= '<div class="subject" style="display: flex;margin-bottom:10px;">
                        <div>
                            <img src="php/images/'. $row['img'] . '" alt="image"
                                style="height: 50px;width:50px;border-radius:40px;">
                        </div>
                        <div style="margin-left:12px;">
                            <h3 style="font-size: 18px;color:#333333;">
                                <a href="../CLONE/php/other-profile.php?record=' . $row['unique_id'] . '" style="color: #333333;"><span>'. $row['fname']. " " . $row['lname'] . '</span></a>
                            </h3>
                            <h4 style="color: green;">Online Now</h4>
                        </div>
                            <a href="chat.php?user_id=' . $row['unique_id'] . '"
                                style="border-radius: 40px;background-color: #333333;height: 30px;width: 80px;margin-top: 10px;text-align: center;margin-left: 10px;">
                                <i style="font-size:18px;color:red;margin-top: 5px;" class="fas fa-comment-dots"> Chat</i></a>
                    </div>';
    }
