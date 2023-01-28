<?php

namespace App\Http\Services;

use App\Models\User;

/**
 * UserService class
 */
class UserService
{
  /**
   * Get a User
   
   * @param [type] $id
   * @return User
   */
  public function getUser($id): User
  {
    return User::find($id);
  }

  /**
   * Get Users
   *
   * @return void
   */
  public function getUsers()
  {
    return User::all();
  }
}
