<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/category.css">
</head>
<?php

$this->pageTitle = Yii::app()->name;
?>


<div class="row">
	<div>
		<ul class="nav nav-tabs">
			<li
				class="nav-item me-2 <?php echo ($category_id == $category['id'] ? 'shadow-lg border-bottom border-primary' : '') ?>">
				<?php echo CHtml::link('Todas as categorias', array('index'), ['class' => "nav-link"]); ?>
			</li>
			<?php foreach ($categories as $category): ?>
				<li
					class="nav-item me-2 <?php echo ($category_id == $category['id'] ? 'shadow-lg border-primary border-bottom' : '') ?>">
					<?php echo CHtml::link($category['name'], array('index', 'category_id' => $category['id']), ['class' => "nav-link"]); ?>
				</li>
			<?php endforeach; ?>

		</ul>
	</div>


	<section>
		<?php $this->widget(
			'zii.widgets.CListView',
			array(
				'dataProvider' => $dataProvider,
				'itemView' => '_view',
				'template' => "{items}\n{pager}",
			)
		); ?>
	</section>