<?php
session_start();
if($_SESSION['loggedin']!==true){
    header("location: ../");
}
if (isset($_GET['type'], $_GET['regno'])) {
    require_once("../includes/conn.php");
    $type = $_GET['type'];
    $regno = $_GET['regno'];
    $sql = "SELECT * FROM inpatient WHERE regno='$regno'";
    $query = $mysqli->query($sql);
    if ($query) {
        if ($query->num_rows > 0) {
            session_start();
            $row = $query->fetch_assoc();
            // var_dump($row);
        } else {
            echo "no records";
        }
    } else {
        echo $mysqli->error;
    }
    function logEvents($conn, $event)
    {
        $sql = "INSERT INTO logs VALUES('0','$event')";
        $query = $conn->query($sql);
        if ($query) {
            if ($conn->affected_rows > 0) {
                return "logs been recorded";
            } else {
                return "log not recorded";
            }
        } else {
            return $conn->error;
        }
    }
    // logEvents($mysqli, $type . " form of " . $row['name'] . " " . $row['regno'] . " has been accessed by Me");
    function saleForm($conn)
    {
        $sql = "SELECT * FROM settings";
        $query = $conn->query($sql);

        if ($query) {
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                if ($row['value'] == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    if (saleForm($mysqli) == false) {
?>
        <script>
            alert("Sales of forms is disabled")
            window.location.href = './searchpatient.php'
        </script>
    <?php
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../Semantic-ui/semantic.min.css" />
        <style>
            @media print {
                .noPrint {
                    display: none;
                }
            }
        </style>
    </head>

    <body>
        <div class="ui container" id="page">
            <div class="ui grid">

                <div class="row" id="card">

                    <div class="ui sixteen wide column">
                        <div class="card-header" style="text-align: center;">
                            <img src="../images/img-01.png" class="rounded-circle" alt="Logo" style="max-width: 140px; max-height:140px">
                            <h1 style="text-transform: uppercase; size: 40px">Al-Mukhtar Clinic</h1>
                            <p>Address:No. 1 Kesala Street Misau, Bauchi State.</p>
                            <p>GSM NO: 08065576825, 08068232457, 08132577753</p>

                        </div>
                        <!-- <div class="" style="width: 100vh;"> -->
                            <table class="ui table table-responsive">
                                <tbody>
                                    <tr>
                                        <td><strong>Name:</strong>
                                            <u><?php echo strtoupper($row['name']) ?></u>
                                        </td>
                                        <td><strong>Address:</strong> <?php echo $row['address'] ?></td>
                                        <td><strong>Reg. No:</strong><?php echo  $regno ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sex:</strong><?php echo  $row['gender'] ?></td>
                                        <td><strong>Age:</strong> <?php echo $row['age'] ?></td>
                                        <td><strong>Date:</strong> <?php echo date("D d-M,Y @ g:i a") ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>LMP:</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Prov. Diagnosis:</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <h2 style="text-align: center;">UNTRASOUND INVESTIGATION</h2>
                                <table class="ui table">
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="500" data-name="Obstetric Scan" /></td>
                                            <td>
                                                <h4>Obstetric Scan</h4>
                                            </td>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="300" data-name="Thyroid Scan" /></td>
                                            <td>
                                                <h4>Thyroid Scan</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="700" data-name="Pelvic Scan" /></td>
                                            <td>
                                                <h4>Pelvic Scan</h4>
                                            </td>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="150" data-name="Scrotal Scan" /></td>
                                            <td>
                                                <h4>Scrotal Scan</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="450" data-name="Abdominal Scan" /></td>
                                            <td>
                                                <h4>Abdominal Scan</h4>
                                            </td>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="350" data-name="Ocular Scan" /></td>
                                            <td>
                                                <h4>Ocular Scan</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="800" data-name="Abdominopelvic Scan" /></td>
                                            <td>
                                                <h4>Abdominopelvic Scan</h4>
                                            </td>
                                            <td><input type="checkbox" class="input100" style="transform: scale(2.8);" value="150" data-name="Breast Scan" /></td>
                                            <td>
                                                <h4>Breast Scan</h4>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <p style="text-align: right; padding-top: 40px;">Signature:.................................................................</p>
                                <button id="print" class="noPrint" onclick="window.print();">Print</button>
                            </div>
                            
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    <?php
}
    ?>
    </body>
    </html>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#print", () => {
                var name = []
                var amount = []
                var count = 1
                let pname = "<?php echo $row['name'] ?>";
                let regno = "<?php echo $row['regno'] ?>";
                let type = "<?php echo $_GET['type'] ?>";
                let source = "<?php echo $_SESSION['user'] ?>";

                $('input[type=checkbox]').each(function() {
                    if (this.checked) {
                        amount.push($(this).val())
                        name.push($(this).data("name"))
                    }

                });
                $.ajax({
                    url: "addtest.php",
                    method: "POST",
                    type: "text",
                    data: {
                        name: name,
                        amount: amount,
                        pfor:pname,
                        regno:regno
                    },
                    beforeSend: function() {

                    },
                    success: function(data) {
                        console.log(data)
                    }
                })
                
                $.ajax({
                    url: "logprint.php",
                    method: "post",
                    type: "text",
                    data: {
                        name: pname,
                        regno: regno,
                        type: type,
                        source: source
                    },
                    success: function(data) {
                        console.log(data)
                    }
                })
                // var divContent = document.getElementById("card").innerHTML
                // var oriContent = document.body.innerHTML
                // document.body.innerHTML = divContent
                // window.print()
                // document.body.innerHTML = oriContent
            })

        })
    </script>