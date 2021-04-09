<?php
use Illuminate\Support\Facades\DB;
use App\User;
use App\Reservation;
use App\Comment;
use App\Room;
use App\City;
use Illuminate\Support\Facades\Hash;
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
Route::group(['prefix' => 'api/v1'],function()
{
    Route::get('/', function () {
        dd(123);
    });

});
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

// $results =  DB::table('comments')
//             ->select(DB::raw("COUNT(comments.user_id) as comment_count,users.name"))
//             ->join('users','users.id','=','user_id')
//             ->groupBy('user_id','users.name')
//             ->get();
// dump($results);

// $results = DB::table('users')
//             // ->orderBy('name','asc')
//             ->inRandomOrder()
//             ->get();
// dd($results);
// $results = DB::table('comments')
//             ->select(DB::raw('COUNT(id) as no_comments'),'rating','id')
//             ->groupBy('rating','id')
//             ->havingRaw('rating = 5')
//             ->get();
// dump($results); 
// $results = DB::table('comments')
//             ->skip(5) //skip first 5
//             ->take(5) // take next 5
//             ->get();
// dump($results); 

// $results = DB::table('comments')
//             ->offset(5) // skip / leave 5
//             ->limit(5) // next 5
//             ->get();
// dump($results);
// $room_id = 2;
// $results = DB::table('reservations')
//             ->when('room_id', function($query) use($room_id) {
//                 $query->where('room_id',$room_id);
//             })
//             ->get();
// dump($results);
// $sortBy = NULL;
// $results = DB::table('reservations')
//             ->when($sortBy, function($query) use($sortBy)
//             {
//                 $query->orderBy($sortBy);
//             },function($query)
//             {
//                 $query->orderBy('price');
//             }
//             )
//             ->get();
//  dump($results);  
// $price = 481.00;
// $results = DB::table('reservations')
//             ->when($price,function ($query)
//             {
//                 $query->orderBy('price');
//             })->get();
//  dd($results);    

// $results = Reservation::select("*")
//             ->where([['check_in','=',date('y-m-d')]])
//             ->get()->map(function($results){
//                $data = [];
//                $data['prices'] = $results->price;
//                 return $data;
//             });
// dump($results);

// $results = DB::table('comments')
//             ->orderBy('id')
//            ->chunk(2,function($results){
//                foreach($results as $result){
//                    return $result;
//                }
//            });
// dump($results);            

// $results = DB::table('comments')
//             ->chunkById(4,function($results){
//                 foreach($results as $result){
//                     DB::table('comments')
//                     ->where('id',$result->id)
//                     ->update(['rating' => NULL]);
//                 }
//             });
// //              
// dump($results);
// $room_id = 1;
// $results = DB::table('reservations')
//             ->when($room_id,function($query,$room_id){
//                 $query->where('room_id',$room_id);
//             })
//             ->get();
// dump($results);            
//  $results = DB::table('reservations')
//              ->select('reservations.check_in','reservations.check_out',
//              DB::raw('reservations.price AS reservation_price'),'cities.name AS city_name',
//              'users.name as user_name','rooms.room_number',
//              'rooms.room_size','rooms.description') 
//             ->join('rooms','reservations.room_id','=','rooms.id')
//             ->join('users','reservations.user_id','=','users.id')
//             ->join('cities','reservations.city_id','=','cities.id')
//             ->where([['room_id','>',3],['room_id','<',7],['user_id','>',1]])
//             ->get();
// // dump($results);
// $users = DB::table('users')->select('name',DB::raw('"users" as type_of_activity'));   
// $results = DB::table('reservations')->select('check_in',DB::raw('"reservations" as type_of_activity'))
//             ->union($users)
//             ->get();         
// dump($results);
// DB::table('users')->insert([
//     ['name' => 'syed Anwar Shah','email' => 'syedanwar016@gmail.com','password' => Hash::make('shah')],
// ]);
// $results = DB::table('users')
//           ->get();
// dump($results);
//  DB::table('users')
//             ->where('id',1)
//             ->update(['name'=>'shah']);
//  DB::table('users')
//             ->where('id',1)
//             ->update(['meta->settings->site_language'=>'ur']);
// $results = DB::table('users')->get();
// dump($results);
// DB::table('users')->where('id',1)->delete();
//  DB::table('users')->where('id',2)->delete();
// $results = DB::table('users')
//             ->sharedLock()
//             ->lockForUpdate()
//             ->get();
// dump($results);
});

