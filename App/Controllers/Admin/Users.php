<?php
namespace App\Controllers\Admin;

use App\Models\User;

class Users extends \Core\Controller
{
    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function indexAction()
    {
        if($_POST){
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($email) || empty($password)){
                echo json_encode(["msg" => 'input is required.', "code" => 401]);
                exit;
            }

            if(! $this->user->verify($email)){
                echo json_encode(["msg" => 'email is not exit', "code" => 403]);
                exit;
            }

            $user = $this->user->find($email);

            if(!$this->user->ableLogin($user, $password)){
                echo json_encode(["msg" => 'password is not corrent.', "code" => 402]);
                exit;
            }
        }

        echo json_encode(["url" => '/posts/index']);
        exit;
    }
}