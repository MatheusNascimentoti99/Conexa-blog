<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/category.css">
</head>

<div class="post">

	<div class="content">
		<div class="card m-2">
			<div class="card-body">
				<h5 class="card-title ">
					<strong>
					<?php echo CHtml::encode($data['title']); ?>
					</strong>
				</h5>
				<?php if (isset($data['image_url'])): ?>
					<img src="<?php echo CHtml::encode($data['image_url']) ?>" class="card-img-top" alt="...">
				<?php endif; ?>
				<p class="card-text">
					<small class="text-muted">
						<?php echo 'Postado em ' . Yii::app()->dateFormatter->format('dd-MM-yyyy', strtotime($data['created_at'])); ?>

					</small>
				</p>

				<p class="card-text">
				<div id="postMarkdown">
					<?php
					$this->beginWidget('CMarkdown', array('purifyOutput' => true));
					echo $data['content'];
					$this->endWidget();
					?>
				</div>
				</p>
				<?php echo CHtml::link('Ver mais', array('view', 'id' => $data['id']), ['class' => 'btn btn-primary']); ?>
			</div>
		</div>
	</div>
</div>