<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>登录</title>

        <!-- Bootstrap -->
        <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/css/he.css" rel="stylesheet" type="text/css">
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
                <p style="font-size: 25px; color: red; text-align: center;  "> 请您登录</p>

            </div>
        </div>


        <div class="login-form" style="text-align: center; ">
            <form name="input" action="http://localhost/index.php/start/login" method="post">
                <div class="control-group"   >
                    <?php echo form_error('user_id'); ?>
                   手机： <input  type="text"  name="user_id" value="<?php echo set_value('user_id'); ?>" class="login-field" placeholder="请输入手机号码" id="login-name">
                    <label class="login-field-icon fui-man-16" for="login-name"></label>
                </div>

                <div class="control-group" >
                    <?php echo form_error('passwd'); ?>
                    密码：<input type="password" name="passwd"  value="<?php echo set_value('passwd'); ?>" class="login-field"  placeholder="请输入密码" id="login-pass">
                    <label class="login-field-icon fui-lock-16" for="login-pass"></label>
                </div>
                <input type="submit"  method="get" class="btn btn-primary btn-large btn-block" role="button" value='点击我就可登录了哦' />
              
                <a class="login-link" href="http://localhost/index.php/start/forget">忘记密码？</a>
            </form>
        </div>



        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>




    </body>
</html>