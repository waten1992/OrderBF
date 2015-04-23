<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf-8" lang="utf-8">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <title>Home</title>
    </head>
    <style>
        body {
            width: 35em;
            margin: 0 auto;
            padding: 5px;
            font-family: Tahoma, Verdana, Arial, sans-serif;
        }

    </style>
    <body>
        <ul>
            <li><a href = "http://localhost/index.php/start/index">主页</a></li>
            <li><a href = "http://localhost/index.php/start/contact">联系方式</a></li>
            <li><a href = "http://localhost/index.php/start/about">关于Orderbf</a></li>
            <li><a href = "http://localhost/index.php/start/register">注册</a></li>
            <li><a href = "http://localhost/index.php/start/login">登录</a></li>
        </ul>
        <h2>Welcome to Orderbf!</h2>
        <?PHP
        echo mailto('me@my-site.com', 'Click Here to Contact Me',array());
        ?>
      
    </body>
</html>
