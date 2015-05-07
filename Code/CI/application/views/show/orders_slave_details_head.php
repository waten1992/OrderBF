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
        <div class = "myheading">
            <nav class = "navbar navbar-inverse">
                <div class = "container">
                    <div class = "navbar-header">
                        <a class = "navbar-brand" href = "http://localhost/index.php/start">
                            <img src = "http://localhost/images/logo.gif" style = "width:75px">
                        </a>
                    </div>
                    <div class = "collapse navbar-collapse" >
                        <ul class = "nav navbar-nav"  >
                            <li ><a href ="http://localhost/index.php/start" >首页</a> </li>                          
                            <li class = "active"> <a href ="http://localhost/index.php/start/yourself">个人信息</a> </li>
                            <li > <a href ="http://localhost/index.php/start/list_record">历史账单记录</a> </li>
                        </ul>
                        <div>
                            <a href="http://localhost/index.php/start/logout">
                                <button type = "button" class = " btn btn-default navbar-btn navbar-right" >Sign Out</button>
                            </a>
                        </div>
                        <div >
                            <a href="http://localhost/index.php/shop_cart/index">  
                                <button class="btn btn-success navbar-btn " type="button" > 购物车 
                                    <span class="badge"> <?php echo $this->cart->total_items(); ?></span>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        
        
        
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
                        $index = 1;
                        foreach ($waten[$i] as $value) {
                            echo "<td>";

                            if ($value === '0')
                                echo ' <a href="http://localhost/index.php/comments/add_comment">
                                <button type = "button" class = " btn btn-link " >添加评论</button>
                                     </a> ';
                            else if ($value === '1' && ($index % 5 === 0))
                                echo ' <a href="http://localhost/index.php/comments/add_comment">
                                <button type = "button" class = " btn btn-success  " >是</button>
                            </a> ';
                            else
                                echo $value;
                            echo "</td>";
                            $index++;
                        }
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>