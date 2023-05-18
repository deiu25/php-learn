<?php include "db.php";
?>

<?php

function showAllData() {

    global $connection;

    $query = "SELECT * FROM users";

    $result = mysqli_query( $connection, $query );

    if ( !$result ) {
        die( 'Query Failed' . mysqli_error() );
    }

    while( $row = mysqli_fetch_assoc( $result ) ) {
        $id = $row['id'];
        echo  "<option value='$id'>$id</option>";
    }
}

function Login() {
    $errors = [];

    global $connection;
    
    if (isset($_POST['submit'])) {
        $email = validate($_POST['email']);
        $password = $_POST['password']; // Removed the validate() function call here
        
        if (empty($email) || empty($password)) {
            $errors[] = "Email and password are required";
        } else {
            $email = mysqli_real_escape_string($connection, $email);
            
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                
//                  echo 'Database Password Hash: ' . $user['password'] . '<br/>'; // Print the database password hash
//                echo 'User input password: ' . $password . '<br/>'; // Print the user input password
//                echo 'Password verify result: ' . (password_verify($password, $user['password']) ? 'true' : 'false') . '<br/>'; // Print password verification result
//                
                if (password_verify($password, $user['password'])) {
                    // login successful
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $errors[] = "Invalid password";
                }
            } else {
                $errors[] = "User with this email does not exist";
            }
        }
    }
    return $errors;
}



function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function CreateAccount() {
    $errors = array();
    
    if ( isset( $_POST['submit'] ) ) {
        global $connection;
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        $email = validate($_POST['email']);

        // verificare daca email-ul exista deja
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            $errors[] = "Email already exists.";
        }

        // verificare daca username-ul exista deja
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            $errors[] = "Username already exists.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $errors[] = "Invalid username - only letters and numbers allowed";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password should be at least 8 characters";
        }

        if (empty($errors)) {
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
   
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = $connection->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $query->bind_param("sss", $username, $password, $email);

            $result = $query->execute();

            if ( !$result ) {
                die( 'Query Failed' . mysqli_error() );
            } else {
                echo "Account Created";
            }
        }
    }
    return $errors;
}



function ReadRows() {
    global $connection;
$query = "SELECT * FROM users";
$result = mysqli_query( $connection, $query );

if ( !$result ) {
    die( 'Query Failed' . mysqli_error() );
}
    while( $row = mysqli_fetch_assoc( $result ) ) {
    print_r( $row );
    }
}

function UpdateTable() {
    if ( isset( $_POST['submit'] ) ) { 
        global $connection;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Remove call to validate()
        $id = $_POST['id'];

        $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password before mysqli_real_escape_string()

        $query = $connection->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
        $query->bind_param("sssi", $username, $email, $password, $id);

        $result = $query->execute();
        if ( !$result ) {
            die( "QUERY FAILED" . mysqli_error( $connection ) );
        } else {
            echo "Account Updated";
        }
    }
}

function DeleteRows() {

    if ( isset( $_POST['submit'] ) ) {

        global $connection;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "DELETE from users ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query( $connection, $query );
        if ( !$result ) {
            die( "QUERY FAILED" . mysqli_error( $connection ) );
        } else {
            echo "Account Deleted";
        }

    }
}

function ValidateErrors($errors) {
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }
}