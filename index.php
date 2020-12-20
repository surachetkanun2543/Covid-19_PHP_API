<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Covid-19 | thissurache.online</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.js"></script>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">

  <link rel="icon" type="favicon.png" sizes="16x16" href="favicon.png">
</head>

<style>

  * {
    font-family: 'Prompt', sans-serif;
  }

  h5 {
    font-size: 50px
  }

  .card,
  .note {
    box-shadow: 7px 7px 5px -2px rgba(0, 0, 0, 0.25);
  }
</style>

<body>

  <?php

  $api = file_get_contents("https://covid19.th-stat.com/api/open/today");
  $data = json_decode($api, true);

  $api2 = file_get_contents("https://covid19.th-stat.com/api/open/cases/sum");
  $data2 = json_decode($api2, true);


  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function() {
      setInterval(function() { // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData = $.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
          url: "time.php",
          data: "rev=1",
          async: false,
          success: function(getData) {
            $("#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
          }
        }).responseText;
      }, 1000);
    });
  </script>

  <div class="mt-4">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <div class="text-center my-3">
            <h2 class="note note-primary">วัน เดือน ปี เวลา ณปัจจุบัน</h2>
            <h4>
              <div id='showData'></div>
            </h4>
            <hr />
            <h2 class="note note-primary">รายงานสถานการณ์ โควิด-19</h2>
            <hr />
            <h4>อัพเดทข้อมูลล่าสุด : <?php echo $data["UpdateDate"]; ?></h4>
          </div>

          <div class="card text-center text-white bg-danger mb-3">
            <div class="card-header">ติดเชื้อสะสม</div>
            <div class="card-body">
              <i class="fas fa-biohazard">
                <h5 class="card-title">
              </i><?php echo number_format($data["Confirmed"]); ?> คน </h5>
              <p class="card-text text-white">(เพิ่มขึ้น <?php echo number_format($data["NewConfirmed"]); ?>คน)</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          <div class="card text-center text-white bg-success mb-3">
            <div class="card-header">หายแล้ว
            </div>
            <div class="card-body">
              <i class="fas fa-clinic-medical">
                <h5 class="card-title">
              </i>
              <?php echo number_format($data["Recovered"]); ?> คน </h5>
              <p class="card-text text-white"> (เพิ่มขึ้น <?php echo number_format($data["NewRecovered"]); ?>คน)</p>

            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card text-center text-white bg-info mb-3">
            <div class="card-header">รักษาอยู่ใน รพ.</div>
            <div class="card-body">
              <i class="fas fa-hand-holding-medical">
                <h5 class="card-title">
              </i>
              <?php echo number_format($data["Hospitalized"]); ?> คน </h5>
              <p class="card-text text-white">&nbsp;</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card text-center text-white bg-dark mb-3">
            <div class="card-header">เสียชีวิต
            </div>
            <div class="card-body">
              <i class="fas fa-heartbeat">
                <h5 class="card-title">
              </i><?php echo number_format($data["Deaths"]); ?> คน </h5>
              <i class="undefined fa-undefined"></i>
              <p class="card-text text-white">&nbsp;</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="text-center">
    <p>แหล่งที่มา :<a href="https://covid19.ddc.moph.go.th/th"> กรมควบคุมโรค </a></p>
  </div>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
</body>

</html>