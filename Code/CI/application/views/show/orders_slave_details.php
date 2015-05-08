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
             
                    echo $item_name ;
             
                ?>
            </button> 
            <button type = "button" class = " btn btn-info  " > 数量： 
                <?php
                echo $quantity;
                ?>
            </button> 
             <button type = "button" class = " btn btn-info  " > 价格： 
                <?php
                echo $price;
                ?>
            </button> 
          
            <a href="http://localhost/index.php/comments/hand_comment/<?php echo $item_id;  echo '/'.$is_comment;echo '/'.$order_id;  ?>">
                <button type = "button" class = " btn btn-primary " ><?php 
                    if($is_comment === '0')
                        echo "评价一下吧～";
                    else
                        echo "已评价";
                ?></button>
                            </a>
        </p>



    </div>
</div>