<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Post</title>

	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/main.css" />

	<script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

	<style>

		div {
			background-color: #141414;
		}
        .form-control{
            color: black;
        }
        .title{
            
            /* background-color: #2a9fd6; */
            padding: 10px 30px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
        }
        
	</style>
</head>

<body>

	<?php
        require('libs/db.php');
        $sql = "SELECT id FROM film ";
        $result = mysqli_query($link, $sql);
    ?>
		<div id="wrapper">
            <?php
                include("common.php");
            ?>
            <div class="container" id="post_film">
                <div class="row text-center" style="margin: 60px 0px 20px 0px;">
                    <h2 class="title text-white">Thêm Phim</h2>
                </div>
                <form method="post" id="form-insert-film" name="form-insert-film" class="form-horizontal" action="" role="form" >
                    <div class="col col-sm-12 mb-2">
                        <label for="film-name" class="col-md-2 offset-md-2 text-white">
                            Tên phim
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="text" class="form-control" id="film-name" name="film-name">
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="film-name2" class="col-md-2 offset-md-2 text-white">
                            Tên phim 2
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="text" class="form-control" id="film-name2" name="film-name2">
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="status" class="col-md-2 offset-md-2 text-white">
                            Trạng thái
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="text" class="form-control" id="status" name="status">
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="director" class="col-md-2 offset-md-2 text-white">
                            Đạo diễn
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="text" class="form-control" id="director" name="director">
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="actor" class="col-md-2 offset-md-2 text-white">
                            Diễn viên
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="text" class="form-control" id="actor" name="actor">
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="category" class="col-md-2 offset-md-2 text-white">
                            Thể loại
                        </label>
                        <div class="col-md-10 offset-md-2">
                            <select id="category" style="color: black" name="category">
                                <?php 
                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($link, $sql);

                                    if (mysqli_num_rows($result) > 0) { 
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row["id"];?>">
                                            <?php echo $row["name"];?>
                                        </option>
                                <?php 
                                        }
                                    }  
                                    else {
                                        echo "No catagory";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="type" class="col-md-2 offset-md-2 text-white">
                            Type-movie 
                        </label>
                        <div class="col-md-10 offset-md-2">
                            <select id="type" style="color: black" name="type_movie">
                                <option value="1">Phim lẻ</option>
                                <option value="2">Phim bộ</option>
                                <option value="3">Phim rạp</option>
                                
                                
                                
                                <!-- <?php 
                                    $sql = "SELECT * FROM type_movie";
                                    $result = mysqli_query($link, $sql);

                                    if (mysqli_num_rows($result) > 0) { 
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row["id"];?>">
                                            <?php echo $row["name"];?>
                                        </option>
                                <?php 
                                        }
                                    }  
                                    else {
                                        echo "No nation";
                                    }
                                ?> -->
                            </select>
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="nation" class="col-md-2 offset-md-2 text-white">
                            Quốc gia
                        </label>
                        <div class="col-md-10 offset-md-2">
                            <select id="nation" style="color: black" name="nation">
                                <?php 
                                    $sql = "SELECT * FROM nation";
                                    $result = mysqli_query($link, $sql);

                                    if (mysqli_num_rows($result) > 0) { 
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row["id"];?>">
                                            <?php echo $row["name"];?>
                                        </option>
                                <?php 
                                        }
                                    }  
                                    else {
                                        echo "No nation";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="year" class="col-md-2 offset-md-2 text-white">
                            Năm phát hành
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <select id="year" name="year" id="year" style="color: black">
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="image" class="col-md-2 offset-md-2 text-white">
                        Link ảnh 
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="file" name="image_name" id="image_name" onchange="alertName()"/>
                            <input type="text" class="form-control" id="image_link" name="image" >
                            <p class="help-block text-white">
                                Ví dụ: /images/cuoc-chien-vo-cuc.jpg
                            </p>
                            <script>
                                function alertName() {
                                    var name =  document.getElementById("image_name").value;
                                    var n = name.lastIndexOf('\\'); 
                                    var result = name.substring(n + 1);
                                    document.getElementById("image_link").value = "image/" + result;
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="decription" class="col-md-2 offset-md-2 text-white">
                        Mô tả phim 
                        </label>
                        <div class="col-md-9 offset-md-2" style="color: black">
                            <textarea name="decription" id="decription" cols="82" rows="10"></textarea>
                        </div>
                    
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="duration" class="col-md-2 offset-md-2 text-white">
                        Thời lượng (phút)
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="number" class="form-control" id="duration" name="duration">
                        </div>
                    </div>
                    <div class="col col-sm-12 mb-2">
                        <label for="author" class="col-md-2 offset-md-2 text-white">
                        Tác giả
                        </label>
                        <div class="col-md-9 offset-md-2">
                            <input type="text" class="form-control" id="author" name="author">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-9 offset-md-2"></div>
                        <div class="col-md-3 offset-md-5 mt-3 mb-3">
                            <!-- <input class="btn btn-primary" type="submit" value="Post"> -->
                            <button type="submit" class="btn btn-primary" id="button_post" name="button_post">Đăng phim </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    <?php
    if(isset($_POST["button_post"])){
        $name = $_POST["film-name"];
        $name2 = $_POST["film-name2"];
        $status = $_POST["status"];
        $director = $_POST["director"];
        $actor = $_POST["actor"];
        $category = $_POST["category"];
        $type_movie = $_POST["type_movie"];
        $nation = $_POST["nation"];
        $year = $_POST["year"];
        $link_image = $_POST["image"];
        $link_film = '';
        $description = $_POST["decription"];
        $duration = $_POST["duration"];
        $author = $_POST["author"];
       
        $sql = "INSERT INTO film(name,name2,status,director,actor,category_id,type_movie,nation_id,year,image,description,duration,author)            
            VALUES ('$name', '$name2','$status','$director','$actor','$category','$type_movie','$nation','$year','$link_image','$description','$duration','$author')";
        $result = mysqli_query($link,$sql);
        var_dump($result);
        if($result){?>
            <script>
                alert("Insert film sucessfully!");
            </script>
        <?php
        } else { ?>
            <script>
                alert("Add film fail!"); -->
            </script>
        <?php }
    }
    ?>

</body>

</html>