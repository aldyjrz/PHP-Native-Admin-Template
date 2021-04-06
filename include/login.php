<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once 'env.config.php';

//get request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //check is post emoty??
    if (!empty($_POST)) {

        //prevent sql inject with escaping string
        $username    = mysqli_real_escape_string($kon, $_POST['username']);
        $password    = mysqli_real_escape_string($kon, $_POST['password']);
    }
    $login    = mysqli_query($kon, "SELECT * FROM m_user WHERE username='" . $username . "' AND password='" . $password . "'") or die(mysqli_errno($kon));
    $row    = mysqli_num_rows($login);

    if ($row > 0) {

        $row = mysqli_fetch_array($login);
        $_SESSION['level'] = $row['level'];
        $_SESSION['nama']  = $row['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        header('location:../index.php');
    } else {
        header('location:../login.php');
    }
}
