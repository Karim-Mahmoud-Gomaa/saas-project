<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function register()
    {
        #bind:Repository
        $this->app->bind('App\Repository\Page\PageRepositoryInterface','App\Repository\Page\PageRepository');
		$this->app->bind('App\Repository\PageTranslation\PageTranslationRepositoryInterface','App\Repository\PageTranslation\PageTranslationRepository');
		$this->app->bind('App\Repository\Service\ServiceRepositoryInterface','App\Repository\Service\ServiceRepository');
		$this->app->bind('App\Repository\Package\PackageRepositoryInterface','App\Repository\Package\PackageRepository');
		$this->app->bind('App\Repository\Feature\FeatureRepositoryInterface','App\Repository\Feature\FeatureRepository');
		$this->app->bind('App\Repository\FAQ\FAQRepositoryInterface','App\Repository\FAQ\FAQRepository');

		$this->app->bind('App\Repository\Term\TermRepositoryInterface','App\Repository\Term\TermRepository');
		$this->app->bind('App\Repository\Promo\PromoRepositoryInterface','App\Repository\Promo\PromoRepository');
		$this->app->bind('App\Repository\Renewal\RenewalRepositoryInterface','App\Repository\Renewal\RenewalRepository');
		$this->app->bind('App\Repository\Order\OrderRepositoryInterface','App\Repository\Order\OrderRepository');
		$this->app->bind('App\Repository\User\UserRepositoryInterface','App\Repository\User\UserRepository');
		$this->app->bind('App\Repository\Product\ProductRepositoryInterface','App\Repository\Product\ProductRepository');
    }
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
