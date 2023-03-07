<?php

function allPreOrders()
{
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", 'root', '');
    $sql = "SELECT * FROM reserve";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br>";
    die();
  }
}
;

function login()
{
  try {
    $login = $_POST['login'];
    $password = hash('sha1', $_POST['password']);
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", 'root', '');
    $sql = "SELECT * FROM admins where (login='$login' and password='$password')";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    setcookie('admin', $data['login'], (time() + 3600) * 24, '/');
    header("Location: /admin/");
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br>";
    die();
  }
}

function user()
{
  try {
    $user = $_COOKIE['admin'];
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", 'root', '');
    $sql = "SELECT * FROM admins where login='$user'";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br>";
    die();
  }
}

function timeDimensions($date)
{
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", 'root', '');
    $sql = "SELECT * FROM reserve where date = '$date'";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br>";
    die();
  }
}

?>