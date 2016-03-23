<?php
$config = require_once 'config.php';

try {
    $dsn = 'mysql:dbname='.$config['dbname'].';host='.$config['host'];
    $dbHandler = new PDO($dsn,$config['user'],$config['password']);
    $result = $dbHandler->query('select * from p_links ORDER BY times desc');
    $data = [];
    foreach ($result as $key => $row) {
        array_push($data, $row);
    }
} catch (PDOException $e) {
    echo "Connection failed:" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POST&GET请求模拟器</title>
    <link rel="stylesheet" href="./static/bootstrap/css/bootstrap.min.css">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/bootstrap/js/bootstrap.min.js"></script>
    <style>
        .wrap {
            margin-top: 10px;
            position: relative;
        }

        .params_value {
            width: 75%;
        }

        .params_name, .params_value {
            line-height: 1.5;
            padding: 5px 10px;
        }

        .rm-param {
            margin-left: 10px;
        }

        .params_name:focus, .params_value:focus {
            outline: none;
        }

        input[type='text'] {
            border: 1px solid #ddd;
            border-radius: 2px;
        }

        .link-list {
            position: absolute;
            display: block;
            width: 90%;
            background: #fff;
            list-style-type: none;
            margin-left: 90px;
            cursor: default;
            border: 2px solid #dddddd;
        }

        .link-list:hover {

        }

        .link-list li {
            padding: 10px;
        }

        .link-list li:hover {
            background: #eee;
        }
        body > div > form > ul:focus{
            background: #dddddd;
        }

    </style>
</head>
<body>

<div class="container wrap">
    <form action="">
        <h1 class="text-center">POST & GET 模拟器</h1>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">请求的URL</span>
            <input type="text" class="form-control" placeholder="input your link to request"
                   aria-describedby="basic-addon1" name="url"
                   value="http://192.168.0.252/edushi/api/index/newsList">
        </div>
                <ul style="display: none" class="link-list container">
                    <?php foreach ($data as $key => $value) : ?>
                        <li><?= $value['link'] ?></li>
                    <?php endforeach; ?>
                    <a href="javascript:;" style="position: absolute;right: 20px;top: 20px;color: #9d9d9d">按ESC键隐藏列表</a>
                </ul>
        <br>

        <table id="params_table" class="table table-bordered">
            <thead>
            <tr>
                <th width="35%">参数名</th>
                <th>参数值</th>
            </tr>
            </thead>
            <tbody id="param-body">
            <tr class="params_p" cnt="1">
                <td><input class="params_name input-text " type="text" name="p_name_1" title="参数名称" alt="参数名称" value=""></td>
                <td><input class="params_value input-text" type="text" name="p_value_1" title="参数数值" alt="参数数值" value="" maxlength="2000000000">
                    <button type="button" class="btn btn-default btn-sm rm-param">删除参数</button>
                </td>
            </tr>
            <tr class="params_p" cnt="2">
                <td><input class="params_name input-text " type="text" name="p_name_1" title="参数名称" alt="参数名称" value=""></td>
                <td><input class="params_value input-text" type="text" name="p_value_1" title="参数数值" alt="参数数值" value="" maxlength="2000000000">
                    <button type="button" class="btn btn-default btn-sm rm-param">删除参数</button>
                </td>
            </tr>
            <tr id="params_end">
                <td colspan="2">
                    <button type="button" class="btn btn-default btn-sm" id="addParam">添加参数</button>
                </td>
            </tr>
            </tbody>
        </table>

        <p class="text-center">
            <button type="button" class="btn btn-success text-center">提交</button>
        </p>

        <div class="highlight">
            <pre><code>此处显示返回的数据,如果没有返回，请查看控制台, --disable-web-security</code></pre>
        </div>
        <h4>接口地址参考：</h4>
        <ol>
            <li>http://192.168.0.254/edushi/index.php/api?ticket=0259d200b7493fa8015a5b28245aae36|1|1448500614</li>
            <li>http://192.168.0.252/aladingqa/app/qa?ticket=4d588010dd191734e31f8d5e3909c143|38|1446169772</li>
            <li>http://edushi.alajiaoyu.com/api/user/doLogin</li>
        </ol>
        <p class="text-center" style="margin-top: 100px">Powered By Jake</p>

    </form>
</div>

<script>

    //bug1 cnt的值可能会重复,应该找出最大的一个值
    //组装成对象
    //

    $(function () {
        //添加参数
        $("#addParam").click(function () {
            var length = $("tr.params_p").length;
            var max = $("tr.params_p").eq(0).attr('cnt');
            for (var i = 0; i < length; i++) {
                var current_cnt = parseInt($("tr.params_p").eq(i).attr('cnt'));
                if (current_cnt > max) {
                    max = current_cnt;
                }
            }
            max = max + 1;

            $("tr.params_p").last().after('' +
                    '<tr class="params_p" cnt="' + max + '">' +
                    '<td><input class="params_name input-text " type="text" name="p_name_1" title="参数名称" alt="参数名称" value=""' +
                    ' ></td>' +
                    ' <td><input class="params_value input-text" type="text" name="p_value_1" title="参数数值" alt="参数数值" value=""' + ' maxlength="2000000000" />' +
                    '<button type="button" class="btn btn-default btn-sm rm-param">删除参数</button>' +
                    '</td>' +
                    ' </tr>' +
                    '');
            //删除参数
            $(".rm-param").on('click', function () {
                $(this).parent().parent().remove();
            });
        });
        //删除参数
        $(".rm-param").on('click', function () {

            $(this).parent().parent().remove();
        });
        //发送请求
        $(".btn-success").click(function () {
            $(".highlight pre code").html("提交中...");
            var length = $("tr.params_p").length;
            var data = {};
            var key = null;
            var val = null;
            for (var i = 0; i < length; i++) {
                key = $("tr.params_p").eq(i).find("input.params_name").val();
                val = $("tr.params_p").eq(i).find("input.params_value").val();
                if (key != '') {
                    eval("data." + key + "='" + val + "'");
                }
            }


            console.log(data);


            $.ajax({
                url: $("input[name='url']").val(),
                type: 'post',
                data: data,
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $(".highlight pre code").html(JSON.stringify(result));
                },
                error: function (result, XMLHttpRequest, textStatus, errorThrown) {
                    $(".highlight pre code").html("发生错误，请查看控制台");
                    console.log('错误信息如下:\n');
                    console.log(result);
                    console.log(XMLHttpRequest);
                    console.log("错误: " + XMLHttpRequest + ";" + textStatus + ";" + errorThrown);
                }
            });

            $.post('http://192.168.0.252/poster/action.php',{action:'addLink',link:$("input[name='url']").val()},function(result){
                console.log(result);
            });
        });

        //链接下拉菜单
        $("body > div > form > div.input-group > input").focus(function () {
            var self;
            var list = $(this).parent().next('ul');
            list.show();
        });

        $("body > div > form > div.input-group > input").mouseenter(function(){
            $(this).focus();
        });

        $('ul.link-list').focus(function(){
            alert("bbbb");
        });


        $('ul.link-list li').click(function (e) {
            $("body > div > form > div.input-group > input").val($(this).text());
            $(this).parent().hide();
        });

        $('ul.link-list').mouseleave(function(){
            $('.link-list a').click();
        });

        //主入口
        $('.link-list a').click(function(){
            $('ul.link-list').hide();
            $('#param-body > tr:nth-child(1) > td:nth-child(1) > input').focus();
        });

        $(document).keydown(function(e){
            if(e.keyCode == 27){
                $('.link-list a').click();
            }
            if(e.keyCode == 13){
                $(".btn-success").click();
            }
        });

    })

</script>

</body>
</html>