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
				class="nav-item me-2 <?php echo ($categoryId == $category['id'] ? 'shadow-lg border-bottom border-primary' : '') ?>">
				<?php echo CHtml::link('Todas as categorias', array('index'), ['class' => "nav-link"]); ?>
			</li>
			<?php foreach ($categories as $category): ?>
				<li
					class="nav-item me-2 <?php echo ($categoryId == $category['id'] ? 'shadow-lg border-primary border-bottom' : '') ?>">
					<?php echo CHtml::link($category['name'], array('index', 'categoryId' => $category['id']), ['class' => "nav-link"]); ?>
				</li>
			<?php endforeach; ?>

		</ul>
	</div>


	<section>
		<div class="col-md-12">
			<h2 class="mt-4 mb-4">Últimas publicações</h2>
		</div>
		<?php $this->widget(
			'zii.widgets.CListView',
			array(
				'dataProvider' => $dataProvider,
				'itemView' => '_view',
				'template' => "{items}\n{pager}",
				'enablePagination' => true,
				'emptyText' => 'Nenhuma publicação encontrada.',
				'emptyCssClass' => 'h3 rounded-pill text-warning'
			)
		); ?>
		<nav class="mt-4" aria-label="Page navigation example">
			<ul class="pagination justify-content-center d-flex justify-content-evenly">
				<li class="page-item">
					<?php echo CHtml::link('Página anterior', array('index', '_page' => $_GET['_page'] - 1)); ?>
				</li>
				<li class="page-item">
					<?php echo CHtml::link('Próxima página', array('index', '_page' => $_GET['_page'] + 1)); ?>
				</li>
			</ul>
		</nav>
	</section>