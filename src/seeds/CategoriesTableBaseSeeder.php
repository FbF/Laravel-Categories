<?php namespace Fbf\LaravelCategories;

class CategoriesTableBaseSeeder extends \Seeder {

    public function run()
    {
        \DB::table('fbf_categories')->delete();
        $types = \Config::get('laravel-categories::types');
        $roots = array_keys($types);
        foreach ($roots as $root)
        {
	        Category::create(array(
	            'name' => $root,
	        ));
        }
    }

}