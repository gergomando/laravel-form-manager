<?php

namespace webmuscets\TableManager;
use Illuminate\Support\ServiceProvider;
    
    class FormManagerServiceProvider extends ServiceProvider {
        public function boot()
        {
        	$this->loadViewsFrom(__DIR__.'/views', 'form-manager');
        }
        
        public function register()
        {
        
        }
    
    }

?>