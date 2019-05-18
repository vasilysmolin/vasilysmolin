<?php
    namespace App\Http\Controllers\User;
    use App\Models\User;

    /**
     * Created by PhpStorm.
     * User: Smolin
     * Date: 18.05.2019
     * Time: 13:13
     */

    class UserController
    {
        public function getUser () {
//            User::all();
            return User::all();
        }
    }