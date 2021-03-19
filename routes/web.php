<?php
use Illuminate\Support\Facades\DB;
use App\User;
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
 $servername = "localhost";
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
    // $users =  User::get()->toArray();
    // $users = DB::table('users')->pluck('name')->first();
    // $users = DB::table('users')->select('name')->get();
    // dump($users);
    // $users = DB::table('users')->where('id',1)->select('name','id')->first();
    // dump($users);
    // $comments = DB::table('comments')->select('user_id')
    // ->get()->('user_id');
    $comments = DB::table('comments')->where('content',"LIKE",'%a_q_1%')->exists();
    dump($comments);
    // $comments = DB::table('comments')->select(DB::raw('content as comment_content'))->get();
    // dump($comments);
// $users  = User::select('name')->get()->toArray();
// $users = DB::connection('sqlite')->select('select * from users where id = :id',['id' => 1]);
// $users = DB::table('users')
// ->select('name')
// ->get();

// DB::transaction(function(){
     
// try{ 
//     DB::beginTransaction();
//     $users = User::get();

//     dump($users);
//     $comments = DB::table('comments')->get();
//     dump($comments);
// }catch(\Exception $ex){
//     DB::rollBack();
//     return $ex->getMessage();
// }

// },5);
// dump(factory(App\Comment::class,3)->create());
});

