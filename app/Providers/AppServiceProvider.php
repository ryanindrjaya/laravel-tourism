<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SubCategory;
use App\Models\Category;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('path.public', function() {
            // return base_path('../public_html');
            return base_path('/public');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function($view)
        {
            $categorynavbar = Category::orderBy('name')->get();
            $subcategorynavbar = SubCategory::orderBy('name')->get();
            $view->with('categorynavbar', $categorynavbar)->with('subcategorynavbar',$subcategorynavbar);
        });
    }
}
