<head>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/category.css">
</head>

<div class="post">

    <div class="content">
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title ">
                    <strong>
                        <?php echo CHtml::encode($post['title']); ?>
                    </strong>
                </h5>
                <?php if (isset($post['image_url'])): ?>
                    <img src="<?php echo CHtml::encode($post['image_url']) ?>" class="card-img-top" alt="...">
                <?php endif; ?>
                <p class="card-text">
                    <small class="text-muted">
                        <?php echo 'Postado em ' . Yii::app()->dateFormatter->format('dd-MM-yyyy HH:mm', strtotime($post['created_at'])); ?>
                        <?php echo 'por ' . CHtml::encode($author['name']); ?>
                    </small>
                </p>

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
        <div id="comments">
            <?php if (count($comments) >= 1): ?>
                <h3>
                    <?php echo count($comments) > 1 ? count($comments) . ' comments' : 'One comment'; ?>
                </h3>

                <?php $this->renderPartial('_comments', array(
                    'post' => $post,
                    'comments' => $comments,
                )
                ); ?>
            <?php endif; ?>


        </div>
    </div>
</div>