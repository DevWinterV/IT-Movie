<?php
    include_once "checkpermission.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT</title>
    <STyle>
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 500px;
  margin: 0 auto;
  background-color: #f8f8f8;
  font-family: Arial, sans-serif;
}
body {
  background-color: #cccccc;
}
td, th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}
td{
    width: 100px;
}
th {
  background-color: #4CAF50;
  color: white;
}

input[type="text"], input[type="submit"], input[type="reset"] {
  padding: 8px;
  border-radius: 5px;
  border: none;
  background-color: #ddd;
  font-family: Arial, sans-serif;
  font-size: 14px;
  color: #333;
  margin-right: 10px;
}

input[type="submit"]:hover, input[type="reset"]:hover {
  cursor: pointer;
  background-color: green;
  color: white;
}
p{
    background-color:white;
    font-size: 27px;
    font-weight: bold;
    font-family: 'Times New Roman', Times, serif;
    color: red
}
#cbbNam{
 width:150px;   
}
#tieudebang{
    text-align: center;
}
tr{
    height: 10px;
    background-color: white;
    text-align:center;
    width: 50px;
}
#txt{
    width: 300px ;
}
  /* CSS cho menu dọc */
  .menu-dock {
            float: left;
            width: 20%;
            background-color: #f1f1f1;
            height: 100vh;
        }

        .menu-dock ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu-dock li {
            padding: 8px 16px;
            border-bottom: 1px solid #ddd;
        }

        .menu-dock li a {
            display: block;
            color: black;
            text-decoration: none;
        }

        .menu-dock li a:hover {
            background-color: #ccc;
        }

        /* CSS cho menu ngang */
        .menu-ngang {
            background-color: #333;
            overflow: hidden;
        }

        .menu-ngang a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .menu-ngang a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            margin-top: 50px;
            padding: 1px 16px;
        }
    </STyle>
</head>
<script>
    function showFilePath() {
        var fileInput = document.getElementById("taptin1");
        var filePath = fileInput.value;
        filePath = filePath.replace(/^.*\\/, "");
        var txtInput = document.getElementById("duongdan_input");
        txtInput.value = filePath;
    }
</script>
<body>

    <!-- Nội dung -->
    <div class="content">
<?php

                include_once "cauhinh.php";
                $ID = $_GET['id'];
                $ID2 = $_GET['id2'];
                $query = "select * from movies where movie_id = $ID";
                $danhsach = $connect->query($query);
                if(!$danhsach)
                {
                    die("Unable to execute SQL command: " .$connect->connect_error);
                    exit();
                }
                $row = $danhsach->fetch_array(MYSQLI_ASSOC);                                                                                        
                ?>
                 <form action='xulycapnhattheloai_phim.php?id=<?php echo"$ID"; ?>&id2=<?php echo"$ID2"; ?>' method= 'post' name ="f_themKH">
                <table border="0" cellpadding="0" align="center">
                <tr >
                        <th id ="tieudebang" colspan="2">
                            <font face="Times New Roman" size="5" color="#FFFFFF" align="CENTER">CẬP NHẬT</font>
                        </th>
                    </tr>
    
                <tr>
                    <td id="tenthuoctinh">
                        TÊN PHIM:
                    </td>
                    <td>
                    <select name="cbb_tenphim"  >
                        <option value="<?php echo"$ID"; ?>"> <?php echo"".$row["title"].""; ?> </option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td id="tenthuoctinh">
                        TÊN THỂ LOẠI:
                    </td>
                    <td>
                    <select name="cbb_tentheloai" class= "cbb_tentheloai" >
                        <?php
                            $listtheloai =  $connect->query("select * from genres where 1");
                            if(!$listtheloai)
                            {
                                die("Unable to execute Sql statement".$connect->connect_error);
                                exit();
                            }
                            while($rowtheloai = $listtheloai->fetch_array(MYSQLI_ASSOC))
                            {
                                echo "<option value='".$rowtheloai["theloai_id"]."'>";
                                echo $rowtheloai["ten_theloai"];
                                echo "</option>";
                            }
                            $connect->close();
                        ?>
                    </select>   
                    </td>
                </tr>
            ?>
            <tr >
                <td colspan ="2">
                    <input type="submit" value="CẬP NHẬT" name="btncapnhat">
                    <input type="submit" value="HỦY" name="btnhuy">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>