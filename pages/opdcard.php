<?php
session_start();
if ($_SESSION['loggedin'] !== true) {
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
        <link rel="stylesheet" type="text/css" href="../css/util.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
        <style>
            @media print {
                button#print {
                    display: none;
                }
            }

            ul.checkbox li {
                border: 1px transparent solid;
                display: inline-block;
                width: 10em;
            }

            .cb {
                vertical-align: middle;
                zoom: 2;
            }

            .cbcat {
                vertical-align: middle;
                zoom: 2;
                margin: 1px;
            }

            fieldset {
                display: inline;
                vertical-align: middle;
            }

            hr#thick {
                border: none;
                height: 2.3px;
                /* Set the hr color */
                background-color: #333;
                /* Modern Browsers */
                margin: 0px;
                padding: 0px;
            }

            hr {
                border: none;
                height: 1px;
                /* Set the hr color */
                background-color: #333;
                /* Modern Browsers */
                margin: 3px;
                padding: 0px;
            }

            #ir td {
                margin: 0px;
                padding: 0px;
            }

            body {
                margin: 0px;
                padding: 0px;
                height: 100%;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <button id="print" class="ui green basic button" onclick="window.print();">Print</button>
        </div>
        <div class="card" id="card">
            <div class="card-header text-center" style="margin-top: 0px; padding-top:0px">
                <img src="../images/img-01.png" class="rounded-circle" alt="Logo" style="max-width: 140px; max-height:140px">
                <h1>Al-Mukhtar Clinic</h1>
                <p>Address:No. 1 Kesala Street Misau, Bauchi State.</p>
                <p>GSM NO: 08065576825, 08068232457, 08132577753</p>
                <h3><u>GEN-OUT-PATIENT CARD</u></h3>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Name:</b>
                            <td><u><?php echo strtoupper($row['name']) ?></u></td>
                            </td>
                            <td><b>Reg. No:</b><?php $row['regno'] ?></td>
                            <td colspan=""><b>Address:</b>
                            <td><?php echo $row['address'] ?></td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>Sex:</b>
                            <td><?php echo strtoupper($row['gender']) ?></td>
                            </td>
                            <td><b>Age:</b>
                            <td><?php echo $row['age'] ?></td>
                            </td>
                            <td colspan="1"><b>Occupation:</b>
                            <td><?php echo $row['occupation'] ?></td>
                            </td>
                            <td><strong>Date:</strong><?php echo date("D d-M,Y @ g:i a") ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="mycontent-left" style="border-right: 1px solid #333; border-left: 1px solid #333; padding-right:10px; padding-left:15px; height:58vh;">
                        <table class="table">
                            <tbody>
                                <tr>

                                    <td>Date</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mycontent-right" style="margin-left: 20px; margin-right:20px">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="padding-left: 45vpx;">Diagnosis and Treatment</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mycontent-left" style="border-right: 1px solid #333; border-left: 1px solid #333; padding-right:10px; padding-left:15px">
                        <table class="table">
                            <tbody>
                                <tr>

                                    <td>Date</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mycontent-right" style="margin-left: 10px">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Diagnosis and Treatment</td>
                                </tr>
                            </tbody>
                        </table>
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
                    url: "addopdamount.php",
                    method: "POST",
                    type: "text",
                    data: {
                        type: type,
                        pfor: pname,
                        regno: regno
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
            })

        })
    </script>