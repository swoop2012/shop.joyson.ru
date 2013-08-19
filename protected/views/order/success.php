<div class="order-page">
    <h1>Заказ №<?php echo $order['orderNumber'];?></h1>
    <div class="pp-confirm">
        <p>Ваш заказ принят. Спасибо.</p>
		<p>Мы доставим ваш заказ: <?php echo $delivery->Name;?></p>
        <?php if(!empty($order['newPromo'])):?>
        <h3>Ваш персональный промо-код: <?php echo $order['newPromo'];?></h3>
		<p>У нас действуют накопительные промо-коды. Уже при следующем заказе указав ваш промо-код вы получите скидку — 5%. После 2-го заказа скидка будет увеличена до — 10%.</p>
        <?php endif;?>
        <h3>Как оплатить <b><?php echo $payment->Name;?></b></h3>
        <?php echo $payment->Description;?>
        <h3>Ваш заказ</h3>
		<p>Полное ФИО: <?php echo $order['form']['fullName'];?><br>
            Номер телефона: <?php echo $order['form']['phone'];?><br>
            E-mail: <?php echo $order['form']['email'];?><br>
            <?php if($order['form']['typeDelivery']==1):?>
            Город, область: <?php echo $order['form']['cityRegion'];?><br>
            Индекс: <?php echo $order['form']['index'];?><br>
            <?php endif;?>
            Адрес: <?php echo $order['form']['address'];?><br>
            Комментарий к заказу: <?php echo $order['form']['comment'];?><br>
        </p>

        <div class="order-confirm">
            <table><tbody>
                <?php if(!empty($order['subproducts'])):?>
                    <?php foreach($order['subproducts'] as $product):?>
                        <tr>
                            <td class="col1"><?php echo $product['Name'].' '.$product['CountIn'].'x'.$product['Size'].' ('. Calculate::Devide($product['Price'],$product['CountIn']).' р./шт)';?></td>
                            <td class="col2"><?php echo $product['Count'];?>шт</td>
                            <td class="col3"><?php echo round($product['Count']*$product['Price']);?><div class="rubl">i</div></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                <tr>
                    <td>Доставка: <?php echo $delivery->Name;?></td>
                    <td></td>
                    <td><?php echo Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf);?><div class="rubl">i</div></td>
                </tr>
                <?php if(isset($order['Discount']['Discount'])):?>
                    <tr>
                        <td>Скидка <?php echo $order['Discount']['Discount'];?>%</td>
                        <td></td>
                        <td>-<?php echo $order['discountSum']?><div class="rubl">i</div></td>
                    </tr>
                <?php endif;?>
                <?php if(!empty($bonus)):?>
                    <tr>
                        <td>Бонусный товар:</td>
                        <td></td>
                        <td><?php echo isset($bonus['Bonus'])?$bonus['Bonus']:'';?></td>
                    </tr>
                <?php endif;?>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><b>Итого</b></td>
                    <td></td>
                    <td><b><?php echo ($order['totalSum']+Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf));?><div class="rubl">i</div></b></td>
                </tr>
                </tbody></table>
        </div>



    </div>
</div>