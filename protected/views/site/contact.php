<div class="order-page">
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
    <h1><?php echo Yii::app()->user->getFlash('contact'); ?></h1>
</div>

<?php else: ?>

    <h1>Обратная связь</h1>
    <h2>Не забывайте указывать E-mail, на него будет отправлен ответ на ваше обращение!</h2>
    <div class="order-form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'contact-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
        <?php echo $form->errorSummary($model); ?>
        <table><tbody>
<?php $this->pageTitle='Написать нам'; ?>
            <tr>
                <td class="col1"><span>Имя:</span><?php echo $form->error($model,'name'); ?></td>
                <td>
                    <?php echo $form->textField($model,'name'); ?>
                </td>
            </tr>
            <tr>
                <td class="col1">
                    <span>E-mail:*</span>
                    <div>Для ответа.</div>
                    <?php echo $form->error($model,'email'); ?>
                </td>
                <td>
                    <?php echo $form->textField($model,'email'); ?>
                </td>
            </tr>
            <tr>
                <td class="col1">
                    <span>Вопрос:</span>
                    <?php echo $form->error($model,'body'); ?>
                </td>
                <td>
                    <?php echo $form->textArea($model,'body',array('rows'=>1, 'cols'=>1)); ?>
                </td>
            </tr>
            </tbody></table>
        <div class="block-bottom">
            <p>*Звёздочкой помечены поля,<br/>обязательные для заполнения</p>
            <div><input type="submit" value="Отправить"/></div>
        </div>
        <?php $this->endWidget(); ?>
    </div>

<?php endif; ?>
</div>