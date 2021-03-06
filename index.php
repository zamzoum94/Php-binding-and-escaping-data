<?php
    include 'db.php';
    include 'security.php';

    if(!empty($_POST)){
        $full_name = trim($_POST['full_name']);
        $role = trim($_POST['role']);
        $query = $db->prepare("INSERT INTO users (full_name, role, createdAt) VALUES (?, ?, NOW())");
        $query->bind_param("ss", $full_name, $role);
        if($query->execute()){
            header("Location: http://localhost/php-binding-and-escaping-data");
        }
    }

    $data = get_all();
?>



<html>
    <head>
        <title>users</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    
    </head>
    <body>
        <div class="container">
            <h3>Adding new users</h3>
            <form method="POST">
                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="full_name" placeholder="full_name"/>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="role" placeholder="role"/>
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-success">Insert</button>
                    </div>
                </div>
            </form>
            <hr>
            <h3>Users</h3>
            <div class="row">
                <div class="col-md-2">
                    <h6 class="text-info">Full name</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="text-info">Role</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="text-info">Created at</h6>
                </div>
            </div>
            <?php foreach($data as $user){ ?>
                <div class="row">
                    <div class="col-md-2">
                        <?=escape($user['full_name'])?>
                    </div>
                    <div class="col-md-2">
                        <?=escape($user['role'])?>
                    </div>
                    <div class="col-md-2">
                        <?=escape($user['createdAt']) ?>
                    </div>
                </div>
            <?php }?>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>