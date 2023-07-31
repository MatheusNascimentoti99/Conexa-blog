<div class="form">

    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'post-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            )
        )
    ); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 80, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'image_url'); ?>
        <?php echo $form->textField($model, 'image_url', array('size' => 80, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'image_url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo CHtml::activeTextArea($model, 'content', array('rows' => 10, 'cols' => 70)); ?>
        <p class="hint">Você pode usar <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">
                Markdown</a>.</p>
        <?php echo $form->error($model, 'content'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'categoryId'); ?>
        <?php echo $form->dropDownList($model, 'categoryId', CHtml::listData($categories, 'id', 'name')); ?>
        <?php echo $form->error($model, 'categoryId'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Enviar', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->