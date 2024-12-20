<?php

class Controller {
    public function login(){
        session_start();
        if(isset($_SESSION['username'])) {
            header('Location: /profile');
            exit();
        }

        if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
            $_SESSION['username'] = $_COOKIE['username']; 
            header('Location: /profile');
            exit();
        }

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                if($password === 'password'){
                    $_SESSION['username'] = $username;
                    setcookie('username',$username,time() + ( 120 * 1000), "/");
                    header('Location: /profile');
                    exit();
                }
            }
        }

        require_once "views/login.view.php";
    }
    public function profile(){
        session_start();
        if(!isset($_SESSION['username']))
        header('Location: /');
        
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $language = $_POST['language'];
            setcookie('language', $language, time() + (24 * 60 * 60 * 1000), "/"); 
            $message = "Your preference for $language has been saved! ";
        }
        if (isset($_COOKIE['language'])) {
            $userLanguage = $_COOKIE['language'];
            $welcomeMessage = "Welcome back! Your preferred language is $userLanguage ";
        } else {
            $welcomeMessage = "Welcome! Please select your preferred language ";
        }
        require_once "views/profile.view.php";
    }
    public function logout(){
        setcookie('username','',time() + ( 120 * 1000), "/");
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
        exit();
    }
}