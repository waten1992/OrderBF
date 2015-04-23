<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf-8" lang="utf-8">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>更改密码</title>
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
      
      
      
        <div>
            <td style="padding-left: 50px">
                <form name="input" action="http://localhost/index.php/start/handle_refill_passwd" method="post">
                <table>            
                    <tr>
                         <?php echo form_error('passwd'); ?>
                        <td>新密码：</td>
                        <td><input type="password" name="passwd"  value="<?php echo set_value('passwd'); ?>" /></td>
                    </tr>
                    
                    <tr>
                         <?php echo form_error('passconf');  ?>
                        <td>密码确认：</td>
                        <td><input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" /></td>
                    </tr>
                    
                    </table>
                    <div><input type="submit" value='submit' /></div>
                   </form>
                </td>
                                    
        </div>
        

                        </body>
                        </html>

