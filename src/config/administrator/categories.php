<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Categories',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'categories item',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelCategories\Category',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'path' => array(
			'title' => 'Path',
		),
		'slug' => array(
			'title' => 'Slug',
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'parent' => array(
			'title' => 'Parent',
			'type' => 'relationship',
			'name_field' => 'path',
			'options_sort_field' => 'lft',
		),
		'name' => array(
			'title' => 'Name',
		),
		'slug' => array(
			'title' => 'Slug',
			'visible' => function($model)
				{
					return $model->exists();
				},
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'name' => array(
			'title' => 'Name',
		),
		'slug' => array(
			'title' => 'Slug',
		),
	),

	/**
	 * The query filter option lets you modify the query parameters before Administrator begins to construct the query. For example, if you want
	 * to have one page show only deleted items and another page show all of the items that aren't deleted, you can use the query filter to do
	 * that.
	 *
	 * @type closure
	 */
	'query_filter'=> function($query)
		{
			$query->whereNotNull('parent_id');
		},

	/**
	 * This is where you can define the model's custom actions
	 */
	'actions' => array(
		// Ordering an item up / left
		'order_up' => array(
			'title' => 'Order Up / Left',
			'messages' => array(
				'active' => 'Reordering...',
				'success' => 'Reordered',
				'error' => 'There was an error while reordering',
			),
			'permission' => function($model)
				{
					if (!Request::segment(3))
					{
						return true;
					}
					$model = $model->where('id','=',Request::segment(3))->first();
					return !is_null($model->getLeftSibling());
				},
			//the model is passed to the closure
			'action' => function($model)
				{
					return $model->moveLeft();
				}
		),
		// Ordering an item down / right
		'order_down' => array(
			'title' => 'Order Down / Right',
			'messages' => array(
				'active' => 'Reordering...',
				'success' => 'Reordered',
				'error' => 'There was an error while reordering',
			),
			'permission' => function($model)
				{
					if (!Request::segment(3))
					{
						return true;
					}
					$model = $model->where('id','=',Request::segment(3))->first();
					return !is_null($model->getRightSibling());
				},
			//the model is passed to the closure
			'action' => function($model)
				{
					return $model->moveRight();
				}
		),

	),

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'parent_id' => 'required|integer|min:1',
		'name' => 'required',
		'slug' => 'required',
	),

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'lft',
		'direction' => 'asc',
	),

);