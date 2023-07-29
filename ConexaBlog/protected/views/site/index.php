<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/category.css">
</head>
<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php if (!empty($_GET['tag'])): ?>
	<h1>Posts Tagged with <i>
			<?php echo CHtml::encode($_GET['tag']); ?>
		</i></h1>
<?php endif; ?>

<div class="row">
	<div>
		<ul class="nav nav-tabs">
			<?php foreach ($categories as $category): ?>
				<li class="nav-item">
					<a class="nav-link <?php $category_id == $category['id'] ? 'active' : '' ?>" aria-current="page"
						href="#">
						<?php echo $category['name'] ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>



	<p>Congratulations! You have successfully created your Yii application.</p>

	<p>You may change the content of this page by modifying the following two files:</p>
	<ul>
		<li>View file: <code><?php echo __FILE__; ?></code></li>
		<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
	</ul>

	<p>For more details on how to further develop this application, please read
		the <a href="http://www.yiiframework.com/doc/">documentation</a>.
		Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
		should you have any questions.</p>