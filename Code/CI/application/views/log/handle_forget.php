<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>找回密码</title>

        <!-- Bootstrap -->
        <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://localhost/js/jquery-2.1.3"></script>
        <script src="http://localhost/js/bootstrap.min.js"></script>
        <script src="http://localhost/js/carousel.js"></script>
    </head>

    <style type ="text/css">
        .login-form {
            position: relative;
            padding: 24px 23px 20px;
            background-color: #edeff1;
            border-radius: 6px;
        }
        .login-form .control-group {
            position: relative;
            margin-bottom: 6px;
        }
        .login-form .login-field {
            font-size: 17px;
            text-indent: 3px;
            border-color: transparent;
        }
        .login-form .login-field:focus {
            border-color: #1abc9c;
        }
        .login-form .login-field:focus + .login-field-icon {
            color: #1abc9c;
        }

        .login-link {
            display: block;
            margin-top: 15px;
            font-size: 13px;
            color: #bfc9ca;
            text-align: center;
        }
    </style>





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
                            <a href="http://localhost/index.php/start/login">
                                <button type = "button" class = " btn btn-default navbar-btn navbar-right" >Sign in</button>
                            </a>
                        </div>
                        <div >
                            <a href="http://localhost/index.php/shop_cart/index">  
                                <button class="btn btn-success navbar-btn " type="button" > 购物车 
                                    <span class="badge" > <?php echo $this->cart->total_items(); ?></span>
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
                <p style="font-size: 30px; color: green; text-align: center; "> Orderbf 专注为您设计早餐！</p>
                <p style="font-size: 25px; color: red; text-align: center;  "> 您已经成功提交</p>

            </div>
        </div>


        <div class="login-form" style="text-align: center; ">
            <div> 
                <h2>   
                    <?php
                    echo " 请你登录邮箱查看！";
                    echo br();
                    echo $_POST['email'];
                    ?>
                </h2>>
            </div>
        </div>



        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>




    </body>
</html>