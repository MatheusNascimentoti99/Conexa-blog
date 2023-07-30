<?php

class PostController extends Controller
{
	protected $pagination = array(
		'_page' => 1,
		'_limit' => 5,
		'_sort' => 'created_at',
		'_order' => 'DESC',
		'category_id' => null
	);
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		Yii::log("Debug: " . json_encode($_GET['category_id']), CLogger::LEVEL_INFO, 'application');
		$category_id = $_GET['category_id'] ?? null;
		$category = new Category();
		$categories = $category->all();
		if ($categories->error)
			$this->redirect('error', $categories->error);
		$post = new Post();

		$params = array_merge($this->pagination, ['category_id' => $category_id]);
		$posts = $post->all($params);
		if ($posts->error)
			$this->redirect('error', $posts->error);
		$dataProvider = new CArrayDataProvider(
			$posts,
			array(
				'id' => 'id',
				'sort' => array(
					'attributes' => array(
						'id',
						'title',
						'created_at',
					),
				),
				'pagination' => array(
					'pageSize' => $this->pagination['_limit'],
					'pageVar' => $this->pagination['_page'],
				),
			)
		);

		if (Yii::app()->user->isGuest)
			$this->redirect(array('site/login'));
		$this->render(
			'index',
			array(
				'categories' => $categories,
				'dataProvider' => $dataProvider,
				'category_id' => $category_id
			)
		);
	}

	/**
	 * Suggests tags based on the current user input.
	 * This is called via AJAX when the user is entering the tags input.
	 */
	public function actionSuggestTags()
	{
		if (isset($_GET['q']) && ($keyword = trim($_GET['q'])) !== '') {
			$tags = Tag::model()->suggestTags($keyword);
			if ($tags !== array())
				echo implode("\n", $tags);
		}
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


}