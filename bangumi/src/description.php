<html>
    <head>
        <meta charset="utf8"/>
        <title>十月新番导视</title>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
    </head>

    <body>
        <div class="ui text container" style="padding-top: 2em;padding-bottom: 2em">
            <div class="ui segment">
            <div class="ui medium images">
                <?php echo $_GET['id'] == '1' ? '<img src="https://lain.bgm.tv/pic/cover/l/29/03/325612_8oF64.jpg">' : '';?>
                <?php echo $_GET['id'] == '2' ? '<img src="https://lain.bgm.tv/pic/cover/l/93/b0/331535_6Lhh8.jpg">' : '';?>
                <?php echo $_GET['id'] == '3' ? '<img src="https://lain.bgm.tv/pic/cover/l/73/b8/333442_71ddd.jpg">' : '';?>
                <?php echo $_GET['id'] == '4' ? '<img src="https://lain.bgm.tv/pic/cover/l/9a/c1/296109_052vK.jpg">' : '';?>
                <?php echo $_GET['id'] == '5' ? '<img src="https://lain.bgm.tv/pic/cover/l/bc/6b/330973_HpbMw.jpg">' : '';?>
                <?php echo $_GET['id'] == '6' ? '<img src="https://lain.bgm.tv/pic/cover/l/e4/44/335225_UmKwl.jpg">' : '';?>
                <?php echo in_array($_GET['id'], array("1", "2", "3", "4", "5", "6")) ? '' : '<img src="https://z3.ax1x.com/2021/09/25/4r4iVg.png">';?>
            </div>
            <?php

            $servername = "127.0.0.1";
            $username = "root";
            $password = "root";
            $dbname = "bangumi";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                echo ("连接失败，请等待几秒钟，让数据库服务跑起来 ^_^ <br/>" . $conn->connect_error);
            }
            $id = $_GET['id'];

            if(preg_match("/[ ]|select|SELECT|union|UNION|from|FROM|group|GROUP|where|WHERE/", $id)) {
                die("请你停止对番剧数据库的攻击行为！");
            }

            $sql = "SELECT * FROM october WHERE id = $id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) { // 只输出第一行数据 增加难度
                $row = $result->fetch_assoc(); 
                echo str_replace("\n", "<br/>", $row["description"]) . "<br/>";
            } else {
                echo "";
            }
            $conn->close();
            ?>
            </div>
        </div>
    </body>
</html>
