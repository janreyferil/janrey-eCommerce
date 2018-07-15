<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Model\User\Role;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
       $role = Role::all();

        if(count($role) <= 0) {

            $arr = ['admin','sales staff','sales manager','customer'];

            foreach($arr as $a) {
                $roles = new Role;
                $roles->name = $a;
                $roles->save();
            }
            
        } 
    
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
