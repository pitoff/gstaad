<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->mail = new Mail;
    }

    public function index()
    {
        $this->view('users/index');
    }

    public function login()
    {
        if (isLoggedIn()) {
            redirect('users/dashboard');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'please enter email address';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'please enter password';
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                $data['email_err'] = 'no user found';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'password is invalid';
                    echo "<script>alert ('incorrect login info')</script>";
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['firstname'] = $user->firstname;
        $_SESSION['surname'] = $user->surname;
        $_SESSION['role'] = $user->role;
        $_SESSION['email'] = $user->email;
        redirect('users/dashboard');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        unset($_SESSION['firstname']);
        unset($_SESSION['surname']);
        session_destroy();
        redirect('users/login');
    }

    public function dashboard()
    {
        if (!isLoggedIn()) {
            redirect('users');
        } else {
            $this->view('users/dashboard');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<script> alert ('credits and debits cannot be accessed at the moment') </script>";
        }
    }

    public function adduser()
    {
        if (!isLoggedIn()) {
            redirect('users');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            #process form
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'surname' => trim($_POST['surname']),
                'firstname' => trim($_POST['firstname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'country' => trim($_POST['country']),
                'state' => trim($_POST['state']),
                'photo' => trim($_FILES['photo']['name']),
                'gender' => trim($_POST['gender']),
                'dob' => trim($_POST['dob']),
                'occupation' => trim($_POST['occupation']),
                'status' => trim($_POST['status']),
                'mname' => trim($_POST['mname']),
                'acc_num' => trim($_POST['acc_num']),
                'pin' => trim($_POST['pin']),
                'nok' => trim($_POST['nok']),
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'country_err' => '',
                'state_err' => '',
                'photo_err' => '',
                'gender_err' => '',
                'dob_err' => '',
                'occupation_err' => '',
                'status_err' => '',
                'mname_err' => '',
                'acc_num_err' => '',
                'pin_err' => '',
                'nok_err' => ''
            ];

            if (empty($data['surname'])) {
                $data['name_err'] = 'Please enter surname';
            }
            if (empty($data['firstname'])) {
                $data['name_err'] = 'Please enter firstname';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Enter email address';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'password must be at least 3 xters';
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } elseif (($data['password']) != ($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Password does not match';
            }
            if (empty($data['country'])) {
                $data['country_err'] = 'Please enter country';
            }
            if (empty($data['state'])) {
                $data['state_err'] = 'Please enter state';
            }
            if (empty($data['photo'])) {
                $data['photo_err'] = 'select a file';
            }
            if (empty($data['gender'])) {
                $data['gender_err'] = 'select a gender';
            }
            if (empty($data['dob'])) {
                $data['dob_err'] = 'enter date of birth';
            }
            if (empty($data['mname'])) {
                $data['mname_err'] = 'enter mothers name';
            }
            if (empty($data['acc_num'])) {
                $data['acc_num_err'] = 'enter name account number';
            }
            if (empty($data['pin'])) {
                $data['pin_err'] = 'enter your pin';
            } elseif (strlen($data['pin']) < 6) {
                $data['pin_err'] = 'acc pin must not be less than 6 xters';
            }
            if (empty($data['nok'])) {
                $data['nok_err'] = 'enter next of kin';
            }

            if (empty($data['surname_err']) && empty($data['firstname_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['country_err']) && empty($data['state_err']) && empty($data['photo_err']) && empty($data['gender_err']) && empty($data['dob_err']) &&(empty($data['mname_err'])) && (empty($data['acc_num_err'])) && (empty($data['pin_err'])) && (empty($data['occupation_err'])) && empty($data['nok_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $data['pin'] = password_hash($data['pin'], PASSWORD_DEFAULT);
                    $reg = $this->userModel->register($data);
                    $move = $this->upload();
                if ($reg && $move) {
                    redirect('users/allusers');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/adduser', $data);
            }
        } else {
            $data = [
                'surname' => '',
                'firstname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'country' => '',
                'state' => '',
                'photo' => '',
                'gender' => '',
                'dob' => '',
                'occupation' => '',
                'status' => '',
                'mname' => '',
                'acc_num' => '',
                'pin' => '',
                'nok' => '',
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'country_err' => '',
                'state_err' => '',
                'photo_err' => '',
                'gender_err' => '',
                'dob_err' => '',
                'occupation_err' => '',
                'status_err' => '',
                'mname_err' => '',
                'acc_num_err' => '',
                'pin_err' => '',
                'nok_err' => ''
            ];
            $this->view('users/adduser', $data);
        }
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                #process form
                //sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'surname' => trim($_POST['surname']),
                    'firstname' => trim($_POST['firstname']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    
                    'surname_err' => '',
                    'firstname_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                if (empty($data['surname'])) {
                    $data['name_err'] = 'Please enter surname';
                }
                if (empty($data['firstname'])) {
                    $data['name_err'] = 'Please enter firstname';
                }
                if (empty($data['email'])) {
                    $data['email_err'] = 'Enter email address';
                } else {
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'password must be at least 3 xters';
                }
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } elseif (($data['password']) != ($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Password does not match';
                }

                if (empty($data['surname_err']) && empty($data['firstname_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        $reg = $this->userModel->signup($data);
                    if ($reg) {
                        // flash('success', 'account created, login and update profile');
                        redirect('users/login');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    $this->view('users/signup', $data);
                }
        } else {
            $data = [
                'surname' => '',
                'firstname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                    
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
                    
            ];
            $this->view('users/signup', $data);
        }
    }

    public function upload()
    {
        $name = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $extension = strtolower(substr($name, strpos($name, '.')+1));
        $location = '../public/images/';
        if ($extension=='jpg' || $extension=='jpeg') {
            if (move_uploaded_file($tmp_name, $location.$name)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function allusers()
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $users = $this->userModel->allUsers();

        $data = [
            'users' => $users
        ];

        $this->view('users/allusers', $data);
    }

    public function allsendmoney()
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $users = $this->userModel->allUsers();

        $data = [
            'users' => $users
        ];

        $this->view('users/allsendmoney', $data);
    }

    public function sendmoney($id)
    {
        if (!isLoggedIn()) {
            redirect('users/index');
        }
        $tracknum = '0123456789ABcdefGHijklMNopqrSTuvwxYZ';
        $result = substr(str_shuffle($tracknum), 0, 9);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'tid' => trim($_POST['tid']),
                'sender' => trim($_POST['sender']),
                'sender_bank' => trim($_POST['sender_bank']),
                'amount' => trim($_POST['amount']),
                'acc_num' => trim($_POST['acc_num']),
                'dod' => trim($_POST['dod']),
                'id_err' => '',
                'tid_err' => '',
                'sender_err' => '',
                'amount_err' => '',
                'dod_err' => ''
            ];
            if (empty($data['amount'])) {
                $data['amount_err'] = 'Please enter amount';
            }
            if (empty($data['sender'])) {
                $data['sender_err'] = 'Please enter sender name';
            }
            if (empty($data['sender_bank'])) {
                $data['sender_bank_err'] = 'Please enter sender bank';
            }
            if (empty($data['acc_num'])) {
                $data['acc_num_err'] = 'enter destination account';
            }

            if (empty($data['amount_err']) && (empty($data['sender_err'])) && empty($data['sender_bank_err']) && empty($data['acc_num_err'])) {
                if ($this->userModel->creditacc($data) && $this->userModel->updatecredit($data)) {
                    flash('credited', 'money has been sent');
                    redirect('users/dashboard');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/sendmoney', $data);
            }
        } else {
            $user = $this->userModel->getUserById($id);
            $data = [
                'id' => $user->id,
                'tid' => $result,
                'sender' => '',
                'amount' => '',
                'sender_bank' => '',
                'acc_num' => '',
                'dod' => '',
                'id_err' => '',
                'tid_err' => '',
                'sender_err' => '',
                'amount_err' => '',
                'sender_bank_err' => '',
                'acc_num_err' => '',
                'dod_err' => ''
            ];
            $this->view('users/sendmoney', $data);
        }
    }

    public function deleteuser($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userModel->getUserById($id);

            if ($this->userModel->deleteuser($id)) {
                redirect('users/allusers');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('users/allusers');
        }
    }

    public function clearcredit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userModel->getUserById($id);

            if ($this->userModel->clearaccount($user->id)) {
                flash('clear', 'account has been cleared');
                redirect('users/allusers');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('users/allusers');
        }
    }

    public function profile($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $user = $this->userModel->getUserById($id);
        $data = [
            'user' => $user
        ];
        $this->view('users/profile', $data);
    }

    public function show($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $user = $this->userModel->getUserById($id);
        $data = [
            'user' => $user
        ];
        $this->view('users/show', $data);
    }

    public function update($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'surname' => trim($_POST['surname']),
                'firstname' => trim($_POST['firstname']),
                'email' => trim($_POST['email']),
                'country' => trim($_POST['country']),
                'state' => trim($_POST['state']),
                'photo' => trim($_FILES['photo']['name']),
                'gender' => trim($_POST['gender']),
                'dob' => trim($_POST['dob']),
                'occupation' => trim($_POST['occupation']),
                'status' => trim($_POST['status']),
                'mname' => trim($_POST['mname']),
                'acc_num' => trim($_POST['acc_num']),
                'pin' => trim($_POST['pin']),
                'nok' => trim($_POST['nok']),
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'country_err' => '',
                'state_err' => '',
                'photo_err' => '',
                'gender_err' => '',
                'dob_err' => '',
                'occupation_err' => '',
                'status_err' => '',
                'mname_err' => '',
                'acc_num_err' => '',
                'pin_err' => '',
                'nok_err' => ''
            ];

            if (empty($data['surname'])) {
                $data['name_err'] = 'Please enter surname';
            }
            if (empty($data['firstname'])) {
                $data['name_err'] = 'Please enter firstname';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Enter email address';
            }
            if (empty($data['country'])) {
                $data['country_err'] = 'Please enter country';
            }
            if (empty($data['state'])) {
                $data['state_err'] = 'Please enter state';
            }
            if (empty($data['photo'])) {
                $data['photo_err'] = 'select a file';
            }
            if (empty($data['gender'])) {
                $data['gender_err'] = 'select a gender';
            }
            if (empty($data['dob'])) {
                $data['dob_err'] = 'enter date of birth';
            }
            if (empty($data['mname'])) {
                $data['mname_err'] = 'enter mothers name';
            }
            if (empty($data['acc_num'])) {
                $data['acc_num_err'] = 'enter name account number';
            }
            if (empty($data['pin'])) {
                $data['pin_err'] = 'enter your pin';
            }
            if (empty($data['nok'])) {
                $data['nok_err'] = 'enter next of kin';
            }

            if (empty($data['surname_err']) && empty($data['firstname_err']) && empty($data['email_err']) && empty($data['country_err']) && empty($data['state_err']) && empty($data['photo_err']) && empty($data['gender_err']) && empty($data['dob_err']) &&(empty($data['mname_err'])) && (empty($data['acc_num_err'])) && (empty($data['pin_err'])) && (empty($data['occupation_err'])) && empty($data['nok_err'])) {
                $data['pin'] = password_hash($data['pin'], PASSWORD_DEFAULT);    
                $reg = $this->userModel->updateuser($data);
                    $move = $this->upload();
                if ($reg && $move) {
                    redirect('users/allusers');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/update', $data);
            }
        } else {
            $user = $this->userModel->getUserById($id);
            $data = [
                'id' => $id,
                'surname' => $user->surname,
                'firstname' => $user->firstname,
                'email' => $user->email,
                'country' => $user->country,
                'state' => $user->state,
                'photo' => $user->image,
                'gender' => $user->gender,
                'dob' => $user->dob,
                'occupation' => $user->occupation,
                'status' => $user->status,
                'mname' => $user->mname,
                'acc_num' => $user->acc_num,
                'pin' => $user->pin,
                'nok' => $user->nok,
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'country_err' => '',
                'state_err' => '',
                'photo_err' => '',
                'gender_err' => '',
                'dob_err' => '',
                'occupation_err' => '',
                'status_err' => '',
                'mname_err' => '',
                'acc_num_err' => '',
                'pin_err' => '',
                'nok_err' => ''
            ];
            $this->view('users/update', $data);
        }
    }

    public function updateprofile($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'surname' => trim($_POST['surname']),
                'firstname' => trim($_POST['firstname']),
                'email' => trim($_POST['email']),
                'country' => trim($_POST['country']),
                'state' => trim($_POST['state']),
                'photo' => trim($_FILES['photo']['name']),
                'gender' => trim($_POST['gender']),
                'dob' => trim($_POST['dob']),
                'occupation' => trim($_POST['occupation']),
                'status' => trim($_POST['status']),
                'mname' => trim($_POST['mname']),
                'acc_num' => trim($_POST['acc_num']),
                'pin' => trim($_POST['pin']),
                'nok' => trim($_POST['nok']),
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'country_err' => '',
                'state_err' => '',
                'photo_err' => '',
                'gender_err' => '',
                'dob_err' => '',
                'occupation_err' => '',
                'status_err' => '',
                'mname_err' => '',
                'acc_num_err' => '',
                'pin_err' => '',
                'nok_err' => ''
            ];

            if (empty($data['surname'])) {
                $data['name_err'] = 'Please enter surname';
            }
            if (empty($data['firstname'])) {
                $data['name_err'] = 'Please enter firstname';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Enter email address';
            }
            if (empty($data['country'])) {
                $data['country_err'] = 'Please enter country';
            }
            if (empty($data['state'])) {
                $data['state_err'] = 'Please enter state';
            }
            if (empty($data['photo'])) {
                $data['photo_err'] = 'select a file';
            }
            if (empty($data['gender'])) {
                $data['gender_err'] = 'select a gender';
            }
            if (empty($data['dob'])) {
                $data['dob_err'] = 'enter date of birth';
            }
            if (empty($data['mname'])) {
                $data['mname_err'] = 'enter mothers name';
            }
            if (empty($data['acc_num'])) {
                $data['acc_num_err'] = 'enter name account number';
            }
            if (empty($data['pin'])) {
                $data['pin_err'] = 'enter your pin';
            }
            if (empty($data['nok'])) {
                $data['nok_err'] = 'enter next of kin';
            }

            if (empty($data['surname_err']) && empty($data['firstname_err']) && empty($data['email_err']) && empty($data['country_err']) && empty($data['state_err']) && empty($data['photo_err']) && empty($data['gender_err']) && empty($data['dob_err']) &&(empty($data['mname_err'])) && (empty($data['acc_num_err'])) && (empty($data['pin_err'])) && (empty($data['occupation_err'])) && empty($data['nok_err'])) {
                    $data['pin'] = password_hash($data['pin'], PASSWORD_DEFAULT);
                    $reg = $this->userModel->updateprofile($data);
                    $move = $this->upload();
                if ($reg && $move) {
                    flash('updatesuccess', 'profile has been updated');
                    redirect('users/dashboard');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/updateprofile', $data);
            }
        } else {
            $user = $this->userModel->getUserById($id);
            $data = [
                'id' => $id,
                'surname' => $user->surname,
                'firstname' => $user->firstname,
                'email' => $user->email,
                'country' => $user->country,
                'state' => $user->state,
                'photo' => $user->image,
                'gender' => $user->gender,
                'dob' => $user->dob,
                'occupation' => $user->occupation,
                'status' => $user->status,
                'mname' => $user->mname,
                'acc_num' => $user->acc_num,
                'pin' => $user->pin,
                'nok' => $user->nok,
                'surname_err' => '',
                'firstname_err' => '',
                'email_err' => '',
                'country_err' => '',
                'state_err' => '',
                'photo_err' => '',
                'gender_err' => '',
                'dob_err' => '',
                'occupation_err' => '',
                'status_err' => '',
                'mname_err' => '',
                'acc_num_err' => '',
                'pin_err' => '',
                'nok_err' => ''
            ];
            $this->view('users/updateprofile', $data);
        }
    }

    public function credit($id)
    {
        if (!isLoggedIn()) {
            redirect('users/index');
        }
        $tracknum = '0123456789ABcdefGHijklMNopqrSTuvwxYZ';
        $result = substr(str_shuffle($tracknum), 0, 9);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'tid' => trim($_POST['tid']),
                'sender' => trim($_POST['sender']),
                'amount' => trim($_POST['amount']),
                'current_bal' => trim($_POST['current_bal']),
                'avail_bal' => trim($_POST['avail_bal']),
                'dod' => trim($_POST['dod']),
                'id_err' => '',
                'tid_err' => '',
                'sender_err' => '',
                'amount_err' => '',
                'current_bal_err' => '',
                'avail_bal_err' => '',
                'dod_err' => ''
            ];
            if (empty($data['amount'])) {
                $data['amount_err'] = 'Please enter amount';
            }
            if (empty($data['current_bal'])) {
                $data['current_bal_err'] = 'Please enter current balance';
            }
            if (empty($data['avail_bal'])) {
                $data['avail_bal_err'] = 'enter transfer available balance';
            }

            if (empty($data['amount_err']) && (empty($data['current_bal_err'])) && empty($data['avail_bal_err'])) {
                if ($this->userModel->deposit($data)) {
                    flash('credited', 'user has been credited');
                    redirect('users/dashboard');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/credit', $data);
            }
        } else {
            $user = $this->userModel->getUserById($id);
            $data = [
                'id' => $user->id,
                'tid' => $result,
                'sender' => '',
                'amount' => '',
                'current_bal' => '',
                'avail_bal' => '',
                'dod' => '',
                'id_err' => '',
                'tid_err' => '',
                'sender_err' => '',
                'amount_err' => '',
                'current_bal_err' => '',
                'avail_bal_err' => '',
                'dod_err' => ''
            ];
            $this->view('users/credit', $data);
        }
    }

    public function account($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $user = $this->userModel->getUserById($id);
        $all = $this->userModel->alldeposit($user->id);
        $exist = $this->userModel->depositexist($user->id);
        $lastcredit = $this->userModel->lastsinglecredit($user->id);
        $data = [
            'user' => $user,
            'all' => $all,
            'exist' => $exist,
            'lastcredit' => $lastcredit
        ];
        $this->view('users/account', $data);
    }

    public function transferpin()
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $token = rand(1000, 8000);
        $starttime = date('h:i:s');
        $expiry = date('h:i:s', strtotime('+5 minutes', strtotime($starttime)));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'email' => trim($_POST['email']),
                'pin' => trim($_POST['pin']),
                'token' => trim($_POST['token']),
                'expiry' => $expiry,
                'email_err' => '',
                'pin_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'please enter email';
            }

            if (empty($data['pin'])) {
                $data['pin_err'] = 'please enter pin';
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                $data['email_err'] = 'no user found';
            }


            if (empty($data['email_err']) && empty($data['pin_err'])) {
                $userpin = $this->userModel->pin($data['email'], $data['pin']);
                $gentoken = $this->userModel->token($data);
                if ($userpin && $gentoken) {
                    $name = $_SESSION['surname'];
                    $fn = $_SESSION['firstname'];
                    // $this->mail->send('OTP', 'Dear '. $name .' '.$fn .'<br> '. $data['token']. ' is your transaction OTP <br> it expires after 5 mins <br> from ' .URLROOT, $data['email']);

                    $this->mail->receiver = $data['email'];
                    $this->mail->subject = "Token";
                    $template = $this->mail->template();
                    $this->mail->body = $this->mail->inject($template, SITENAME, "Transaction OTP", 'Dear '.ucfirst($name) .' '.$fn.'<br>'.'<b>'.$data['token']. "</b> is the OTP generated to complete your transaction. <br> Note this token expires after 300 seconds of inactivity");
                    $this->mail->sendemail();
                    flash('otp', 'complete transaction with OTP sent to email, please check spam folder if not found in inbox');
                    redirect('users/transfer');
                } else {
                    // $data['pin_err'] = 'Account Pin is invalid';
                    flashbad('invalid', 'account pin is incorrect');
                    $this->view('users/transferpin', $data);
                }
            } else {
                $this->view('users/transferpin', $data);
            }
        } else {
            $id = $_SESSION['user_id'];
            $getemail = $this->userModel->getUserById($id);
            $data = [
                'email' => $getemail->email,
                'pin' => '',
                'token' => $token,
                'email_err' => '',
                'pin_err' => ''
            ];
            $this->view('users/transferpin', $data);
        }
    }

    public function transfer()
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $tracknum = '0123456789ABcdefGHijklMNopqrSTuvwxYZ';
        $result = substr(str_shuffle($tracknum), 0, 9);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $time = date('h:i:s');
            // $ttime = date('h:i:s', strtotime($time));
            $id = $_SESSION['user_id'];
            $checkamount = $this->userModel->getavailablebal($id);
            $getstatus = $this->userModel->gettoken($id);
            $getaccstatus = $this->userModel->getUserById($id);
            $checkamount->available_bal;
            $getstatus->token;
            $getstatus->expiry;
            $getaccstatus->acc_status;
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $_SESSION['user_id'],
                'tid' => trim($_POST['tid']),
                'acc_name' => trim($_POST['acc_name']),
                'acc_num' => trim($_POST['acc_num']),
                'bank' => trim($_POST['bank']),
                'amount' => trim($_POST['amount']),
                'token' => trim($_POST['token']),
                'date' => date('m-D-Y'),
                'acc_name_err' => '',
                'acc_num_err' => '',
                'bank_err' => '',
                'amount_err' => '',
                'token_err' => ''
            ];

            if (empty($data['acc_name'])) {
                $data['acc_name_err'] = 'Please enter account name';
            }
            if (empty($data['acc_num'])) {
                $data['acc_num_err'] = 'Please enter account number';
            }elseif (($data['acc_num']) != $getaccstatus->acc_num) {
					$data['acc_num_err'] = 'Account number does not match';
			}
            if (empty($data['amount'])) {
                $data['amount_err'] = 'please enter amount';
            } elseif (($data['amount']) >= ($checkamount->available_bal)) {
                $data['amount_err'] = 'Amount is greater than available balance';
            } elseif ($checkamount->available_bal == '') {
                $data['amount_err'] = 'no sufficient balance';
            }

            if (empty($data['token'])) {
                $data['token_err'] = 'please enter token';
            } elseif (($data['token']) != ($getstatus->token)) {
                $data['token_err'] = 'token does not match';
            } elseif (($time > ($getstatus->expiry))) {
                $data['token_err'] = 'Oops! token expired, generate another token to transfer funds';
            }
            // elseif (($data['token']) == ($getstatus->token) || (($getstatus->expiry)>$time)) {
            //  $data['token_err'] = 'Time limit for transaction has been exceeded';
            // }
                


            if (empty($data['acc_name_err']) && (empty($data['acc_num_err'])) && empty($data['amount_err']) && empty($data['token_err'])) {
                if ((($getaccstatus->acc_status) == 'active')) {
                    $updatebal = $this->userModel->updatedeposit($data);
                    $inserttransfer = $this->userModel->transfer($data);

                    if ($updatebal && $inserttransfer) {
                        flash('success', 'Fund transfer was successful');
                        redirect('users/dashboard');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    flashbad('failed', 'Oops! fund transfer cannot be processed at the moment, try again later');
                    redirect('users/dashboard');
                }
            } else {
                $this->view('users/transfer', $data);
            }
        } else {
            $data = [
                'id' => $_SESSION['user_id'],
                'tid' => $result,
                'acc_name' => '',
                'acc_num' => '',
                'bank' => '',
                'amount' => '',
                'token' => '',
                'date' => '',
                'acc_name_err' => '',
                'acc_num_err' => '',
                'bank_err' => '',
                'amount_err' => '',
                'token_err' => ''
            ];
            $this->view('users/transfer', $data);
        }
    }

    public function debit($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $user = $this->userModel->getUserById($id);
        $debit = $this->userModel->viewdebit($user->id);
        $data = [
            'user' => $user,
            'debit' => $debit
        ];

        $this->view('users/debit', $data);
    }

    public function recentcredit($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        $user = $this->userModel->getUserById($id);
        $rcredit = $this->userModel->viewcredit($user->id);
        $data = [
            'user' => $user,
            'rcredit' => $rcredit
        ];

        $this->view('users/recentcredit', $data);
    }

    public function updateaccstatus($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'status' => trim($_POST['status'])
            ];
            if ($this->userModel->updateaccstatus($data)) {
                redirect('users/allusers');
            } else {
                die('something might have gone wrong');
            }
        } else {
            $this->view('users/allusers');
        }
    }

    public function changepass($id)
    {
        if (!isLoggedIn()) {
            redirect('users');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'old_password' => trim($_POST['old_password']),
                'new_password' => trim($_POST['new_password']),
                'rnew_password' => trim($_POST['rnew_password']),
                'old_password_err' => '',
                'new_password_err' => '',
                'rnew_password_err' => ''
            ];

            if (empty($data['old_password'])) {
                $data['old_password_err'] = 'Please enter old password';
            }
            if (empty($data['new_password'])) {
                $data['new_password_err'] = 'Please enter your new password';
            }
            if (empty($data['rnew_password'])) {
                $data['rnew_password_err'] = 'Please retype new password';
            } elseif ($data['new_password'] != $data['rnew_password']) {
                $data['rnew_password_err'] = 'Password does not match with new password';
            }

            if (empty($data['rnew_password_err']) && empty($data['old_password_err']) && empty($data['new_password_err'])) {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                if ($this->userModel->updatepass($data)) {
                    // echo "<script>alert ('password has been changed')</script>";
                    redirect('users/dashboard');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('users/changepass', $data);
            }
        } else {
            $data = [
                'id' => $id,
                'old_password' => '',
                'new_password' => '',
                'rnew_password' => '',
                'old_password_err' => '',
                'new_password_err' => '',
                'rnew_password_err' => ''
            ];
            $this->view('users/changepass', $data);
        }
    }
}
