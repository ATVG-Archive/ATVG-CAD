<?php
    include("../oc-config.php");
    include("../plugins/api_auth.php");

    //get search term
    $searchTerm = htmlspecialchars($_GET['term']);

    try{
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    } catch(PDOException $ex)
    {
        $_SESSION['error'] = "Could not connect -> ".$ex->getMessage();
        $_SESSION['error_blob'] = $ex;
        header('Location: '.BASE_URL.'/plugins/error/index.php');
        die();
    }

    $searchTerm = "%$searchTerm%";

    $stmt = $pdo->prepare("SELECT name FROM ncic_names WHERE name LIKE :searchTerm ORDER BY name ASC");
    $stmt->bindValue(':searchTerm', $searchTerm);
    $resStatus = $stmt->execute();

    if (!$resStatus)
    {
        $_SESSION['error'] = $stmt->errorInfo();
        header('Location: '.BASE_URL.'/plugins/error/index.php');
        die();
    }
    $pdo = null;

    $rows = $stmt->fetchAll();

    $data = [];

    //get matched data from skills table
    foreach ($rows as $row) {
        $data[] = $row['name'];
    }
    //return json data
    echo json_encode($data);
?>