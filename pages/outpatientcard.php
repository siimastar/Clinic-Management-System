<?php
if (isset($_GET['regno']) && !empty($_GET['regno'])) {
    require_once('../includes/conn.php');
    $regno = $_POST['regno'];
    // echo $regno;
    $sql = "SELECT * FROM inpatient WHERE regno='$regno'";
    $query = $mysqli->query($sql);
    if ($query) {
        if ($query->num_rows > 0) {
            session_start();
            $row = $query->fetch_assoc();
            var_dump($row);
        } else {
            echo "s";
        }
    } else {
        echo $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Semantic-ui/semantic.min.css" />
</head>

<body>
    <div class="ui container">
        <div class="card" id="card">
        <h5><u>LABORATORY REPORTS AND FINDINGS</u></h5>
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
        </div>
    </div>

    <button type="button" class="btn btn-outline-primary" id="print">Print</button>

    </div>


    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="../js/main.js"></script>

</body>



</html>
<script>
    $(document).ready(function() {
        $("#print").click(function() {

            var divContent = document.getElementById("card").innerHTML
            var oriContent = document.body.innerHTML
            document.body.innerHTML = divContent
            window.print()
            document.body.innerHTML = oriContent
        })
        $(document).on("click", "#login", function(e) {
            e.preventDefault();
            let username = $("#username").val()
            let password = $("#password").val()
            if (username === "" || password === "") {
                alert("All fields are required");
                return false;
            } else {
                $.ajax({
                    url: "./functions/login.php",
                    method: "POST",
                    type: "text",
                    data: {
                        username: username,
                        password: password
                    },
                    beforeSend: function() {
                        $("#login").html("Inserting ...")
                    },
                    success: function(data) {
                        alert(data)

                    }
                })
            }
        })
    })
</script>