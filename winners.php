<?php
    include('includes/header.php');
?>  

<h2> Winners of the Month!</h2>

<?php

    $query = "SELECT * FROM winners";

    $result = mysqli_query($conn, $query);

    if(!$result)
    {
        die ("Query failed ". mysqli_error($conn));
    }

?>
<br>
<br>
<h4>Here you can see all the lucky ones from this month!</h4>
<br>
<br>

<table class="table table-striped">
        <tr>
            <th class="table-dark">Raffle Number</th>
            <th class="table-dark">Winner Name</th>
            <th class="table-dark">Date of Winning</th>
        </tr>

        <?php
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>" . $row['raffleId'] . "</td>";
            echo "<td>" . $row['winnerUsername'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
        ?>
        
    </table>



<?php
    include 'includes/footer.php';
?>