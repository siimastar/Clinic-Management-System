<?php
if (isset($_POST['start'], $_POST['end'])) {
    require_once("../includes/conn.php");
    $start = $_POST['start'];
    $end = $_POST['end'];
// echo "<tr>".$start ." ".$end;"</tr>";
    $sql = "SELECT * FROM tests WHERE date BETWEEN '$start' AND '$end'";
    $query = $mysqli->query($sql);
    if ($query) {
        if ($query->num_rows > 0) {
            session_start();
            $count =1;
            $amount =0;
            while ($row = $query->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['date']?></td>
                    <td>
                        <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success">100%</span></td>
                </tr>

<?php
        $count++;
        $amount = $amount +$row['amount'];
            }
            ?>
<tr>
    <td colspan="3"><strong>Total amount</strong></td>
    <td colspan="2"><?php echo $amount?></td>
</tr>
            <?php
        } else {
            echo "<tr><td colspan='4'>No records found between the given dates!</td></tr>";
        }
    } else {
        echo $mysqli->error;
    }
}
?>