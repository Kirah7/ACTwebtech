<?php
if(isset($_POST['submit'])){
    include './pages/conixion.php';
    $users = $_POST['users'];

    foreach($users as $user) {
        $userName = $user['username'];
        $email = $user['email'];
        $pass = $user['pass'];
        $conPass = $user['conPass'];
        
        if($pass === $conPass){
            $requete = $con->prepare("INSERT INTO users(username, Email, Password) VALUES('$userName', '$email', '$pass')");
            $requete->execute();
        } else {
            header("location:index.php?error=password not found");
            exit;
        }
    }
    
    header('location:index.php');
}
?>

<form method="POST">
    <label for="users">Users:</label>
    <div id="users">
        <div class="user">
            <input type="text" name="users[0][username]" placeholder="Username">
            <input type="email" name="users[0][email]" placeholder="Email">
            <input type="password" name="users[0][pass]" placeholder="Password">
            <input type="password" name="users[0][conPass]" placeholder="Confirm Password">
        </div>
        <div class="user">
            <input type="text" name="users[1][username]" placeholder="Username">
            <input type="email" name="users[1][email]" placeholder="Email">
            <input type="password" name="users[1][pass]" placeholder="Password">
            <input type="password" name="users[1][conPass]" placeholder="Confirm Password">
        </div>
        <!-- Add more users as needed -->
    </div>
    <button type="submit" name="submit">Create Users</button>
</form>