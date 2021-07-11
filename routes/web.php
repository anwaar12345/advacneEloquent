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

// $users = DB::table('users')->select(DB::raw('COUNT(id) AS count'))->where('name','LIKE', "m_.%")->get();

// dump($users);

// $comments = DB::table('comments')
// ->select(DB::raw('COUNT(user_id) as comment_count,users.name'))
// ->join('users','users.id','=','comments.user_id')
// ->groupBy('user_id','users.name')
// ->get();
// $comments = DB::table('users')
// ->selectRaw('LENGTH(name) as name_length,name')
// ->orderByRaw('LENGTH(name)  DESC')
// ->get();
// $comments = DB::table('users')
//     ->selectRaw('LENGTH(name) as counted')
//     ->orderBy(DB::raw('LENGTH(name)'),'desc')
//     ->get();
$comments = DB::table('comments')
            ->latest(DB::raw('comments'))
            ->get();
dump($comments);

});

