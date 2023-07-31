<div class="card m-2">
    <div class="card-body p-4">
        <div class="d-flex flex-start w-100">
            <?php if (isset($comment['user']['photo'])): ?>
                <img class="rounded-circle shadow-1-strong" src="<?php echo $comment['user']['photo'] ?>" alt="avatar"
                    width="65" />
            <?php endif ?>
            <div class="w-100">
                <h5>Adicione um comentário</h5>
                <?php $form = $this->beginWidget(
                    'CActiveForm',
                    array(
                        'id' => 'comment-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                    )
                ); ?>

                <div class="row">
                    <?php echo $form->labelEx($model, 'content'); ?>
                    <?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50, 'class' => 'mb-4 mt-4 p-4')); ?>
                    <?php echo $form->error($model, 'content'); ?>
                </div>

                <div class="row">
                    <?php echo CHtml::submitButton('Enviar', ['class' => ' btn btn-primary']); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>

</div>