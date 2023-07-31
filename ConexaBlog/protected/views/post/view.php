<head>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/category.css">
</head>

<div class="post">

    <div class="content">
        <div class="card m-2">
            <div class="card-body">
                <div class="card-title">
                    <h5>
                        <strong>
                            <?php echo CHtml::encode($post['title']); ?>
                        </strong>
                    </h5>
                    <caption class="card-text">
                        <small class="text-muted">
                            <?php echo 'Postado em ' . Yii::app()->dateFormatter->format('dd-MM-yyyy', strtotime($post['created_at'])); ?>
                            <?php echo 'por ' . CHtml::encode($post['user']['name']); ?>
                        </small>
                    </caption>
                </div>
                <?php if (isset($post['image_url'])): ?>
                    <img src="<?php echo CHtml::encode($post['image_url']) ?>" class=""
                        style="max-height: 400px; max-width: 100%; object-fit: contain;" alt="...">
                <?php endif; ?>
                <p class="card-text">
                <div>
                    <?php
                    $this->beginWidget('CMarkdown', array('purifyOutput' => true));
                    echo $post['content'];
                    $this->endWidget();
                    ?>
                </div>
                </p>
            </div>
        </div>
        <div id="comments" class="mt-5">
            <?php if (count($comments) >= 1): ?>
                <h3>
                    <?php echo count($comments) > 1 ? count($comments) . ' comentários ' : ''; ?>
                </h3>

                <?php $this->renderPartial(
                    '_comments',
                    array(
                        'post' => $post,
                        'comments' => $comments,
                    )
                ); ?>
            <?php endif; ?>
        </div>

        <div class="mt-4">
            <?php $this->renderPartial('/comment/_form', array(
                'model' => $comment,
            )
            ); ?>
        </div>
    </div>
</div>