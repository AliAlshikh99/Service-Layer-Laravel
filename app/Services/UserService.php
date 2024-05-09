<?php

namespace App\Services;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserService{
public function register($data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $roleId = $data['role'];
        $userRole = Role::where('id', $roleId)->first();
        $user->assignRole($userRole);
        $userPermissions = $userRole->permissions()->pluck('name')->toArray();
        $user->givePermissionTo($userPermissions);
        $user['token'] = $user->createToken('register')->plainTextToken;
        $user = $this->rolesAndPermissions($user);
        return ['user'=>$user,'message'=> 'User Created Successfully'];

}

public function login($data){
        $creds = [
            'email'=>$data['email'],
            'password'=>$data['password'],
        ];
        if (Auth::attempt($creds)) {
            $user = User::where('email',$data['email'])->first();
            $user['token'] = $user->createToken('login')->plainTextToken;
            $user = $this->rolesAndPermissions($user);
            return ['message'=> 'logged in successfully','user'=>$user,'code'=>200];
        }
            else {

                return ['message'=>'Email or password not correct','user'=>emptyArray(),'code'=>401];
            }

}
    public function rolesAndPermissions($user)
    {
        $roles = [];
        $permissions = [];

        foreach ($user->roles as $role) {
            $roles[] = [
                'id' => $role->id,
                'name' => $role->name,
            ];
        }
        unset($user['roles']);
        $user['roles'] = $roles;
        foreach ($user->permissions as $permission) {
            $permissions[] = $permission->name;
        }
        unset($user['permissions']);
        $user['permissions'] = $permissions;
        return $user;
    }
}