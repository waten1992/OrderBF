<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>订单确认</title>

        <!-- Bootstrap -->
        <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">
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
                            <li class = "active"><a href ="http://localhost/index.php/start" >首页</a> </li>                          
                            <li > <a href ="http://localhost/index.php/start/about">关于orderbf</a> </li>
                            <li > <a href ="http://localhost/index.php/start/contact">联系orderbf</a> </li>
                            <li > <a href ="http://localhost/index.php/start/yourself"><?php echo $name; ?>  </a> </li>
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



        <div class="row-fluid">
            <div class="span12">
                <table class="table" style="margin-left: 30px; margin-right: 30px; margin-top: 40px;">
                    <thead>
                        <tr >
                            <th>
                                手机
                            </th>
                            <th>
                                送货地址
                            </th>
                            <th>
                                商品
                            </th>
                            <th>
                                总价
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="info" >
                            <td>
                                <?php echo $name; ?>
                            </td>
                            <td>
                                <?php echo $address; ?>
                            </td>
                            <td>
                                <?php
                                foreach ($num as $value) {
                                    echo $value . " ";
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $amount; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <div style="margin-right: 20px;">
            <a href="http://localhost/index.php/shop_cart/handle_settled">
                <button type = "button" class = " btn btn-success navbar-btn navbar-right" style="font-size: 30px;margin-right: 20px;" >去结算</button>
            </a>
        </div>


    </body>
</html>