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
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => 'category/index',
	'template' => "{items}\n{pager}",
	'itemsCssClass' => 'row'
)
);
?>

<div class="card" style="width: 18rem;">
	<img class="card-img-top" src="https://storage.googleapis.com/site-upload-storage/sites/logo-300-200.jpg"
		alt="Card image cap">
	<div class="card-body">
		<h5 class="card-title">Card title</h5>
		<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
			content.</p>
		<a href="#" class="btn btn-primary">Go somewhere</a>
	</div>
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