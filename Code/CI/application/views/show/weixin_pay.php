<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="10; url = http://localhost/index.php/start" /><!-- 10秒钟后自动跳转到登主界面  -->
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>微信支付</title>

        <!-- Bootstrap -->
        <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://localhost/js/jquery-2.1.3.js"></script>
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
                        </ul>
                        <div>
                            <a href="http://localhost/index.php/start/logout">
                                <button type = "button" class = " btn btn-default navbar-btn navbar-right" >Sign Out</button>
                            </a>
                        </div>

                    </div>

                </div>
            </nav>
        </div>
        <div class = "container">
            <div class="jumbotron" style="text-align: center; "> 
                <h1>Welcome to Orderbf</h1>
                <p style="font-size: 30px; color: green; text-align: center; margin-top: 30px; ">请用微信扫码支付</p>
                <p>  <a style="text-align: center; margin-top: 30px; " href = "http://localhost/index.php/start">
                        <img src = "http://localhost/images/er_wei_ma.jpg" style="width: 344px; height: 344px;" >
                    </a>
                </p>

                <p> <a class="btn btn-info btn-lg" href="http://localhost/index.php/start" role="button">支付不成功？</a></p>
            </div>
        </div>




        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>




    </body>
</html>