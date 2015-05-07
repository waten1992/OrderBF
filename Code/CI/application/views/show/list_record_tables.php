<div class = "container">
    <div class="page-header" style="text-align: center;">
        <p> 
            <button type = "button" class = " btn btn-info  "  > 订单号：  
                <?php
                echo $order_id;
                ?>
            </button>
            <button type = "button" class = " btn btn-info  " > 商品： 
                <?php
                foreach ($item_name as $value) {
                    echo $value . " ";
                }
                ?>
            </button> 
            <button type = "button" class = " btn btn-info  " > 时间： 
                <?php
                echo $createtime;
                ?>
            </button> 
             <button type = "button" class = " btn btn-info  " > 地址： 
                <?php
                echo $address;
                ?>
            </button> 
            <button type = "button" class = " btn btn-success  " > 总金额： 
                <?php echo $amount; ?>
            </button>
            <a href="http://localhost/index.php/shop_cart/show_orders_slave_details/<?php echo $order_id; ?>">
                                <button type = "button" class = " btn btn-primary " >详情</button>
                            </a>
        </p>



    </div>
</div>