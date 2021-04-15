<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        foreach($this->collection as $object){
            $data[] = [
                'id' => $object->id,
                'name' => $object->name,
                'email' => $object->email,
                'comments' => $object->comments,
               
            ];
        }
        
       return $data; 
    }
}
