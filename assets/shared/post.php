<?php
    // array for population of posts
    $postsList = array();

    // Query for Post
    $postQuery = "SELECT posts.postID, users.userName, users.profilePicture, posts.title, posts.description, tags.tags AS tags,
                    tags.tagColor, attachments.attachmentName, attachments.attachmentPath, ratings.ratingValue AS rating, 
                    comments.content AS comment 
                    FROM users 
                    LEFT JOIN posts ON users.userID = posts.userID 
                    LEFT JOIN attachments ON posts.postID = attachments.postID 
                    LEFT JOIN tags ON posts.tagID = tags.tagID 
                    LEFT JOIN ratings ON posts.postID = ratings.postID 
                    LEFT JOIN comments ON posts.postID = comments.postID 
                    WHERE users.userID = posts.userID
                    ORDER BY posts.postID DESC;";

    $postResults = executeQuery($postQuery);

    while ($postRow = mysqli_fetch_assoc($postResults)) {
        // created class object to fetch data from the database and pass it to the object attributes
        $post = new Post(
            $postRow['postID'],
            $postRow['title'],
            $postRow['description'],
            $postRow['tags'],
            $postRow['attachmentName'],
            $postRow['attachmentPath'],
            $postRow['userName'],
            $postRow['rating'],
            $postRow['comment'],
            $postRow['profilePicture'],
            $postRow['tagColor']
        );

        array_push($postsList, $post);
    }

    if (isset($_GET['postID'])) {
        // to get the unique postID of each post
        $postID = $_GET['postID'];
        // Query for Comments from Post
        $commentsQuery = "SELECT posts.postID, posts.title, posts.description, users.userName, users.profilePicture, attachments.attachmentName, comments.content AS comment, tags.tags AS tags
                            FROM posts
                            LEFT JOIN users ON posts.userID = users.userID
                            LEFT JOIN comments ON posts.postID = comments.postID
                            LEFT JOIN attachments ON posts.postID = attachments.postID
                            LEFT JOIN tags ON posts.tagID = tags.tagID
                            WHERE posts.postID = posts.userID";

        $commentsResults = executeQuery($commentsQuery);

        if (mysqli_num_rows($commentsResults) > 0) {
            while ($commentRows = mysqli_fetch_assoc($commentsResults)) {
                $postID = $commentRows['postID'];
                $title = $commentRows['title'];
                $description = $commentRows['description'];
                $userName = $commentRows['userName'];
                $profilePicture = $commentRows['profilePicture'];
                $attachmentName = $commentRows['attachmentName'];
                $comment = $commentRows['comment'];
                $tags = $commentRows['tags'];

            }
        } else {
            echo "<p>No comments yet.</p>";
        }
    }
?>