<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 2019/6/24
 * Time: 10:18
 */

namespace Zrt\Avatar;


use Illuminate\Support\ServiceProvider;
class AvatarProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/config/avatar.php' => config_path('avatar.php'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('avatar', function ($app) {
            return new Avatar($app['config']);
        });
    }
}