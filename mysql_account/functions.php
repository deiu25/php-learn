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
            if (!$result) {
                die('Error in query: ' . mysqli_error($connection)); // Verify if the query was successful
            }
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                //     print_r ($user);
                //  echo 'Database Password Hash: ' . $user['password'] . '<br/>'; // Print the database password hash
                //  echo 'User input password: ' . $password . '<br/>'; // Print the user input password
                //  echo 'Password verify result: ' . (password_verify($password, $user['password']) ? 'true' : 'false') . '<br/>'; // Print password verification result

                if (true === password_verify($password, $user['password'])) {
                    // login successful
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username']; // set the username in the session
                    header("Location: login_read.php");
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
                header("Location: login.php");
                    exit;
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

function Account() {
    global $connection;
    if(isset($_SESSION['username'])){
        $query = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query FAILED' . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($result);

        if (isset($row['username'])) {
            $username = $row['username'];
        } else {
            // Handle the case where username is not set in the row
        }

        if (isset($row['email'])) {
            $email = $row['email'];
        } else {
            // Handle the case where email is not set in the row
        }

        $id = $row['id'];  // Add this line

        // alte date de utilizator dacă sunt disponibile

        return array('username' => $username, 'email' => $email, 'id' => $id);  // And this line
    }else{
        header("Location: login.php"); // Redirectionare către pagina de login dacă utilizatorul nu este autentificat
        exit;
    }
}




function UpdateTable() {
    if (isset($_POST['submit'])) { 
        global $connection;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $password2 = $_POST['password2']; 
        $id = $_POST['id'];

        if ($password !== $password2) {
            echo "Passwords do not match!";
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password

        $query = $connection->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
        $query->bind_param("sssi", $username, $email, $password, $id); 

        if (!$query->execute()) {
            die('QUERY FAILED'. mysqli_error($connection));
        } else {
            echo "Record Updated";
        }

        $query->close();
    }
}

function DeleteAccount() {
    
    global $connection;
    $errors = array();

    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $username = $_SESSION['username'];

        $query = "SELECT password FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query FAILED' . mysqli_error($connection));
        }

        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $query = "DELETE FROM users WHERE username = '$username'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('Query FAILED' . mysqli_error($connection));
            } else {
                session_unset();
                session_destroy();
                header("Location: login.php"); // Redirect to login page after account deletion
                exit;
            }
        } else {
            $errors[] = "Incorrect password";
        }
    }

    return $errors;
}



function ValidateErrors($errors) {
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }
}