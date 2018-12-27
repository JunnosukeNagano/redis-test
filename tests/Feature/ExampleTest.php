<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use Illuminate\Support\Facades\Redis;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testCreateHDDUser()
    {
        $time_start = microtime(true);
        for($i=0; $i<10000; $i++){
            $user = new User();
            $user->email = 'naganohdd_'.$i.'@clubnets.jp';
            $user->name = 'テストHDDユーザー'.$i;
            $user->password = '$2y$10$xR6MeDVlxJxFtNFeYVb/p.KHNQaTf5Rkn6eJBX2ltCKOLVnDv0w8G';
            $user->save();
        }
        $time = microtime(true) - $time_start;
        echo "{$time} 秒";
    }
    
    public function testCreateRedisUser()
    {
        $time_start = microtime(true);
        for($i=0; $i<10000; $i++){
            $user = new User();
            $user->email = 'naganoredis_'.$i.'@clubnets.jp';
            $user->name = 'テストRedisユーザー'.$i;
            $user->password = '$2y$10$xR6MeDVlxJxFtNFeYVb/p.KHNQaTf5Rkn6eJBX2ltCKOLVnDv0w8G';
            Redis::command('SET', ['user-'.$i, json_encode($user, JSON_UNESCAPED_UNICODE)]);
        }
        $time = microtime(true) - $time_start;
        echo "{$time} 秒";
    }
}
