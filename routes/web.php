        <?php
        use Illuminate\Support\Facades\DB;
        use App\User;
        use App\Reservation;
        use App\Comment;
        use App\Room;
        use App\City;
        use App\Address;
        use App\Company;
        use Illuminate\Support\Facades\Hash;
        use App\Http\Resources\UserResource;
        use App\Http\Resources\UsersCollection;
        use Illuminate\Support\Facades\Route;

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
        //======================================= Database Old practice Basics (Ends) =======================//
        //======================================= Querying Database (Starts) ==================================//


            // $users = User::withCount(['comments','comments as negative_rating' => function($query){
            //     $query->where('rating','<',3);
            // }])->get();
            // dump($users);

            // ================================== Querying polymorphic relationship ========================== //
            // $comment = Comment::whereHasMorph('commentable',
            // ['App\Image','App\Room'],function($query,$type){
            //     if($type=="App\Room"){
            //         $query->where('room_size','>',2);
            //         $query->orWhere('room_size','<',2);
            //     }
            // })->get();
            // dump($comment);
            // $commentable = Comment::with(['commentable' => function($morphTo){
            //     $morphTo->morphWith([
            //         Room::class => ['comments'],
            //         Image::class => ['comments'],
            //         ]);
            // }])->get();
            // dump($commentable);
            // ================================ insert/update and delete related models ========================= //
            // $user = User::find(1);
            // dump($user->address()->save(
            //     new Address(['number' => 2, 'street' => 'testing usa', 'country' => 'usa'])
            // ));// save single related model ($user->address()->delete() it will delete related model)
            // $user = User::find(1);
            // // $user->address()->delete();
            // dump($user->address()->saveMany([
            //     new Address(['number' => 3, 'street' => 'testing uk1', 'country' => 'uk']),
            //     new Address(['number' => 4, 'street' => 'testing AU1', 'country' => 'AU'])]
            // ));
            // $user = User::find(1);
            // dump($user->address()->create([
            //     'number' => 1,
            //     'street' => 'testcreate',
            //     'country' => 'usa'
            // ]));
            // $user = User::find(1);
            // dump($user->address()->createMany([
            //     [
            //         'number' => 12,
            //         'street' => 'test create many1',
            //         'country' => 'usa'
            //     ],
            //     [
            //         'number' => 13,
            //         'street' => 'test create many2',
            //         'country' => 'usa2'
            //     ]
            // ]));
            // $address = Address::find(1);
            // $user = User::find(2);
            // $address->users()->associate($user); //belongs to 
            // dump($address->save());
            // $city = City::find(1);
            // $result =  $city->rooms()->attach(3);
            // dump($result);
            
            // ========================================== Lazy Loading V/S Eager Loading //
            // $users = User::limit(2)->get();
            // $users = User::has('address')->with(['address' => function ($query)
            // {
            // //    $query->where('street',"LIKE", '%T%');
            // }])

            // ->get();
            // $users = DB::table('users')->join('addresses','users.id','=','addresses.user_id')
            // // ->get();
            // $users = DB::select('SELECT u.name,u.email,a.street,a.country,a.user_id FROM users u INNER JOIN addresses a ON u.id = a.user_id');
            // //  foreach($users as $user){
            // //     echo $user->address->street."</br>";
            // // }
            // dump(collect($users));

            // $results = DB::table('comments')
            //             ->selectRaw('COUNT(rating) as rating_count, rating')
            //             ->groupBy('rating')
            //             ->orderBy('rating_count','asc')
            //             ->get();
            // dd($results);    
            // $results = DB::table('comments')
            //             ->select('content','rating')
            //             ->selectRaw('CASE WHEN rating < 10 THEN "Average" 
            //             WHEN rating >= 10 THEN "Good Rating"
            //             ELSE "Rating no found" END AS rating_comments')
            //             ->orderBy('rating','ASC')
            //             ->get();
            // dd($results); 
            // $results = Reservation::select('*') 
            //             ->selectRaw('DATEDIFF(check_out,check_in) AS stay')
            //             ->orderBy('stay','DESC')
            //             ->get();
            // dd($results);
            // $results = User::has('address')->with(['address'])
            // ->where('id',3)->get()->toJson();
            // dump($results);
        //    ====================================== Resource Serialization kick start ================================== //   
            //    $results = new UserResource(User::get()->makeVisible('password'));
            // $results = new UserResource(User::find(1)); //single user
            //    return $results;  
            $results = new UsersCollection(User::with(['comments:id,content,user_id'])
            ->select('id','name','email')->paginate(2));
            return $results;
    });



    Route::get('one-to-one',function()
    {
        $users = User::with('address')->get();
        $data = $users->map(function($user)
        {
           $data_user = [
                'name' => $user->name,
                'email' => $user->email,
                'skills' => $user->meta['skills'],
                'address' => $user->address->street.' '.$user->address->country     
           ];
           return $data_user;
        });
        
        return response()->json([
            'users' => $data,
        ]);
    });

    Route::get('one-to-one-inverse',function()
    {
       $address = Address::has('user')->with([
           'user' => function($q){
                $q->select('id','name','email');
           }
       ])
       ->get()->map(function($addressed)
       {
        {
            $data_address = [
             'name' => $addressed->user->name,
             'email' => $addressed->user->email,
             'address' => 
             [
                'number' => $addressed->number,
                'street' => $addressed->street,
                'country' => $addressed->country
             ]
             
            ];
            return $data_address;
        }
       });
       return response()->json(['status_code'=> 200,'message'=>'success','data'=>$address]);
    });



    Route::get('one-to-many',function()
    {
        $user_reservations = User::with(['comments:content,rating,user_id'])->get();
        $data_user = $user_reservations->map(function($user_reservation)
        {
          return  [
                'name' => $user_reservation->name,
                'email' => $user_reservation->email,
                'company_id' => $user_reservation->company_id,
                'skills' => $user_reservation->meta['skills'],
                'comments' => $user_reservation->comments->map(function($comment)
                {
                  return [
                      'comment_content' => $comment->content
                    ];
                })
            ];
        });
        return response()->json(['users' => $data_user]);
    });


    Route::get('many-to-one',function(){
        $comments = Comment::with(['user:id,name,email'])->get();
        return response()->json(['comments' => $comments]); 
    });
    
    Route::get('many-to-many',function(){
        $room_cities = Room::with(['cities_data'])->get();
        return response()->json($room_cities);
    });
    

    Route::get('many-to-many-inverse',function(){
        $cities_rooms = City::with(['rooms_data'])->get();
        return response()->json($cities_rooms);
    });

Route::group(['prefix' => 'builder'],function()
{
    Route::get('/practice',function()
    {
        return  \DB::table('users')->get();
    });
});


Route::group(['prefix' => 'revision'],function(){
    Route::get('one-to-one',function(){
 
        // User::whereHas('address', function($query){
        //     $query->whereStreet('Junior Locks');
        // }
        return User::has('address')->with(['address' => function($query){
            $query->whereStreet('Junior Locks');
        }])->get();
    });

    Route::get('one-many',function(){
        return User::whereHas('comments',function($query){
            $query->havingRaw('COUNT(comments.user_id) > 1');
        })->with('comments')->get();
    });

    Route::get('many-many',function(){
        return City::with(['rooms' => function($query){
            $query->whereRoomSize('5')->where('price','>','3');
        }])->get();
    });

    Route::get('one-through',function(){
        return Comment::with('country')->get();
    });

    Route::get('many-many-through',function(){
        return Company::with('reservations')->get();
    });

});



