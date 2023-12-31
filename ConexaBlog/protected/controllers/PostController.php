<?php

class PostController extends Controller
{
	protected $pagination = array(
		'_page' => 1,
		'_limit' => 5,
		'_sort' => 'created_at',
		'_order' => 'DESC',
		'categoryId' => null
	);

	private $_model;

	public function actionCreate()
	{
		$model = new Post;
		$category = new Category();
		$categories = $category->all();

		if (isset($_POST['Post'])) {
			$model->validate();
			$response = $model->post([
				'title' => $_POST['Post']['title'],
				'content' => $_POST['Post']['content'],
				'categoryId' => $_POST['Post']['categoryId'],
				'image_url' => $_POST['Post']['image_url'],
				'userId' => Yii::app()->user->id,

			]);
			$this->redirect(array('index'));
		}

		$this->render(
			'create',
			array(
				'model' => $model,
				'categories' => $categories
			)
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		$categoryId = $_GET['categoryId'] ?? null;
		$this->pagination['_page'] = $_GET['_page'] ?? 1;

		$category = new Category();
		$categories = $category->all();
		if ($categories->error)
			$this->redirect('error', $categories->error);

		$post = new Post();
		$params = array_merge($this->pagination, ['categoryId' => $categoryId]);
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
				'categoryId' => $categoryId,
				'model' => $post,
				'page' => $this->pagination['_page'],
			)
		);
	}

	public function actionView($id)
	{

		$comments = new Comment();

		$comments->withExpand(['user']);
		$comments = $comments->all(['postId' => $id]);

		$post = new Post();
		$post->withExpand(['user']);
		$post = $post->get($id);

		// To create a new comment
		$comment = $this->newComment($post);
		$this->render(
			'view',
			array(
				'post' => $post,
				'comments' => $comments,
				'comment' => (object) $comment,
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
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		$comment = new Comment;
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
			echo CActiveForm::validate($comment);

			if (!$this->hasErrors() && isset($_POST['Comment'])) {
				$comment->post([
					'content' => $_POST['Comment'],
					'postId' => $post['id'],
					'userId' => Yii::app()->user->id,
				]);
			}
		}
		return $comment;
	}

}