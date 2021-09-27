<?php
    setcookie("name", "5hr1m9wr");
    function progress()
    {
        $weight = "";
        isset($_GET['VaalaCat']) && $_GET['VaalaCat'] == 'yyds' ? $weight .= "1" : $weight .= "0";
        isset($_POST['Niebelungen']) && $_POST['Niebelungen'] == 'yyds' ? $weight .= "1" : $weight .= "0";
        $_COOKIE['name'] == '7att1ce' ? $weight .= "1" : $weight .= "0";
        strpos($_SERVER['HTTP_X_FORWARDED_FOR'], '255.256.257.258') !== false ? $weight .= "1" : $weight .= "0"; #平台上的HTTP_X_FORWARDED_FOR会有这样的效果 HTTP_X_FORWARDED_FOR：255.256.257.258, 112.6.224.44, 192.168.1.1。故需要用查看是否存在255.256.257.258
        $_SERVER["HTTP_REFERER"] == 'https://space.bilibili.com/199118139' ? $weight .= "1" : $weight .= "0";
        return $weight;
    }
?>
<html>
<head>
  <meta charset="utf8" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
  <title>图灵测试</title>
</head>

<body>
  <div style="padding-top: 5em;"></div>
  <div class="ui text container">
    <div class="ui icon message">
      <i class="notched circle loading icon"></i>
      <div class="content">
        <div class="header">
          图灵测试
        </div>
        <p>为了防止人类拿到flag，宁需要满足以下条件以证明宁是机器人。</p>
      </div>
    </div>
    <div class="ui indicating progress" data-value="<?php $weight = progress(); echo substr_count($weight, "1");?>" data-total="5" id="progress">
      <div class="bar">
        <div class="progress"></div>
      </div>
      <div class="label">Turing Test Progress</div>
    </div>
    <div class="ui inverted segment"> <!-- step -->
      <div class="ui inverted vertical steps">
        <div class="<?php $weight = progress(); echo ($weight[0] == 1 ? 'completed' : '')?> step">
          <i class="skull crossbones icon"></i>
          <div class="content">
            <div class="description">用GET方式提交一个名为<span class="ui big blue text">VaalaCat</span>，值为<span class="ui big success text">yyds</span>的变量</div>
          </div>
        </div>
        <div class="<?php $weight = progress(); echo ($weight[1] == 1 ? 'completed' : '')?> step">
          <i class="skull crossbones icon"></i>
          <div class="content">
            <div class="description">用POST方式提交一个名为<span class="ui big blue text">Niebelungen</span>，值为<span class="ui big success text">yyds</span>的变量</div>
          </div>
        </div>
        <div class="<?php $weight = progress(); echo ($weight[2] == 1 ? 'completed' : '')?> step">
          <i class="skull crossbones icon"></i>
          <div class="content">
            <div class="description">你的名字必须叫做<span class="ui red big text">7att1ce</span></div>
          </div>
        </div>
        <div class="<?php $weight = progress(); echo ($weight[3] == 1 ? 'completed' : '')?> step">
          <i class="skull crossbones icon"></i>
          <div class="content">
            <div class="description">你的<span class="ui info big text">ip</span>必须是<span class="ui warning big text">255.256.257.258</span></div>
          </div>
        </div>
        <div class="<?php $weight = progress(); echo ($weight[4] == 1 ? 'completed' : '')?> step">
          <i class="skull crossbones icon"></i>
          <div class="content">
            <div class="description">你的<span class="ui info big text">请求</span>必须来自<span class="ui warning big text">https://space.bilibili.com/199118139</span></div>
          </div>
        </div>
      </div>
    </div>
    <?php
      echo (progress() == "11111") ? '<div class="ui inverted segment">恭喜你，你被系统成功认定为机器人，这是flag所在文件 <span class="ui success big text"> fl4g1sH3r3.php </span> 希望作为机器人，希望你也能变成<span class="ui warning big text">光</span>。</div>': ''; 
    ?>
  </div>
</body>

</html>

<script>
  $('#progress')
    .progress({
      label: 'ratio',
      text: {
        ratio: '{value} / {total}'
      }
    })
    ;
</script>