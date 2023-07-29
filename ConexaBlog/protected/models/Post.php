<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $user_id
 * @property string $category_id
 * @property string $content
 * @property string $title
 * @property string $image_url
 */
class Post extends _BaseModel
{


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, category_id, content, title', 'required'),
			array('user_id, category_id, content', 'length', 'max' => 128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, category_id, content, title', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Título',
			'content' => 'Conteúdo',
			'category_id' => 'Categoria',
			'user_id' => 'Autor',
			'image_url' => 'Imagem',
		);
	}

}