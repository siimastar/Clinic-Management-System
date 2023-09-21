<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../Semantic-ui/semantic.css" />
    <script src="../vendor/jquery/jquery-3.2.1.min.js "></script>
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <style>
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
    <center>
        <a href="./searchpatient.php" class="ui basic massive olive button">Search</a>
        <button class="ui basic massive green button" id="print">Print</button>
    </center>
    <?php
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
                if ($query->affected_rows > 0) {
                    echo "logs been recorded";
                } else {
                    echo "s";
                }
            } else {
                echo $conn->error;
            }
        }
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
        switch ($type) {
            case "opd":
                echo '<div class="card" id="card">
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
                            <td><u>' . strtoupper($row['name']) . '</u></td>
                            </td>
                            <td><b>Reg. No:</b>' . $row['regno'] . '</td>
                            <td colspan=""><b>Address:</b>
                            <td>' . $row['address'] . '</td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>Sex:</b>
                            <td>' . strtoupper($row['gender']) . '</td>
                            </td>
                            <td><b>Age:</b>
                            <td>' . $row['age'] . '</td>
                            </td>
                            <td colspan="1"><b>Occupation:</b>
                            <td >' . $row['occupation'] . '</td>
                            </td>
                            <td><strong>Date:</strong>' . date("D d-M,Y @ g:i a") . '</td>
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
        </div>';
                logEvents($mysqli, $type . " form of " . $row['name'] . " " . $row['regno'] . " has been accessed by Me");
                break;
                // <h3><u>GEN-OUT-PATIENT CARD</u></h3>
            case "uss":
                echo '<div class="ui container" id="page">
            <div class="ui grid">
                <div class="row" id="card">
                    <div class="ui twelve wide column">
                        <div class="card-header" style="text-align: center;">
                            <img src="../images/img-01.png" class="rounded-circle" alt="Logo" style="max-width: 140px; max-height:140px">
                            <h1 style="text-transform: uppercase; size: 40px">Al-Mukhtar Clinic</h1>
                            <p>Address:No. 1 Kesala Street Misau, Bauchi State.</p>
                            <p>GSM NO: 08065576825, 08068232457, 08132577753</p>
                            
                        </div>
                        <div class="" style="width: 100vh;">
                            <table class="ui table table-responsive">
                                <tbody>
                                    <tr>
                                        <td><strong>Name:</strong>
                                            <u>' . strtoupper($row['name']) . '</u>
                                        </td>
                                        <td><strong>Address:</strong> ' . $row['address'] . '</td>
                                        <td><strong>Reg. No:</strong>' . $regno . '</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sex:</strong> ' . $row['gender'] . '</td>
                                        <td><strong>Age:</strong> ' . $row['age'] . '</td>
                                        <td><strong>Date:</strong> ' . date("D d-M,Y @ g:i a") . '</td>
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
                                                <td><input type="checkbox" class="input100" style="transform: scale(2);" /></td>
                                                <td>
                                                    <h4>Obstetric Scan</h4>
                                                </td>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Thyroid Scan</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Pelvic Scan</h4>
                                                </td>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Scrotal Scan</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Abdominal Scan</h4>
                                                </td>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Ocular Scan</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Abdominopelvic Scan</h4>
                                                </td>
                                                <td><input type="checkbox" class="input100" style="transform: scale(2.8);" /></td>
                                                <td>
                                                    <h4>Breast Scan</h4>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <p style="text-align: right; padding-top: 40px;">Signature:.................................................................</p>
                     
                                    </div>
                    </div>
                </div>
            </div>
        </div>';
                logEvents($mysqli, $type . " form of " . $row['name'] . " " . $row['regno'] . " has been accessed by Me");
                break;
            case "lab":
                echo '';
                logEvents($mysqli, $type . " form of " . $row['name'] . " " . $row['regno'] . " has been accessed by Me");
                break;
            case "labback":
                echo '<div class="card" id="card">
                <h5 style="text-align:center"><u>LABORATORY REPORTS AND FINDINGS</u></h5>
                    <div class="card-body" style="line-height: 10px;">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ui seven wide column">
                                    <p>Hb:________________________________________gm/dl</p>
                                <p>PCV:__________________________________________%</p>
                                <p>WBC:____________________M____________________%</p>
                                <p>RBc:_________________________________________/NL</p>
                                <p>MP:_____________________E_____________________%</p>
                                <p>Genotype________________________________________</p>
                                <p>MF:____________________B______________________%</p>
                                <p>RVS:___________________________________________</p>
                                <p>Hbv:____________________________________________</p>
                                <p>HcV:_____________________________________________</p>
                                <p>AFB:________________________(ii)__________________</p>
                                <p>Blood Group:_________________Rh____________________</p>
                                <p>ESR:___________________/hr_____________________</p>
                                <p>HCG:____________________________________________</p>
                                <p>Syphilis:________________________________________</p>
                                <p>X-Matching:_______________________________________</p>
                                <p>H pylori:_________________________________________</p>
                                <p>FBS (Normal Range) = 2.5 7.0 mml/L, 45-126 mg/dL</p>
                                <p>RBS (Normal Range) = 2.5 11.0 mmol/L, 45-198 mg/dL</p>
                                </div>
                                <div class="ui eight wide column">
                                    <table class="ui bordered-table table">
                                        <thead>
                                            <th colspan="2">Appearance</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>PH________________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Blood______________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Specific gravity______________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Billirubin___________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Urobilonogen________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Ketone_____________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Nitrite______________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Glucose_____________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Ascobic Acid_________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>Protein______________________________________</li>
                                                    </ol>
                                                </td>
                                                <td>____________</td>
                                            </tr>
                                            <th colspan="2" style="text-align: center;">Widal Reaction</th>
                                            <tr>
                                                <table class="ui table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Antigen</td>
                                                            <td>O:</td>
                                                            <td>H:</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Salmonella Typhi</td>
                                                            <td>AO-I:</td>
                                                            <td>H-I:</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sal. Paratyphi</td>
                                                            <td>AO-I:</td>
                                                            <td>AH-I:</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sal. Paratyphi</td>
                                                            <td>BO-I:</td>
                                                            <td>BH-I:</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sal. Paratyphi</td>
                                                            <td>CO-I:</td>
                                                            <td>CH-I:</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                        
                                            <table>
                                                <tr>
                                                <td>Comment: Entric fever are I:80 and above ____________________________________________</td>
                                            </tr>
                                            </table>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 30px;">
                                <div class="ui sixteen wide column">
                                    <p>________________________________________________________________________________________________________________</p>
                                    <p>Other Results:-______________________________________________________________________________________________</p>
                                    <p>Name:________________________________________________________________________________Sign__________________________</p>
                                    <p>Date:__________________________________________</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                logEvents($mysqli, $type . " form of " . $row['name'] . " " . $row['regno'] . " has been accessed by Me");
                break;
            default:
                echo "No Form";
        }
    }

    ?>

</body>

</html>
<script>
    $(document).ready(() => {
        $(document).on("click", "#print", () => {
            let name = "<?php echo $row['name'] ?>";
            let regno = "<?php echo $row['regno'] ?>";
            let type = "<?php echo $_GET['type'] ?>";
            let source = "<?php echo "Me" ?>";

            var divContent = document.getElementById("card").innerHTML
            var oriContent = document.body.innerHTML
            document.body.innerHTML = divContent
            window.print()
            document.body.innerHTML = oriContent

            $.ajax({
                url: "logprint.php",
                method: "post",
                type: "text",
                data: {
                    name: name,
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