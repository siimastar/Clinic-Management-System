<?php
require_once("../includes/conn.php");

function getLogs($conn)
{
    $sql = "SELECT * FROM logs ORDER BY id DESC LIMIT 100";
    $query = $conn->query($sql);

    if ($query) {
        if ($query->num_rows > 0) {
            $row = $query->fetch_all();
            return $row;
        } else {
            return "no records found";
        }
    } else {
        return $conn->error;
    }
}

// var_dump(getLogs($mysqli));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <style>
        table{
            overflow-x: scroll;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title" style="text-align: center;">Some recent notifications (Logs) that happens in the app</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" style="height: 150px; max-height:150px;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Activity</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $rows = getLogs($mysqli);
                                for ($i = 0; $i < count($rows); $i++) {
                                ?>
                                    <tr>

                                        <td><span class="tag tag-success"><?php echo $count;?></span></td>
                                        <td><?php echo $rows[$i][1]?></td>
                                        <td><span class="badge bg-success">Done</span></td>
                                    </tr>
                                <?php
$count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</body>

</html>
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>