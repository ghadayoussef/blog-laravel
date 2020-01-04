<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)

    {
        // ::with('author')->get();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content'=> $this->content,
            //'user'=>new UserResource($this->user)
            'user' => $this->user->name,
        ];
    }
}
