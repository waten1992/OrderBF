<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf-8" lang="utf-8">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>忘记密码</title>
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
        <h2 class="pink">Welcome to Orderbf!</h2>
      
      
      
        <div>
            <td style="padding-left: 50px">
                <form name="input" action="http://localhost/index.php/start/handle_forget" method="post">
                <table>
                    <tr>
                        <?php echo form_error('user_id'); ?>
                        <td>手机：</td>
                        <td><input type="text" name="user_id" value="<?php echo set_value('user_id'); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <?php echo form_error('email'); ?> 
                        <td>请输入邮箱：</td>
                        <td><input type="text" name="email" value="<?php echo set_value('email'); ?>" /></td>
                    </tr>
                    </table>
                    <div><input type="submit" value='submit' /></div>
                   </form>
                </td>                          
        </div>
        
      </body>
</html>

