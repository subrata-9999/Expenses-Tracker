<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function goto_login()
    {
        return view('login_page');
    }
    public function login(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
            
                session()->set('user_id', $user['id']);
                session()->set('user_username', $user['username']);
                session()->set('user_email', $user['email']);

                
                return redirect()->to('/dashboard');
            }
        }
        
        return redirect()->to('/login');
    }

    public function goto_register()
    {
        return view('register_page');
    }
    public function register(){
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $userdata = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        
        $userModel = new UserModel();
        $userModel->insertUser($userdata);
        
        return redirect()->to('/login');

    }

    public function goto_changePassword()
    {
        return view('change_password_page');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
