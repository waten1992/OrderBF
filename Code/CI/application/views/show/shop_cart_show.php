<!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="orderbf,定早餐,毕业设计,独立博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>购物车</title>

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

                            <li > <a href ="http://localhost/index.php/start/about">关于orderbf</a> </li>
                            <li > <a href ="http://localhost/index.php/start/contact">联系orderbf</a> </li>
                            <li > <a href ="http://localhost/index.php/start/yourself">个人信息</a> </li>
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


        <div>
            <?php echo form_open('index.php/start'); ?>

            <table cellpadding="6" cellspacing="1" style="width:100%; margin-top: 30px; margin-left: 40px;" border="0">

                <tr >
                    <th style="margin-left: 50px; "><h4>数量</h4></th>
                <th style="margin-left: 200px;"><h4>商品描述</h4></th>
                <th style="margin-right: 100px;"><h4>价格</h4></th>
                <th style="margin-right: 20px;"><h4>小计</h4></th>
                </tr>

                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>

                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                    <tr >
                        <td >
                            <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                        </td>
                        <td>
                            <?php echo $items['name']; ?>

                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                        <strong ><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                    <?php endforeach; ?>
                                </p>

                            <?php endif; ?>

                        </td>
                        <td style="margin-right: 100px;"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="margin-right: 20px;"><?php echo $this->cart->format_number($items['subtotal']); ?>￥</td>
                    </tr>

                    <?php $i++; ?>

                <?php endforeach; ?>
                <br/>
                <tr>
                    <td colspan="2"> </td>
                    <td class="margin-right: 20px;"><strong><h3>总计:</h3></strong></td>
                    <td class="margin-right: 20px;"><h3><?php echo $this->cart->format_number($this->cart->total()); ?>￥</h3></td>
                </tr>
            </table>
        </div>

        <div style="margin-right: 20px;">
            <a href="http://localhost/index.php/shop_cart/settled">
                <button type = "button" class = " btn btn-success navbar-btn navbar-right" style="font-size: 30px;margin-right: 20px;" >去结算</button>
            </a>
        </div>





        <script>
            $(".navbar-nav a").click(function (e) {
                $(this).tab("show");
            })
        </script>

    </body>
</html>