<?php include "includes/header.php" ?>

        <title>Transfer History</title>
    </header>
    <body>
    <h1 style="color: black;">Transfer History</h1>
    <table>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Amount</th>
                <th>Date and Time</th>
            </tr>
            <?php
                $sql = "SELECT * FROM send_money";
                $result = $conn->query($sql);
                if(!$result){
                    die("Invalid query: " . $conn->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>" . $row["sender"] . "</td>
                            <td>" . $row["receiver"] . "</td>
                            <td>" . $row["balance"] . "</td>
                            <td>" . $row["time"] . "</td>
                        </tr>";
                }
            ?>                
        </table>