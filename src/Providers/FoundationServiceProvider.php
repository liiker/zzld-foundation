<?php

namespace Zzld\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Route;

use Zzld\Foundation\Support\Template\TemplateBuilder;

class FoundationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //基础框架路由
		if (! $this->app->routesAreCached()) {
				Route::group([
					'middleware' => 'web',
					'namespace' => 'Zzld\Foundation\Http\Controllers',
				], function($router){
				require __DIR__.'/../routes.php';
			});
		}

		//加载扩展视图
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'zzld-foundation');

		//加载语言包
		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'zzld-foundation');

		//加载迁移文件
		$this->loadMigrationsFrom(__DIR__.'/../migrations');


		/*------------------------发布文件--------------------*/
		//发布模型配置文件
		$this->publishes([
			__DIR__.'/../config/scaffold.php' => config_path('scaffold.php'),
			__DIR__.'/../config/zzld_foundation.php' => config_path('zzld_foundation.php'),
			__DIR__.'/../static' => public_path('static'),
            __DIR__.'/../migrations' => database_path('migrations'),

		]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		$this->registerTemplate();
    }

	//注册自定义模板
	public function registerTemplate(){
		$this->app->singleton('tpl', function ($app) {
			return new TemplateBuilder($app['url'], $app['view']);
		});
	}
}
