<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            if ($notifiable->hasRole('Staff')) {
                $password=config('app.staff_password');
            }
            if ($notifiable->hasRole('Investor')) {
                $password=config('app.investor_password');
            }
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Hi, your email address was used to create an account with us you can access your account using this email address and password of '.$password)
                ->line('To proceed please click the button below to verify your email address')
                ->action('Verify Email Address', $url)
                ->line(Lang::get('If you did not create an account, no further action is required.'));
        });
    }
}
