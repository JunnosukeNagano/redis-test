<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use Illuminate\Support\Facades\Redis;

use Log;

use App\User;

/**
 * Description of UserInfoGetter
 *
 * @author CN_Nagano
 */
class UserInfoGetter {
    
    public static function getUsersList(){
        Log::debug("Redis::command('GET', ['usersList'])".Redis::command('GET', ['usersList']));
        if(Redis::command('GET', ['usersList'])){
            return json_decode(Redis::command('GET', ['usersList']));
        }else{
            $usersList = User::findUsersList();
            Redis::command('SET', ['usersList', json_encode($usersList, JSON_UNESCAPED_UNICODE)]);
            return $usersList;
        }
    }
    
    public static function getUserInfo($id){
        Log::debug("Redis::command('GET', [". $id . "])".Redis::command('GET', [$id]));
        if(Redis::command('GET', [$id])){
            return json_decode(Redis::command('GET', [$id]));
        }else{
            $user = User::findUserById($id);
            Redis::command('SET', ['usersList', json_encode($user, JSON_UNESCAPED_UNICODE)]);
            return $user;
        }
    }
}
