<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>历史记录</title>

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

        <div class = "container">
            <div class="row-fluid">
                <div class="span12">
                    <table class="table" style="margin-left: 30px; margin-right: 10px; margin-top: 40px;">
                        <thead>
                            <tr >
                                <th>
                                    订单号
                                </th>
                                <th>
                                    商品
                                </th>
                                <th>
                                    创建时间
                                </th>
                                <th style="text-align: center;">
                                    总价
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>





        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>

    </body>
</html>