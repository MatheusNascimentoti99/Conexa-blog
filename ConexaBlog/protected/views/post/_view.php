<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/category.css">
</head>

<div class="post">

	<div class="content">
		<div class="card m-2">
			<div class="row g-0">
				<div class="col-md-4">
					<?php if (isset($data['image_url'])): ?>
						<img src="<?php echo CHtml::encode($data['image_url']) ?>"
							style="max-height: 400px; max-width: 100%; object-fit: contain;" alt="Imagem do post">
					<?php endif; ?>
				</div>
				<div class="col-md-8 d-flex flex-column">
					<div class="card-body">
						<h5 class="card-title fw-bold">

							<?php echo CHtml::encode($data['title']); ?>

						</h5>
						<p class="card-text">
							<small class="text-muted fw-bold">
								<?php echo 'Postado em ' . Yii::app()->dateFormatter->format('dd-MM-yyyy HH:mm', strtotime($data['created_at'])); ?>
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
					</div>
					<div class="card-footer mt-auto">
						<?php echo CHtml::link('Ver mais', array('view', 'id' => $data['id']), ['class' => 'btn btn-primary']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>