Route::get('/eloquent',function()
{
    // $results = User::select('name','email')
    //         ->addSelect(['worst_rating' => Comment::select('rating')
    //         ->whereColumn('user_id','users.id')
    //         ->orderBy('rating','asc')
    //         ->limit(1)
    //         ])
    //         ->get()->toArray();
    // dump($results);
    // $results = User::orderByDesc(
    //     Reservation::select('check_in')
    //     ->whereColumn('user_id','users.id')
    //     ->orderBy('check_in','desc')
    //     ->limit(1)
    // )->select('id','name')->get();
    // dump($results);
    // $results = Reservation::chunk(2,function($reservations){
    //     foreach($reservations as $reservation){
    //         echo $reservation->id;
    //     }
    // });
    // dump($results);
    // foreach(Room::cursor() as $room){
    //     echo $room->id;
    // }
    // $results = User::where('email',"LIKE","%t")->get();
    // dump($results);
    // $results = User::where('email','LIKE','%@gmail.coma')->firstOr(function(){
    //     User::where('id',4  )->update(['email' => 'shah@gmail.com']);
    // });
    // dump($results);
    // $results = Comment::max('rating');
    // dump($results);
    // $results = Comment::rating(1)->get();
    // dump($results);
    // $results = Comment::withoutGlobalScope('rating')->get();
    // dump($results);
    // $results = Comment::rating(1)->get();
    // dump($results);
    // $results = Comment::all()->toArray();
    // dump($results);
    // $results = Comment::all()->count();
    // dump($results);
    // $results = Comment::all()->toJson();
    // dump($results);
    // $comments = Comment::all();
    // $results = $comments->reject(function($comment)
    // {
    //  return $comment->where('rating','>',5);
    // });
    // dump($results);
    // $results = Comment::all();
    //  $comments = Comment::all()->map(function($query){
    //     return $query->content;
    //  });   
    //  dump($comments->diff($results));
    // $comment = Comment::all();
    // $results = $comment->reject(function($comment){
    //   return $comment->rating > 3 ;
    // });
    // dump($comment->diff($results));
    // $comment = new Comment();
    // $comment->content = "content will be filled filled";
    // $comment->rating =  5;
    // $comment->user_id = 3;
    // dump($comment->save());
    // dump(Comment::create([
    //     'content' => 'dummy create sy',
    //     'rating' => 5,
    //     'user_id' => 3
    // ]));
    // $comment = Comment::find(1);
    // $comment->content = "testing";
    // dd($comment->update());
    // $results = Comment::where('id',1)->update(['content' => 'tested tested tested tested tested']);
    // dd($results);  
    // $comment = Comment::find(1);
    // $comment->delete(); 
    // dd(Comment::where('id',21)->delete());  
    //destroy takes array and also single
    // dd(Comment::destroy([20,24]));  
    // $comment = Comment::find(10);
    // dump($comment->rating); // Accessor example with column name  it takes argument      
    // $results = Comment::find(10);
    // dump($results->Who_What);
    // $comment  = new Comment();
    // $comment->user_id = 3;
    // $comment->content = "testing mutator";
    // $comment->rating = 3;
    // dd($comment);
    // $comment->save();
    // $comment = Comment::where('id',29)->update(['content' => 'testersssss test 1233']);
    // // dd($comment);
    // $results = App\Address::find(1);
    
    // dump($results->users->name);
    // $user = User::find(1);
    // dump($user->comments);
    // $comment = Comment::find(8);
    // dump($comment->user);
    // $city = City::find(1);
    // dump($city->rooms);
    // $rooms = Room::all();
    // foreach($rooms as $room){
    //   foreach($room->cities as $city){
    //     //    dump($city->name);
    //     dump($city->city_room);
    //   }
    // }
    // $result = Comment::find(1);
    // echo $result->country;
    // $result = \App\Company::find(2);
    // dump($result->reservations);
    // $result = User::find(3);
    // dump($result->imageable);
    // $users = User::whereHas('comments',function($query){
    //     $query->where('rating','=',2);
    // },'>=' ,1)->with(['comments'])->get(); 
    // dump($users);
    $users = User::withCount(['comments','comments as negative_rating' => function($query){
        $query->where('rating','<',3);
    }])->get();
    dump($users);
});
