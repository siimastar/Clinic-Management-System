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
            <div class="card-header text-center" style="margin-top: 0px; padding-top:0px; margin:0px;padding:0px">
                <img src="../images/img-01.png" class="rounded-circle" alt="Logo" style="max-width: 120px; max-height:120px;margin:0px">
                <h1>Al-Mukhtar Clinic</h1>
                <p>Address:No. 1 Kesala Street Misau, Bauchi State.</p>
                <p>GSM NO: 08065576825, 08068232457, 08132577753</p>
                <h5><u>LABORATORY REQUEST AND RESULT FORM</u></h5>
            </div>
            <div class="card-body" style="line-height: 8px; margin-top:0px">
                <table class="ui table-bordered table" style="line-height: 7px;  margin-top:0px">
                    <thead class="">
                        <tr style="line-height: 4px;">
                            <th>Name</th>
                            <th style="width:100px">Sex</th>
                            <th style="width:100px">Age</th>
                            <th>Address</th>
                            <th>Reg. No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="line-height: 5px;">
                            <td scope="row"><?php echo strtoupper($row['name']) ?></td>
                            <td><?php echo strtoupper($row['gender']) ?></td>
                            <td><?php echo strtoupper($row['age']) ?></td>
                            <td><?php echo strtoupper($row['address'])?></td>
                            <td><?php echo strtoupper($row['regno'])?></td>
                        </tr>
                        <table class="ui table-bordered table" style="margin: 0px; padding:0px;">
                            <thead style="line-height: 7px" style="margin: 0px; padding:0px;">
                                <tr style="line-height:5px">
                                    <th>Ward/Clinic</th>
                                    <th>Hospital No.</th>
                                    <th>Laboratory No.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 30px;">
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="line-height: 7px">
                                    <th>Clinical Details</th>
                                    <th>Clinical Consultant Sign</th>
                                    <th>Date</th>
                                </tr>
                                <tr style="height: 30px;">
                                    <td></td>
                                    <td></td>
                                    <td><?php echo date("D d-M,Y @ g:i a") ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </tbody>
                </table>
                <fieldset class="group">
                    <p style="text-align: center; text-decoration:underline; font-weight:bold">SPECIMEN(S) REQUESTED</p>
                    <ul class="checkbox" style="margin: 0px; padding:0px">
                        <li><input type="checkbox" class="cb" /><label for="cb1">Blood</label></li>
                        <li><input type="checkbox" class="cb" /><label for="cb2">Urine</label></li>
                        <li><input type="checkbox" class="cb" /><label for="cb3">Sputum</label></li>
                        <li><input type="checkbox" class="cb" /><label for="cb4">Stool</label></li>
                        <li><input type="checkbox" class="cb" /><label for="cb5">HVS</label></li>
                        <li><input type="checkbox" class="cb" /><label for="cb6">CSF</label></li>
                    </ul>
                </fieldset>
                <p style="width: 100%; margin:0px">Others Specify:..................................................................................................................................................................................................................................................................................</p>
                <hr id="thick" />
                <hr />
                <table class="table table-bordered table-responsive" id="ir" style="line-height: 7px">
                    <thead class="">
                        <tr>
                            <th>Chemistry Lab</th>
                            <th>Haematology Lab</th>
                            <th>Microbiology Lab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" rowspan="3">
                                <ul class="">
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb1">E/U/C</label></li>
                                    <li><input type="checkbox" class="cbcat"  value="3000" data-name="Liver Function Test(LFT)"/><label for="cb2">Liver Function Test(LFT)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Urinalysis" /><label for="cb3">Urinalysis</label></li>
                                    <li><input type="checkbox" class="cbcat"  value="300" data-name="Pregnancy Test"/><label for="cb4">Pregnancy Test</label></li>
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb5">Renal Function Test</label></li>
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb6">Glucose Test</label></li>
                                </ul>
                                <p>a. Fasting Blood Sugar (FBS)</p>
                                <p>b. Random Blood Sugar (RBS)</p>
                                <p>c. OGTT</p>
                            </td>
                            <td scope="row">
                                <ul class="">
                                    <li><input type="checkbox" class="cbcat" value="1500" data-name="Full Blood Count (FBC)"/><label for="cb1">Full Blood Count (FBC)</label></li>
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb2">White Blood Cell Count (WBC)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="1000" data-name="Hb Genotype"/><label for="cb3">Hb Genotype</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Packed Cell Volume (PCV)" /><label for="cb4">Packed Cell Volume (PCV)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Hemoglobin Estimation (Hb)"/><label for="cb5">Hemoglobin Estimation (Hb)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="500" data-name="ESR"/><label for="cb6">ESR</label></li>
                                </ul>
                            </td>
                            <td scope="row">
                                <ul class="">
                                    <li><input type="checkbox" class="cbcat" data-name="M/C/S" value="300"/><label for="cb1">M/C/S</label></li>
                                    <li><input type="checkbox" class="cbcat"  value="300" data-name="Widal"/><label for="cb2">Widal</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Malaria (MP)"/><label for="cb3">Malaria</label></li>
                                    <li><input type="checkbox" class="cbcat" /><label for="cb4">ZN Stain (AFB)</label></li>
                                    <li><input type="checkbox" class="cbcat"  value="" data-name=""/><label for="cb5">Urine Microscopy</label></li>
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb6">Stool Microscopy</label></li>
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb6">HVS Analysis</label></li>
                                    <li><input type="checkbox" class="cbcat"  /><label for="cb6">Semen Analysis</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Virology/Immunology Lab</th>
                            <th>Blood Transfusion Services</th>
                        </tr>
                        <tr>
                            <!-- <td></td> -->
                            <td scope="row">
                                <ul class="">
                                    <li><input type="checkbox" class="cbcat" value="500" data-name="Retroviral Screening (RVS)" /><label for="cb1">Retroviral Screening (RVS)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="VDRL" /><label for="cb2">VDRL</label></li>
                                    <li><input type="checkbox" class="cbcat" value="1500" data-name="Hepatitis b Virus (HbV)"/><label for="cb3">Hepatitis b Virus (HbV)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Hepatitis c Virus (HcV)"/><label for="cb4">Hepatitis c Virus (HcV)</label></li>
                                    <li><input type="checkbox" class="cbcat" value="500" data-name="H Pylori (Ulcer test)"/><label for="cb5">H Pylori (Ulcer test)</label></li>
                                </ul>
                            </td>
                            <td scope="row">
                                <ul class="">
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Blood Grouping"/><label for="cb1">Blood Grouping</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="Blood Xmatching"/><label for="cb2">Blood Xmatching</label></li>
                                    <li><input type="checkbox" class="cbcat" /><label for="cb3">Blood Film</label></li>
                                    <li><input type="checkbox" class="cbcat" value="300" data-name="PCV/Hb Estimation"/><label for="cb4">PCV/Hb Estimation</label></li>
                                    <li><input type="checkbox" class="cbcat" /><label for="cb5">Donor Screening</label></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
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