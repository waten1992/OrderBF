<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>评论</title>

        <!-- Bootstrap -->
        <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/css/he.css" rel="stylesheet" type="text/css">
        <script src="http://localhost/js/jquery-2.1.3.js"></script>
        <script src="http://localhost/js/bootstrap.min.js"></script>
        <script src="http://localhost/js/carousel.js"></script>
    </head>
    <body>
        <div class = "container">
            <div class="jumbotron" style="text-align: center; "> 
                <p>
                     <h3 style="color: red;">请输入你对<?php echo $item_name; ?>评价</h3>
                </p>
               

                <form action="http://localhost/index.php/comments/add_comment" method="post">
                    <p>
                    <textarea  name ="body" cols=40 rows=8>
                    </textarea>
                    </p>
                    <input type="hidden" name="order_id" value=<?php echo $order_id; ?> />
                    <input type="hidden" name="item_id" value=<?php echo $item_id; ?> />
                    <input type="hidden" name="user_id" value=<?php echo $user_id; ?> />
                    <input type="submit"  method="post" class="btn btn-primary" role="button" value='添加评论' />

                </form>


            </div>
        </div>
    </body>
</html>