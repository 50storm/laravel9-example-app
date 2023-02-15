<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // クエリーイベントのリッスン
        \DB::listen(function($query) {

            // コンフィグでSQLログを出力する設定
            if (config('logging.sql.enable') !== true) {
                return;
            }

            // ログに出力するクエリーのログをまとめる
            $queryLog = $query->time.' ms -> '.' SQL: '.$query->sql;
            if ($query->bindings) {
                $queryLog .= "\n".'bindings: '.var_export($query->bindings, true);
            }
            
            // sqlQueryLogのチャンネルでSQLを別のログファイルに出力する
            \Log::channel('sqlQueryLog')->debug($queryLog);
        });
    }
}
