<?php include "includes/header.php" ?>

        <title>Customers</title>
    </header>
    <body>
        <h1 style="color: black;">Customers</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Transfer Money</th>
            </tr>
            <?php
                $sql = "SELECT * FROM customers";
                $result = $conn->query($sql);
                if(!$result){
                    die("Invalid query: " . $connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["balance"] . "</td>
                            <td><div class = 'send'><a href = 'send_money.php?id=".$row["id"]."'>SEND MONEY</a></div></td>
                        </tr>";
                }
            ?>                
        </table>
    </body>
</html>        
