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
    <link rel="stylesheet" type="text/css" href="asset/css/main.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/delete.css" />

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
                       <div class="col-md-1"></div>
                        <div class="col col-sm-12 offset-md-9">
                            <div class="row">
                                <div class="col-md-10">
                                    <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search user" name="user">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-lg btn-primary" type="submit" name="button_search" style="padding: 8px">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row" id="list-user">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <!-- get from database -->
                    <?php
                        if(isset($_POST["button_search"])){
                            $query = isset($_POST["user"]) ? $_POST["user"] : '';
                            
                            $sql_username = "SELECT * FROM user WHERE username LIKE '%{$query}%'";
                            $sql_fullname = "SELECT * FROM user WHERE fullname LIKE '%{$query}%'";
                            $sql_email = "SELECT * FROM user WHERE email LIKE '%{$query}%'";

                            $sql = $sql_username . " UNION ". $sql_fullname . " UNION ".$sql_email;
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <!-- output data of each row -->
                                <table class="table mt-5" style="margin: 10px 0px">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">User name</th>
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)) {
                                    if ($row["usertype"] == 20){
                                    ?>
                                    <tr>
                                        <th> <?php echo $row["ID"] ?> </th>
                                        <th> <?php echo $row["username"] ?> </th>
                                        <th> <?php echo $row["fullname"] ?> </th>
                                        <th> <?php echo $row["email"] ?> </th>
                                        <td>
                                            <button type="button" class="btn btn-info" name="edit" onclick="edit(this)">Edit</button>
                                            <button type="button" class="btn btn-danger" name="delete" onclick="del(this)">Delete</button>
                                        </td>
                                    </tr>
                                <?php 
                                    } 
                                }
                            } else {
                                echo "<p class='text-white mt-3'>Không tồn tại người dùng với từ khóa $name</p>";
                            }
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
                location.href= "editUser.php?id=" + td0;
        };
        function del(params) {
            if(confirm("Bạn có chắc muốn xóa user này?")){
                var tr = params.parentElement.parentElement;
                var td0= tr.cells.item(0).innerHTML;
                td0 = td0.replace(' ','' ); //id của user có space ???
                location.href= "deleteUser.php?id=" + td0;
            }
        };
    </script>
</body>
</html>
