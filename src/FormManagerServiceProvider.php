<?php

namespace webmuscets\FormManager;
use Illuminate\Support\ServiceProvider;
    
    class FormManagerServiceProvider extends ServiceProvider {
        public function boot()
        {
        	$this->loadViewsFrom(__DIR__.'/Render/views', 'form-manager-render');
        	$this->loadViewsFrom(__DIR__.'/Creator/views', 'form-manager-creator');
        
        	$this->loadRoutesFrom(__DIR__.'/Creator/routes/web.php');
            $this->loadMigrationsFrom(__DIR__.'/Creator/migrations');
       
            $this->publishes([
                __DIR__.'/config/form-manager-forms.php' => config_path('form-manager-forms.php'),
            ],'form-manager');
        }
        
        public function register()
        {
        
        }
    
    }

?>