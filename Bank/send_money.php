<?php 
    include "includes/header.php";
    $quary="SELECT * FROM customers ";
    $sender_id = $_GET['id'];
    $row1 = "SELECT * FROM customers where id=$sender_id";
    if($result1 = mysqli_query($conn, $row1)){
        if(mysqli_num_rows($result1) > 0){
            $sender_data = mysqli_fetch_array($result1);
        }
    }    
        $customers = $conn->query("SELECT * FROM customers");
        if (isset($_POST['submit'])) {
        $to = $_POST['to'];
        $row2 ="SELECT `balance` FROM `customers` WHERE id=$to";
        if($result2 = mysqli_query($conn, $row2)){
            if(mysqli_num_rows($result2) > 0){
                $selected = mysqli_fetch_array($result2);
            }
        }    
        $row3 = "SELECT `balance` FROM `customers` WHERE id=$sender_id";
        if($result3 = mysqli_query($conn, $row3)){
            if(mysqli_num_rows($result3) > 0){
                $sender = mysqli_fetch_array($result3);
            }
        }    
        $row4 = "SELECT `name` FROM `customers` WHERE id=$sender_id";
        if($result4 = mysqli_query($conn, $row4)){
            if(mysqli_num_rows($result4) > 0){
                $sender_name = mysqli_fetch_array($result4);
            }
        }    
        $row5 = "SELECT `name` FROM `customers` WHERE id=$to";
        if($result5 = mysqli_query($conn, $row5)){
            if(mysqli_num_rows($result5) > 0){
                $selected_name = mysqli_fetch_array($result5);
            }
        }    
        $amount = $_POST['amount'];
        $receiverBalance = $selected[0] + $amount;
        $senderBalance = $sender[0] - $amount;
        if ($amount <= 0) {
            echo '<script> alert("The Amount is Negative or Zero")</script>';
        } elseif ($amount > $sender[0]) {
            echo '<script> alert("Your Balance is not Enough")</script>';
        } else {
            $senderUpdate = " UPDATE customers
            SET `balance` = $senderBalance
            WHERE `id` =$sender_id";
            $conn->query($senderUpdate);
            $receiverUpdate = " UPDATE customers
            SET `balance` = $receiverBalance
            WHERE `id` =$to";
            $conn->query($receiverUpdate);
            $sql = "INSERT INTO send_money (sender,receiver,balance) VALUES('$sender_name[0]','$selected_name[0]','$amount')";
            $conn->query($sql);
            header ("Location: fromTo.php");
        }
        $amount = 0;
    }
?>

        <title>Send Money</title>
    </header>
    <body>
    <!--Transfer Money Form-->
    <div class = "form">
        <form method="POST">
        <div>
            <label><b>Send to: </b></label>
            <select name="to" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                    foreach ($customers as $row) {
                    ?>
                    <option value="<?php echo $row['id']; ?>">
                    <?php
                    $receiver_name = $row['name'];
                    $receiver_balance = $row['balance'];
                    echo "{$receiver_name} (balance : {$receiver_balance})";
                    ?>
                    </option> 
                    <?php
                    }
                    ?>
            </select>
        </div>
        
        <div>
                <label><b>Amount: </b></label>
                <input name="amount" type="text" required>
        </div>

        <div>
                <button name="submit" type="submit" class="submit">Send</button>
        </div>
    </form>
    </div>    
</body>
</html>