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

function CreateAccount() {
    if ( isset( $_POST['submit'] ) ) {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $query = "INSERT INTO users(username, password, email)";
        $query .= "VALUES ('$username', '$password', '$email')";

        $result = mysqli_query( $connection, $query );

        if ( !$result ) {
            die( 'Query Failed' . mysqli_error() );
        } else {
            echo "Account Created";
        }

    }
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
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE users SET ";
    $query .= "username = '$username', ";

    $query .= "email = '$email', ";

    $query .= "password = '$password' ";

    $query .= "WHERE id = $id ";

    $result = mysqli_query( $connection, $query );
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