<?php
    include("navbar.php");
    header("Content-Type: text/html; charset=utf-8");
    require_once("database.php");
    session_start();

    require_once("login_check.php");

    $query_RecMember = "SELECT * FROM `member` WHERE `account`='" . $_SESSION["account"] . "'";
    $RecMember = mysqli_query($conn,$query_RecMember);
    $row_Recmember = mysqli_fetch_assoc($RecMember);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="Description" content="中國文化大學113年畢業專題製作，組別B-07">
    <title>文大線上點餐系統</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script language="javascript">
        function checkForm(){
            if(document.form1.name.value ==""){
                alert("請輸入姓名");
                document.form1.name.focus();
                return false;
            }
            if(document.form1.email.value ==""){
                alert("請輸入Email");
                document.form1.email.focus();
                return false;
            }
            if(document.form1.phoneNumber.value ==""){
                alert("請輸入電話");
                document.form1.phoneNumber.focus();
                return false;
            }
            if(!checkmail(document.form1.email)){
                document.form1.email.focus();
                return false;
            }
            return confirm('確定送出嗎?');
        }
        function checkmail(myemail){
            var filter =
            /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(filter.test(myemail.value)){
                return true;
            }
            alert("Email格式不正確!");
            return false;
        }
    </script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div>

    <table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
        <tr valign="top">
            <td width="600">
                <form action="member_update.php" method="POST" name="form1" onsubmit="return checkForm();">
                <p align="center"><b><font size="10" face="標楷體" color="#0000FF">修改會員資料</font></p>

                <div>
                <hr size="1" />
                <p><font size="6"><strong>帳號</strong>:
                    <input name="account" type="text" value="<?php echo $row_Recmember["account"];?>" disabled="true">
                    <font color="#FF0000">無法更改帳號</font>
                </p>

                <p><strong>姓名</strong>:
                    <input name="name" type="text" value="<?php echo $row_Recmember["name"];?>">
                    <font color="#FF0000">*必填</font>
                </p>

                <p><strong>Email</strong>:
                    <input name="email" type="email" value="<?php echo $row_Recmember["E-mail"];?>">
                    <font color="#FF0000">*必填</font>
                </p>

                <p><strong>手機號碼</strong>:
                    <input name="phoneNumber" type="tel" value="<?php echo $row_Recmember["phoneNumber"];?>">
                    <font color="#FF0000">*必填</font>
                </p>
                </div>
                <hr size="1" />
                <p align="center">
                    <input type="hidden" name="id" value="<?php echo $row_Recmember["id"];?>">
                    <input type="submit" name="update" value="修改資料">
                    <input type="reset" name="reset" value="重設資料">
                </p>
                </form>
            </td>
        </tr>
    </table>
</div>
    <!-- javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html> 
