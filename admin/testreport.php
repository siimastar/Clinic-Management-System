<?php
session_start();
if ($_SESSION['loggedin'] == true) {
  if ($_SESSION['user'] !== "admin") {
?>
    <script>
      alert("you don't the privilage to view this page")
      window.location.href = "../dashboard/"
    </script>
<?php
  }
} else {
  header("location: ../");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=<div class=" card">
  <title>Report</title>


  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body>
  <div class="container">


    <div class="form-group">
      <label>Date:</label>

      <div class="input-group">
        <button type="button" class="btn btn-default float-right" id="daterange-btn">
          <i class="far fa-calendar-alt"></i> Date range picker
          <i class="fas fa-caret-down"></i>
        </button>
      </div>
    </div>
    <span id="reportrange"></span>

  </div>
  <div class="card-footer">
    <p>In custom range, choose a Date and click apply</p>
  </div>

  </div>

  </div>
  <div class="card-header">
    <h3 class="card-title">Tests Done with date</h3>
  </div>

  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 10px">S/N</th>
          <th>Tests</th>
          <th>Date</th>
          <th>Progress</th>
          <th style="width: 40px">Status</th>
        </tr>
      </thead>
      <tbody id="result">


      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  </div>
</body>

</html>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstra-->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./plugins/select2/js/select2.full.min.js"></script>

<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="./plugins/daterangepicker/daterangepicker.js"></script>

<script src="./plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="./plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="./plugins/bs-stepper/js/bs-stepper.min.js"></script>

<script src="./plugins/dropzone/min/dropzone.min.js"></script>

<script src="./dist/js/adminlte.min.js"></script>

<script>
  $(function() {
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        // alert(start.format('DD-MM-YYYY'))
        getReport(start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'))
        $('#reportrange').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'))
        // $('#reportrange').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    function getReport(startdate, enddate) {
      $.ajax({
        url: "fetchreport.php",
        method: "POST",
        type: "text",
        data: {
          start: startdate,
          end: enddate
        },
        beforeSend: function() {

        },
        success: function(data) {
          $("#result").html(data)
          // console.log(data)
        }
      })
    }
    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })


  })
</script>