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
//  $servername = "localhost";
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
    // $comments = DB::table('comments')->where('content',"LIKE",'%a%')->exists();
    // dump($comments);
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
// 1 ) $results = DB::table('rooms')->where('price','<',200)->get();
// $results = DB::table('rooms')->where([
//     [ 'price' , '>' , 10],
//     ['room_size' , '>' , 0]])
//     ->whereBetween('room_number',[1,30])
//     ->where(function($query)
//     {
//         $query->where([['price','>=',50],['price','<',300]]);
//     })
//     ->get();
// dump($results);


//////////////////////////////////////////////////////////// reservation advance query builder where clause

// $results = DB::table('rooms')
// ->whereBetween('price',[300,400])
// ->get();
// $results = DB::table('rooms')
// ->whereNotBetween('price',[100,400])
// ->get();
// dump($results);

// $results = DB::table('rooms')
// ->whereNotIn('price',[230,200,100,500])
// ->get();
/////////////////////// nested query

// $results = DB::table('users')
// ->whereExists(function($query)
// {
//     $query->select('id')
//     ->from('reservations')
//     ->whereRaw('reservations.user_id = users.id')
//     ->where('check_in','<','2021-03-30')
//     ->limit(1);    
// })->limit(1)
// ->get();

///////////////////// json querying practice
// $results = DB::table('users')
// ->whereJsonContains("meta->skills", 'laravel') // array search in json
// ->where('meta->settings->site_background','black')
// ->get();
// dump($results);

////// //////////////// ///////////// ///////pagination 

// $results = DB::table('comments')->simplePaginate(3);

// dump($results->items());

/////// full text search

// $results = DB::table('comments')
// ->whereRaw("MATCH(content) AGAINST(? IN BOOLEAN MODE)",['+perferendiddds -quam'])->get();
// // $results = DB::table('comments')->where("content", "LIKE", "%perferendis%")->get();
// dump($results);

$results =  DB::table('comments')
            ->select(DB::raw("COUNT(comments.user_id) as comment_count,users.name"))
            ->join('users','users.id','=','user_id')
            ->groupBy('user_id','users.name')
            ->get();
dump($results);


});