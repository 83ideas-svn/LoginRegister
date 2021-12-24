<?php 
 namespace Custome\Auth;
 use Illuminate\Support\ServiceProvider;

 class CustomeAuthServiceProvider extends ServiceProvider
 {
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');  
        $this->loadviewsFrom(__DIR__ . '/../views','register');  
        $this->loadviewsFrom(__DIR__ . '/../views','login'); 
        $this->loadviewsFrom(__DIR__ . '/../views','forgotpassword'); 
        $this->loadviewsFrom(__DIR__ . '/../views','forgotpswdemail'); 
        $this->loadviewsFrom(__DIR__ . '/../views','forgetPasswordLink'); 
        $this->publishes([
            __DIR__.'/../views/dashboard.blade.php' => base_path('resources/views/dashboard.blade.php'),
            __DIR__.'/../views/forgetPasswordLink.blade.php' => base_path('resources/views/forgetPasswordLink.blade.php'),
            __DIR__.'/../views/forgotpassword.blade.php' => base_path('resources/views/forgotpassword.blade.php'),
            __DIR__.'/../views/forgotpswdemail.blade.php' => base_path('resources/views/forgotpswdemail.blade'),
         ]); 
        $this->publishes([
            __DIR__.'/../views/emailTemplate.blade.php' => base_path('resources/views/emailTemplate.blade.php'),
        ]); 
        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/CustomeAuth'),
            __DIR__.'/../src/constants.php' => config_path('constants.php'),
        ]);
       
      
     }
    /**
     * Register the service provider.
    
     */
    public function register()
    {
        
    }
 }
?>