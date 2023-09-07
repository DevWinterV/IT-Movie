<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM PHIM</title>
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
    height: 20px;
    width: 300px;
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

.cbb_quocgia{
      width: 130px;
  }
#tieudebang{
    text-align: center;
}
tr{
    height:30px;
    background-color: white;
    text-align:center;
    width: 50px;
}
#txt{
    width: 300px ;
}
#tenthuoctinh{
    width: 30px ;
    height: 20px;
}
.btnthemquocgia{
    text-align: center;
    width: 130px ;
    height: 30px;
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

<body>

    <!-- Nội dung -->
    <div class="content">
<form action="xuly_themfilm.php" method="post" name ="f_themKH">
            <table border="0" cellpadding="0" align="center">
            <tr >
                    <th id ="tieudebang" colspan="2">
                        <font face="Times New Roman" size="5" color="#FFFFFF" align="CENTER">THÊM PHIM HOT</font>
                    </th>
                </tr>

            <tr>
                <td id="tenthuoctinh">
                    TÊN PHIM:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "txthoten" id ="txt" placeholder="Tên phim">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    MÔ TẢ
                </td>
                <td>
                <p id ="danhdau">
                    <textarea name="txtmota" id="txt" cols="50" rows="10" placeholder="Mô tả nội dung phim"></textarea>
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                NĂM PHÁT HÀNH:
            </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "txtnamphathanh" id ="txt" placeholder="Nhập năm phát hành">
                    *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    NGÔN NGỮ:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "txtngonngu" id ="txt" placeholder="Nhập ngôn ngữ">
                    *</p>
                </td>
            </tr>
            <tr  >
                    <td >QUỐC GIA</td>
                    <td>
                        <select name="cbb_quocgia" class= "cbb_quocgia" >
                        <?php
                                $servername ="localhost";
                                $username ="root";
                                $password ="";
                                $dbname ="movefilm";
                                // Connect database
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if($conn->connect_errno)
                                {
                                    die("Disconnect: " .$conn->connect_error);
                                    exit();
                                }
                                $query = "select * from country";
                                $danhsach = $conn->query($query);
                                if(!$danhsach)
                                {
                                    die("Unable to execute SQL command: " .$conn->connect_error);
                                    exit();
                                }
                                while($row = $danhsach->fetch_array(MYSQLI_ASSOC))
                                {
                                    echo("<option value=".$row["country_id"].">");
                                    echo($row["country_name"]);
                                    echo("</option>");
                                }
                                $conn->close();
                                                                                        
                        ?>
                        </select>
                        <input type="submit" value="THÊM QUỐC GIA" name="btnthemquocgia" class="btnthemquocgia">
                    </td>


            </tr>
            <tr>
                <td id="tenthuoctinh">
                   SEVER1:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "txtlink1" id ="txt" placeholder="Link1">
                    *</p>
                </td>
            </tr> <tr>
                <td id="tenthuoctinh">
                   SEVER2:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "txtlink2" id ="txt" placeholder="Link2">
                    *</p>
                </td>
            </tr>
            </tr> <tr>
                <td id="tenthuoctinh">
                    TẢI ẢNH:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="file" name="taptin1" id="taptin1" placeholder="Đường dẫn hình ảnh">
                    *</p>
                </td>
            </tr>
            <tr >
                <td colspan ="2">
                    (*): Các trường bắt buộc phải nhập thông tin.
                    <input type="submit" value="THÊM" name="btnthem">
                    <input type="submit" value="HỦY" name="btnhuy">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>