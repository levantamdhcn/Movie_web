
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/icons/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/main.css" />

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <script src="./asset/js/chart.js"></script>
</head>
<body>
    <div id="wrapper">
        <?php
            include("common.php");
        ?>

        <div id="page-wrapper" class="text-center" style="margin: auto; background-color: #f7f8fc; height: 100vh">
            <div class="dashboard-wrapper" style="margin-top: 60px">
                <div class="container" style="padding-top: 40px; padding-left: 60px">
                    <div class="row">
                        <div class="col-md-12 offset-1">
                            <div class="row">
                                <?php
                                    $sql = "select * from user";
                                    $result = mysqli_query($link, $sql); 
                                    $numUser = mysqli_num_rows($result)
                                ?>
                                    <div class="four col col-md-3">
                                        <div class="counter-box colored bg-white rounded shadow">
                                            <i class="fas fa-users" style="color: rgb(133, 83, 238);"></i>
                                            <div class="info">
                                                <p>Người dùng</p>
                                                <span class="counter"><?php echo $numUser ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $sqlFilm = "select * from film";
                                    $resultFilm = mysqli_query($link, $sqlFilm); 
                                    $numFilm = mysqli_num_rows($resultFilm)
                                ?>
                                <div class="four col col-md-3">
                                    <div class="counter-box colored bg-white rounded shadow">
                                        <i class="fas fa-video" style="color: rgb(255, 137, 14)"></i>
                                        <div class="info">
                                            <p>Bộ phim</p>
                                            <span class="counter"><?php echo $numFilm ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $sqlEpisode = "select * from episode";
                                    $resultEpisode = mysqli_query($link, $sqlEpisode); 
                                    $numEpisode = mysqli_num_rows($resultEpisode)
                                ?>
                                <div class="four col col-md-3">
                                    <div class="counter-box colored bg-white rounded shadow">
                                        <i class="fab fa-youtube" style="color: var(--main-color);"></i>
                                        <div class="info">
                                            <p>Tập phim</p>
                                            <span class="counter"><?php echo $numEpisode ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $sqlCategory = "select * from category";
                                    $resultCategory = mysqli_query($link, $sqlCategory); 
                                    $numCategory = mysqli_num_rows($resultCategory)
                                ?>
                                <div class="four col col-md-3">
                                    <div class="counter-box colored bg-white rounded shadow">
                                        <i class="fas fa-th-list" style="color: rgb(245, 54, 92)"></i>
                                        <div class="info">
                                            <p>Thể loại</p>
                                            <span class="counter"><?php echo $numCategory ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-between">
                        <div class="col col-md-5 offset-md-1">
                            <?php
                                $sql = "select year, count(*) as count from film where year is not null group by year";
                                $query = mysqli_query($link, $sql);
                                foreach($query as $data) {
                                    $year[] = $data["year"];
                                    $amount[] = $data["count"];
                                }
                                
                            ?>
                            <canvas id="myChart" width="400" height="400"></canvas>
                            <script>
                                const ctxBar = document.getElementById('myChart').getContext('2d');
                                const labels = <?php echo json_encode($year) ?>;
                                let amounts = <?php echo json_encode($amount) ?>;
                                amounts = amounts.map(el => parseInt(el));
                                const myChart = new Chart(ctxBar, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Số phim',
                                            data: amounts,
                                            backgroundColor: [
                                                '#36a2eb',
                                                '#ff6384',
                                                '#4bc0c0',
                                            ],
                                            borderColor: [
                                                '#36a2eb',
                                                '#ff6384',
                                                '#4bc0c0',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        },
                                        plugins: {
                                            title: {
                                                display: true,
                                                text: 'Số phim theo năm phát hành',
                                                color: "#222222",
                                                font: {
                                                    weight: 'bold',
                                                    size: '16px'
                                                }
                                            },
                                            legend: {
                                                display: false
                                            },
                                        },
                                        
                                    }
                                });
                            </script>
                        </div>
                        <div class="col col-md-5 d-flex justify-content-end">
                            <?php
                                $sql = "select distinct type_movie, count(*) as count from film where type_movie is not null group by type_movie";
                                $query = mysqli_query($link, $sql);
                                foreach($query as $dataPie) {
                                    $typePie[] = $dataPie["type_movie"];
                                    $amountPie[] = $dataPie["count"];
                                }
                            ?>
                            <canvas id="myPieChart" width="400" height="400"></canvas>
                            <script>
                                const ctxPie = document.getElementById('myPieChart').getContext('2d');
                                let labelsPie = <?php echo json_encode($typePie) ?>;
                                labelsPie = labelsPie.map(el => {
                                    if(el === "1") {
                                        return "Phim lẻ"
                                    }
                                    if(el === "2") {
                                        return "Phim bộ"
                                    }
                                    if(el === "3") {
                                        return "Phim chiếu rạp"
                                    }
                                })
                                let amountsPie = <?php echo json_encode($amountPie) ?>;
                                amountsPie = amountsPie.map(el => parseInt(el));
                                const myPieChart = new Chart(ctxPie, {
                                    type: 'pie',
                                    data: {
                                        labels: labelsPie,
                                        datasets: [{
                                            label: 'Số phim',
                                            data: amountsPie,
                                            backgroundColor: [
                                                '#ffcd56',
                                                '#ff9f40',
                                                '#36a2eb',
                                            ],
                                            borderColor: [
                                                '#ffcd56',
                                                '#ff9f40',
                                                '#36a2eb',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            title: {
                                                display: true,
                                                text: 'Số phim theo thể loại',
                                                color: '#222222',
                                                font: {
                                                    weight: 'bold',
                                                    size: '16px'
                                                }
                                            },
                                            legend: {
                                                display: false
                                            },
                                        },
                                        
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-between">
                        <div class="col col-md-5 offset-md-1 d-flex justify-content-end">
                            <?php
                                $months = array();
                                for ($i = 1; $i <= 12; $i++){
                                    $sql = "SELECT COUNT(*) AS 'count' FROM bill WHERE MONTH(create_at) = " . $i;
                                    $temp = mysqli_fetch_array(mysqli_query($link, $sql))['count'];
                                    array_push($months, $temp);
                                }   
                            ?>
                            <canvas id="myLineChart" width="400" height="400"></canvas>
                            <script>
                                const ctxLine = document.getElementById('myLineChart').getContext('2d');
                                let dataLine = <?php echo json_encode($months) ?>;
                                dataLine = dataLine.map(el => parseInt(el));
                                new Chart(document.getElementById("myLineChart"), {
                                    type: 'line',
                                    data: {
                                        labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                        datasets: [{
                                            label: 'Danh sách đăng ký theo tháng',
                                            data: dataLine,
                                            fill: false,
                                            borderColor: 'rgb(75, 192, 192)',
                                            tension: 0.1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            title: {
                                                display: true,
                                                text: 'Danh sách hóa đơn theo tháng của năm 2022',
                                                color: '#222222',
                                                font: {
                                                    weight: 'bold',
                                                    size: '16px'
                                                }
                                            },
                                            legend: {
                                                display: false
                                            },
                                        },
                                        
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
