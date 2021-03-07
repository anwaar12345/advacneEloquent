<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    
    // try {
    //   $conn = new PDO("mysql:host=$servername", $username, $password);
    //   // set the PDO error mode to exception
    //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   $sql = "CREATE DATABASE elqpract";
    //   // use exec() because no results are returned
    //   $conn->exec($sql);
    //   echo "Database created successfully<br>";
    // } catch(PDOException $e) {
    //   echo $sql . "<br>" . $e->getMessage();
    // }
    // $users = \DB::select("select * from users where id = :id",['id' => 1]);
    // dump($users);
    // $userslte  = \DB::connection('sqlite')->select("select * from users");
    // dump('lte',$userslte);
    // $userinsert  = \DB::update('update users set name = :name where id = :id',['name' => 'syed anwar ahmed shah','id' => 1]);
    // dump($userinsert);die;
    // $userdelete  = \DB::delete("delete from users where id = :id ",['id' => 1]);
    // dd($userdelete);  
    // \DB::statement('truncate table users');
    // $users = \DB::select('select * from users');
    // $users = App\User::select('name')->get();
    $users = \DB::table('users')->get();
    dump($users);

});

