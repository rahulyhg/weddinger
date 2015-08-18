<?php namespace App\Providers;

use App\Html\HtmlBuilder;
use App\Html\FormBuilder;

class HtmlServiceProvider extends \Collective\Html\HtmlServiceProvider
{

    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function ($app) {
            return new HtmlBuilder($app['url']);
        });
    }

    protected function registerFormBuilder()
    {
        $this->app->bindShared('form', function ($app) {
            $form = new FormBuilder($app['html'], $app['url'], $app['session.store']->getToken());
            return $form->setSessionStore($app['session.store']);
        });
    }
}