<?php

namespace App\Http;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;

class UsersACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return \Auth::id();
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        if (auth()->user()->id == 1) {
            return [
                ['disk' => 'public', 'path' => '*', 'access' => 2],
            ];
        }
        return [
            ['disk' => 'public', 'path' => '/', 'access' => 1],                              // only read
            ['disk' => 'public', 'path' => auth()->user()->folder_name, 'access' => 1],        // only read
            ['disk' => 'public', 'path' => auth()->user()->folder_name .'/*', 'access' => 2],  // read and write
        ];
    }
}