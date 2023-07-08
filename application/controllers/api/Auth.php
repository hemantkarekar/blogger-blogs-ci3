<?php
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        $data = array(
            'username'   => $this->input->post('username'),
            'password'   => $this->input->post('password'),
            'remember'   => $this->input->post('remember'),
            'status'     => "Online",
            'created_at' => date("F j, Y H:m:s")
        );
        $query = "SELECT `status` FROM `users` WHERE `username` = '" . $data["username"] . "' AND `password` = '" . $data["password"] . "'";
        // die;
        if ($this->db->query($query)->result() == null) {
            $this->session->set_flashdata("oauth_error", "Username or Password is Incorrect");
            echo "Failed";
            
            // header("Location:" . base_url("login"));
        } else {
            $feed = array(
                'status'     => "Online",
                'last_logged_in' => date("F j, Y H:m:s")
            );
            $this->session->set_userdata([
                "username" => $data["username"]
            ]);
            $this->db->update('users', $feed, "username = '" . $data['username'] . "'");
            // echo "Success";
            header("Location:" . base_url());
        }
        
    }
    
    function logout()
    {
        $feed = array(
            'status'     => "Offline",
            'last_logged_in' => date("F j, Y H:m:s")
        );
        session_unset();
        $this->db->update('users', $feed, "username = '" . $_SESSION['username'] . "'");
        header("Location:" . base_url("login"));
    }

    function register_user()
    {
        $feed = array(
            'auto-login'   => $this->input->post('auto-login'),
        );
        
        $fields = array(
            'full_name'   => $this->input->post('f_name') . " " . $this->input->post("l_name"),
            'email'   => $this->input->post('email'),
            'mobile'   => $this->input->post('mobile'),
            'username'   => $this->input->post('mobile'),
            'password'   => $this->input->post('password'),
            'created_at' => date("F j, Y H:m:s")
        );

        if($feed['auto-login'] == "on"){
            $fields['status'] = "Online";
            $fields['last_logged_in'] = date("F j, Y H:m:s");
        }

        $this->db->insert('users', $fields);
        if($feed['auto-login'] == "on"){
            $this->session->set_userdata([
                "username" => $fields["mobile"]
            ]);
            header("Location:" . base_url());
        }
    }
}
