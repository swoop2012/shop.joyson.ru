<?php $this->beginContent('//layouts/main_template');?>
<div id="column-left">

    <?php $this->renderFile(Yii::getPathOfAlias('application.views.layouts.left_column').'.php');?>
	
	<div id='basket-container'>
    <?php // $this->drawBasket();?>
    </div>
</div>

<div id="column-right">
        <?php echo $content; ?>
</div>
<?php $this->endContent();?>