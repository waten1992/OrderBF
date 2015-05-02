<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>修改个人信息</title>

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
            <div class="jumbotron" style="text-align: center; "> 
                <h1 style="text-align: center;">Welcome to Orderbf</h1>
                <p style="font-size: 40px; color: red; text-align: center; margin-top: 30px; "> 请输入你需要修改的项目</p>
                <p> <a class="btn btn-info btn-lg" href="http://localhost/index.php/start/change_info" role="button">修改地址</a></p>
                <p> <a class="btn btn-info btn-lg" href="http://localhost/index.php/start/change_info" role="button">修改邮箱</a></p>
            </div>
        </div>


        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>

    </body>
</html>