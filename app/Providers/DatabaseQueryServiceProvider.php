<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Database\Events\TransactionRolledBack;

class DatabaseQueryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // コンフィグでSQLログの設定
        if (config('logging.sql.enable') !== true) {
            return;
        }

        //SQLクエリを出力
        DB::listen(function ($query): void {
            $sql = $query->sql;
            $params = $query->bindings;
            Log::debug('SQL', [$sql, $params]);
        });

        Event::listen(TransactionBeginning::class, function (TransactionBeginning $event): void {
            Log::debug('START TRANSACTION');
        });

        Event::listen(TransactionCommitted::class, function (TransactionCommitted $event): void {
            Log::debug('COMMIT');
        });

        Event::listen(TransactionRolledBack::class, function (TransactionRolledBack $event): void {
            Log::debug('ROLLBACK');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
