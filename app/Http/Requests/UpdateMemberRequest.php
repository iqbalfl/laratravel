<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends StoreMemberRequest
  {
    public function rules()
    {
      $rules = parent::rules();
      $rules['username'] = 'required|unique:users,username,' . $this->route('member');
      $rules['email'] = 'required|unique:users,email,' . $this->route('member');
      return $rules;
    }
}
