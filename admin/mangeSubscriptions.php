<?php
    require('libs/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/delete.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/main.css" />

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>   
</head>
<body style="height: 100vh; background-color: #141414;">
    <div id="wrapper">
        <?php
            include("common.php");
        ?>
       <div class="container">
            <div class="row" id="search-user" style="margin-top: 60px">
                <form method="post">
                    <div class="row mt-5">
                        <div class="col col-md-12 offset-md-4">

                        </div>
                    </div>
                </form>
            </div>
            <div class="row" id="list-user">
                <div class="col-md-12 offset-md-1">
                    <!-- get from database -->
                    <?php
                            $qry = isset($_POST["qry"]) ? $_POST["qry"] : '';
                            
                            $sql = "select * from subscriptions";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <!-- output data of each row -->
                                <table class="table text-white mt-6 table-hover table-dark mt-5 shadow">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-top-0">ID</th>
                                            <th scope="col" class="border-top-0">ID người dùng</th>
                                            <th scope="col" class="border-top-0">ID gói</th>
                                            <th scope="col" class="border-top-0">Ngày hết hạn</th>
                                            <th scope="col" class="border-top-0">Ngày đăng ký</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                                    <tr>
                                        <th> <?php echo $row["subscriptions_id"] ?> </th>
                                        <th> <?php echo $row["user_id"] ?> </th>
                                        <th> <?php echo $row["plan_id"] ?> </th>
                                        <th> <?php echo $row["valid_till"] ?> </th>
                                        <th> <?php echo $row["createAt"] ?> </th>
                                    </tr>
                                <?php 
                                }
                            } else {
                                echo "No user like ".$qry;
                            }
                            mysqli_close($link);
                    ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>
    <script>
        function edit(params) {
                var tr = params.parentElement.parentElement;
                var td0= tr.cells.item(0).innerHTML;
                td0 = td0.replace(' ','' ); //id của user có space ???
                location.href= "editFilm.php?id=" + td0;
        };
        function del(params) {
            if(confirm("Bạn có chắc muốn xóa film này?")){
                var tr = params.parentElement.parentElement;
                var td0= tr.cells.item(0).innerHTML;
                td0 = td0.replace(' ','' ); //id của user có space ???
                location.href= "deleteFilm.php?id=" + td0;
            }
        };
    </script>
</body>
</html>
