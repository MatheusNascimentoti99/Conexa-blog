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

	private $_model;
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

		$category_id = $_GET['category_id'] ?? null;
		$this->pagination['_page'] = $_GET['_page'] ?? 1;

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
				'category_id' => $category_id,
				'model' => $post,
			)
		);
	}

	public function actionView($id)
	{
		$this->loadModel();

		$author = new User();
		$author = $author->get($this->_model['user_id']);
		$comments = new Comment();
		$comments = $comments->all(['post_id' => $this->_model['id']]);
		$this->render(
			'view',
			array(
				'post' => $this->_model,
				'author' => $author,
				'comments' => $comments,
			)
		);
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

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if ($this->_model === null) {
			if (isset($_GET['id'])) {
				$post = new Post();
				$this->_model = $post->get($_GET['id']);
			}
			if ($this->_model === null)
				throw new CHttpException(404, 'A página solicitada não existe.');
			unset($author['password']);
		}
		return $this->_model;
	}


}