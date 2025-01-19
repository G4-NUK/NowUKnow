<?php 

$userID = $_GET['userID'];

if (isset($_POST['postID'])) {
    $postID = $_POST['postID'];
    
    $addBookmark = "INSERT INTO `savedbookmarks`( `postID`, `userID`) VALUES ('$postID','$userID')";
    executeQuery($addBookmark);

    $lastInsertedId = mysqli_insert_id($conn);

}
?>