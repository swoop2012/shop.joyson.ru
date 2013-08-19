<ul class="catalog">
	<?php if(!empty($data)):?>
	<?php foreach($data as $key=>$value):?>
	<li>
		<div class="p-img">
			
			<?php $image = file_exists($value->PictureMain)?$value->PictureMain:'/images/temp/kview.png';
			echo CHtml::link(CHtml::image($image),$this->createUrl('/product/index',array('id'=>$value->id)));?>
		</div>
		<div class="p-right">
			<div class="product-link">
				<?php echo CHtml::link($value->ShortName,$this->createUrl('/product/index',array('id'=>$value->id)),array('title'=>$value->ShortName));?>
			</div>
		    <?php if(isset($value->one_subproduct[0])):?>
			<div class="p-quantity">
				<span><?php echo $value->one_subproduct[0]->Size;?></span>
			</div>
			<div class="price">от<span><?php
                    $price = Calculate::getPrice($value->one_subproduct[0]->Price,$value->UpPrice);
                    echo Calculate::Devide($price,$value->one_subproduct[0]->Count);?></span><div class="rubl">i</div></div>
		    <?php endif;?>
			<div class="description">
				<?php echo $value->ShortDescriptionMain;?>
			</div>
		</div>
	</li>
	    <?php if(($key+1)%2==0):?>
	    <li class="clear"></li>
	    <?php endif;?>
	<?php endforeach;?>
	<?php endif;?>
</ul>
<div class="text">
    <?php echo $article?$article->Text:'';?>
</div>
