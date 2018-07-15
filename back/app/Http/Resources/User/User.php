<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user_id,
                'email' => $this->user->email,
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
                'created_at' => $this->user->created_at->diffForHumans(),
                'updated_at' => $this->user->updated_at->diffForHumans()
            ],
            'role' => $this->roles->name,
            'permission' => boolval($this->permission->status) ? true : false
       ];
    }
}
