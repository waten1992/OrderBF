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
        <script src="http://localhost/js/jquery-2.1.3"></script>
        <script src="http://localhost/js/bootstrap.min.js"></script>
        <script src="http://localhost/js/carousel.js"></script>
    </head>
    <body>
        <div class = "container">
            <div class="jumbotron" style="text-align: center; "> 
                <h2>请输入你的评价</h2>

                <form action="http://localhost/index.php/comments/hand_comment" method="get">
                    <textarea name="MSG" cols=40 rows=8>
                  
                    </textarea>
                    <p>
                    <input type="submit"  method="get" class="btn btn-primary" role="button" value='添加评论' />
                    </p>
                </form>


            </div>
        </div>
    </body>
</html>