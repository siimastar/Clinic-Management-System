<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Back</title>
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
    <div class="card" id="card">
        <div class="container">
            <button id="print" class="ui green basic button" onclick="window.print();">Print</button>
        </div>
        <h5 style="text-align:center"><u>LABORATORY REPORTS AND FINDINGS</u></h5>
        <div class="card-body" style="line-height: 10px;">
            <div class="ui grid">
                <div class="row">
                    <div class="ui seven wide column">
                        <p>Hb:____________________________________gm/dl</p>
                        <p>PCV:__________________________________________%</p>
                        <p>WBC:____________________M____________________%</p>
                        <p>RBc:____________________________________/NL</p>
                        <p>MP:_____________________E_____________________%</p>
                        <p>Genotype________________________________________</p>
                        <p>MF:____________________B______________________%</p>
                        <p>RVS:____________________________________</p>
                        <p>Hbv:____________________________________</p>
                        <p>HcV:____________________________________</p>
                        <p>AFB:________________________(ii)__________________</p>
                        <p>Blood Group:_________________Rh____________________</p>
                        <p>ESR:___________________/hr_____________________</p>
                        <p>HCG:____________________________________</p>
                        <p>Syphilis:________________________________________</p>
                        <p>X-Matching:____________________________________</p>
                        <p>H pylori:____________________________________</p>
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
</body>

</html>