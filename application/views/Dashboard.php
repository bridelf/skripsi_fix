<style>
  canvas {
    width: 100%;
    height: auto;
  }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                Total Kas Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($tot_masuk[0]['masuk'], 0, ".", ".") ?></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                Total Kas Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($tot_keluar[0]['keluar'], 0, ".", ".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-info text-uppercase mb-1">
                                Total Saldo Kas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $masuk = $tot_masuk[0]['masuk'];
                                $keluar = $tot_keluar[0]['keluar'];
                                $saldo =  $masuk-$keluar;
                                echo "Rp. " . number_format($saldo, 0, ".", ".");
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kas Umum Tahun <?=date('Y')?></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                        <canvas id="chartPay"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kas Umum</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                        <canvas id="chartPie" width="100%" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- line Chart -->
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kas Umum Tahun <?=date('Y')?></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                        <canvas id="chartLine"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</div>

<script>
   // Data kriteria
   var dataKriteria = {
    labels: [
        <?php foreach ($nama_bulan as $bln) { ?>
        '<?= $bln['bln'] ?>',
        <?php } ?>
        ],
    datasets: [
      {
        label: 'Kas Masuk',
        data: [
            <?php foreach ($jml_masuk as $masuk) { ?>
                <?= $masuk['masuk'] ?>,
            <?php } ?>
            ],
        backgroundColor: 'rgba(54, 162, 235, 0.5)' // Warna latar belakang dataset kriteria 1
      },
      {
        label: 'Kas Keluar',
        data: [
            <?php foreach ($jml_keluar as $keluar) { ?>
                <?= $keluar['keluar'] ?>,
            <?php } ?>
            ],
        backgroundColor: 'rgba(255, 99, 132, 0.5)' // Warna latar belakang dataset kriteria 2
      }
    ]
  };

  // Konfigurasi chart
  var config = {
    type: 'bar', // Jenis chart (bar chart)
    data: dataKriteria,
    options: {
      scales: {
        x: {
          stacked: true // Menggabungkan nilai-nilai pada sumbu x
        },
        y: {
          beginAtZero: true // Skala sumbu y dimulai dari 0
        }
      }
    }
  };

  // Membuat chart dengan ID 'chartPay' dan menggunakan konfigurasi yang telah ditentukan
  var myChart = new Chart(document.getElementById('chartPay'), config);
</script>

<script>
  // Data kriteria
  var dataKriteria = {
    labels: ['Kas Masuk', 'Kas Keluar'],
    datasets: [{
      data: [<?= $tot_masuk[0]['masuk']?>, <?= $tot_keluar[0]['keluar']?>],
      backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)'] // Warna latar belakang dataset
    }]
  };

  // Konfigurasi chart
  var config = {
    type: 'pie', // Jenis chart (pie chart)
    data: dataKriteria
  };

  // Membuat chart dengan ID 'chartPie' dan menggunakan konfigurasi yang telah ditentukan
  var myChart = new Chart(document.getElementById('chartPie'), config);
</script>

<script>
  // Data kriteria
  var dataKriteria = {
    labels: [
        <?php foreach ($nama_bulan as $bln) { ?>
        '<?= $bln['bln'] ?>',
        <?php } ?>
        ],
    datasets: [
      {
        label: 'Kas Masuk',
        data: [
            <?php foreach ($jml_masuk as $masuk) { ?>
                <?= $masuk['masuk'] ?>,
            <?php } ?>
            ],
        borderColor: 'rgba(54, 162, 235, 1)', // Warna garis dataset kriteria 1
        fill: false // Tidak mengisi area di bawah garis
      },
      {
        label: 'Kas Keluar',
        data: [
            <?php foreach ($jml_keluar as $keluar) { ?>
                <?= $keluar['keluar'] ?>,
            <?php } ?>
            ],
        borderColor: 'rgba(255, 99, 132, 1)', // Warna garis dataset kriteria 2
        fill: false // Tidak mengisi area di bawah garis
      }
    ]
  };

  // Konfigurasi chart
  var config = {
    type: 'line', // Jenis chart (Line chart)
    data: dataKriteria,
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true // Skala sumbu y dimulai dari 0
        }
      }
    }
  };

  // Membuat chart dengan ID 'chartLine' dan menggunakan konfigurasi yang telah ditentukan
  var myChart = new Chart(document.getElementById('chartLine'), config);
</script>
