<?php

class PostController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{

	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(string $category_id = '')
	{
		$post = new Post();
		$response = $post->all([
			'_sort' => 'created_at',
			'_order' => 'DESC',
			'category_id' => $category_id
		]);
		if($response->error)
			$this->redirect('error', $response->error);
		$dataProvider = new CArrayDataProvider(
			$response,
			array(
				'id' => 'id',
				'sort' => array(
					'attributes' => array(
						'id',
						'name'
					),
				),
				'pagination' => array(
					'pageSize' => 10,
				),
			)
		);
		$this->render('post/index', array('dataProvider' => $dataProvider));
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