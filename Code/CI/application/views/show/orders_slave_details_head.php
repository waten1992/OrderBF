<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>Orderbf Home</title>

        <!-- Bootstrap -->
        <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/css/he.css" rel="stylesheet" type="text/css">
        <script src="http://localhost/js/jquery-2.1.3"></script>
        <script src="http://localhost/js/bootstrap.min.js"></script>
        <script src="http://localhost/js/carousel.js"></script>
    </head>
    <body>
        <div class="page-header" >
            <table class="table  table-condensed" style="text-align: center;">
                <tr class="success" >
                    <td >
                        订单号
                    </td>
                    <td >

                        商品
                    </td>
                    <td >
                        数量
                    </td>

                    <td >
                        价格
                    </td>
                    <td >
                        是否评价
                    </td>
                </tr>
                <tbody>    
                    <?php
                    for ($i = 1; $i < $num; $i++) {
                        echo '<tr class="info" >';
                        foreach ($waten[$i] as $value) {
                            echo "<td>";
                            if($value === '0')
                                echo ' <a href="http://localhost/index.php/start/logout">
                                <button type = "button" class = " btn btn-default navbar-btn " >否</button>
                            </a> ';
                            else if ($value === '1')
                                echo '是';
                            else
                                echo $value;
                            echo "</td>";
                        }
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>