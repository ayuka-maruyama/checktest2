<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use App\Http\Requests\LoginRequest;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 新規ユーザーの登録
        Fortify::createUsersUsing(CreateNewUser::class);

        // 登録画面を表示したときに表示する内容の設定
        Fortify::registerView(function(){
            return view('auth.register');
        });

        // ログイン画面を表示したときに表示する内容の設定
        Fortify::loginView(function(){
            return view('auth.login');
        });

        // ログイン試行回数の制限の設定
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        // ログインとバリデーションの結び付け
        $this->app->bind(FortifyLoginRequest::class, LoginRequest::class);
    }
}
