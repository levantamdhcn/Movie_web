
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
</head>
<body>
    <div id="wrapper">
        <?php
            include("common.php");
        ?>

        <div id="page-wrapper" class="text-center" style="margin: auto; background-color: #f7f8fc; height: 100vh">
            <div class="dashboard-wrapper" style="margin-top: 60px">
                <div class="container" style="padding-top: 40px">
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
                    <div class="row">
                        <div class="col col-md-6">
                            <canvas id="myChart" width="400" height="400"></canvas>
                            <script>
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [12, 19, 3, 5, 2, 3],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
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
