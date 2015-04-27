<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>Bootstrap 101 Template</title>

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
                            <li class = "active"><a href ="http://localhost/index.php/start" >首页</a> </li>                          
                            <li > <a href ="http://localhost/index.php/start/register">注册</a> </li>
                            <li > <a href ="http://localhost/index.php/start/about">关于orderbf</a> </li>
                            <li > <a href ="http://localhost/index.php/start/contact">联系orderbf</a> </li>
                        </ul>
                        <div>
                            <a href="http://localhost/index.php/start/login">
                                <button type = "button" class = " btn btn-default navbar-btn navbar-right" >Sign in</button>
                            </a>
                        </div>
                        <div >
                            <a href="http://localhost/index.php/shop_cart/index">  
                                <button class="btn btn-success navbar-btn " type="button" > 购物车 
                                    <span class="badge"> <?php echo $num; ?></span>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <div class = "container">
            <div class="jumbotron" style="text-align: center; "> 
                <h1>Welcome to Orderbf</h1>
                <p style="font-size: 30px; color: green; text-align: center; margin-top: 30px; "> Orderbf 专注为您设计早餐</p>
                <p> <a class="btn btn-info btn-lg" href="http://localhost/index.php/start/about" role="button">详情</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://localhost/images/pd/Soybean.png" alt="这个是豆浆" style="width: 350px; height: 350px;">
                    <div class="caption">
                        <h3 style="color: green"><?php echo $soybean_name; ?></h3>
                        <p style="color: red">价格:<?php echo $soybean; ?>￥</p>
                        <p><?php echo $soybean_pd; ?></p>
                        <form action="http://localhost/index.php/shop_cart/add/100">
                            数量: <input type="number" name="qty" min="1" max="10" value="1"/>
                            <input type="hidden" name="item_id" value="100" />
                            <input type="submit"  method="get" class="btn btn-primary" role="button" value='加入购物车' />
                        </form>
                        <br>
                        <p> <a href="#" class="btn btn-info" role="button">选我,我最好喝了啦</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://localhost/images/pd/bread01.jpg" alt="这个是面包" style="width: 350px; height: 350px;">
                    <div class="caption">
                        <h3 style="color: green"><?php echo $bread_name; ?></h3>
                        <p style="color: red">价格:<?php echo $bread; ?>￥</p>
                        <p><?php echo $bread_pd; ?></p>
                        <form action="http://localhost/index.php/shop_cart/add/200">
                            数量: <input type="number" name="qty" min="1" max="10" value="1"/>
                            <input type="hidden" name="item_id" value="200" />
                            <input type="submit"  method="get" class="btn btn-primary" role="button" value='加入购物车' />
                        </form>
                        <br/>
                        <p><a href="http://localhost/index.php/shop_cart/add" class="btn btn-info" role="button">选我啦，我最好吃啦</a> </p>
                    </div>
                </div>
            </div>
            
        </div>



        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>
        <script>
            var cart = document.getElementById("cart");
            cart.addEventListener("click", test);
            function test()
            {
                alert("this is a test");
            }
        </script>
    </body>
</html>