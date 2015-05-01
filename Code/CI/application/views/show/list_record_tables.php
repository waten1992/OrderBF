<div class = "container">
         <div class="row-fluid">
            <div class="span12">
                <table class="table" style="margin-left: 30px; margin-right: 30px; margin-top: 20px;">
                    <tbody>
                        <tr class="info" >
                            <td>
                                <?php
                             
                                    echo $order_id ;
                              
                                ?>
                            </td>
                            <td style="text-align: center;">
                               <?php
                                foreach ($item_name as $value) {
                                    echo $value . " ";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                               
                                    echo $createtime;
                          
                                ?>
                            </td>
                            <td>
                                <?php echo $amount; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>