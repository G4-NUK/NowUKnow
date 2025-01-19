<?php

class User
{
    public $userID;
    public $firstName;
    public $lastName;
    public $userName;
    public $userType;

}

class Post
{
    public $postID;
    public $title;
    public $description;
    public $tags;
    public $attachmentName;
    public $attachmentPath;
    public $userName;
    public $ratingID;
    public $comment;
    public $profilePicture;
    public $tagImg;

    public function __construct($postID, $title, $description, $tags, $attachmentName, $attachmentPath, $userName, $ratingID, $comment, $profilePicture, $tagImg)
    {
        $this->postID = $postID;
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
        $this->attachmentName = $attachmentName;
        $this->attachmentPath = $attachmentPath;
        $this->userName = $userName;
        $this->ratingID = $ratingID;
        $this->comment = $comment;
        $this->profilePicture = $profilePicture;
        $this->tagImg = $tagImg;
    }

    public function createPost()
    {
        return '
            <div class="card custom-card mb-4">
                <div class="card-header d-flex align-items-center p-3" style="border-color:white">
                    <img src="../assets/imgs/' . $this->profilePicture . '" class="profile-pic me-1">
                    <div>
                        <h6 class="mb-0 profile-text">' . $this->userName . '</h6>
                    </div>
                    <div>
                        <button class="btn btn-primary ms-1 follow-btn">Follow</button>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                        <button class="btn maximize-btn" data-bs-toggle="modal" data-bs-target="#cardModal' . $this->postID . '" data-post-id=btnViewPost"' . $this->postID . '" onclick="showModal(\'' . $this->postID . '\')
                        ">
                            <img src="../assets/icons/maximize.svg">
                        </button>
                    </div>
                </div>
                <!-- uploaded media -->
                <img src="../assets/imgs/' . $this->attachmentName . '" class="card-img-top">
                <!-- body -->
                <div class="card-body p-5">
                    <h2 class="card-text title-text p-1">' . $this->title . '</h2>
                    <p class="card-text body-text px-2">' . nl2br(htmlspecialchars($this->description)) . '</p>
                    <button class="btn btn-primary follow-btn ms-1 mt-0 mb-2" style="background-color: grey;">' . $this->tags . '</button>
                    <!-- bottom buttons -->
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <span class="bottom-buttons icon-button" data-bs-toggle="modal" data-bs-target="#cardModal">
                                <img src="../assets/icons/comment.svg" class="me-1">Comments
                            </span>
                            
                            <form method="POST">
                                <span class="bottom-buttons icon-button" onclick="toggleActive(this)">
                                     <!-- <img src="assets/icons/bookmark2.svg" class="me-1">Bookmark -->
                                        <button type="submit" name="bookmark" class="bottom-buttons icon-button d-flex justify-content-between" style="background: none; border: none; padding: 0;">
                                            <img src="../assets/icons/bookmark2.svg" class="me-1">Bookmark
                                        </button>
                                </span>
                                 <input type="hidden" name="postID" value="' . $this->postID .'">
                            </form>
                        </div>
                        <div class="d-flex">
                            <div class="star" onclick="setRating(1)">
                                <img src="../assets/icons/star.svg" class="me-1 star-icon">
                            </div>
                            <div class="star" onclick="setRating(2)">
                                <img src="../assets/icons/star.svg" class="me-1 star-icon">
                            </div>
                            <div class="star" onclick="setRating(3)">
                                <img src="../assets/icons/star.svg" class="me-1 star-icon">
                            </div>
                            <div class="star" onclick="setRating(4)">
                                <img src="../assets/icons/star.svg" class="me-1 star-icon">
                            </div>
                            <div class="star" onclick="setRating(5)">
                                <img src="../assets/icons/star.svg" class="me-1 star-icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }


    public function showModal()
    {
        return '<div class="modal fade" id="cardModal' . $this->postID . '" tabindex="-1"
                        aria-labelledby="cardModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="background-color: transparent; border: none;">
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="card custom-card">
                                            <!-- user -->
                                            <div class="card-header d-flex align-items-center p-3"
                                                style="border-color:white">
                                                <img src="../assets/imgs/' . $this->profilePicture . '" class="profile-pic me-1">
                                                <div>
                                                    <h6 class="mb-0 profile-text">' . $this->userName . '</h6>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary ms-1 follow-btn">Follow</button>
                                                </div>

                                                <div class="ms-auto d-flex align-items-center" data-bs-dismiss="modal">
                                                    <button class="btn maximize-btn"><img
                                                            src="../assets/icons/minimize.svg"></button>
                                                </div>
                                            </div>
                                            <!-- uploaded media -->
                                            <img src="../assets/imgs/' . $this->attachmentName . '" class="card-img-top">
                                            <!-- body -->
                                            <div class="card-body">
                                                <h2 class="card-text title-text p-1">' . $this->title . '</h2>
                                                <div class="modal-body">
                                                    <p class="card-text body-text px-2">' . $this->description . '</p>
                                                </div>


                                                <button class="btn btn-primary follow-btn ms-1 mt-0 mb-2"
                                                    style="background-color: #808080;">' . $this->tags . '</button>
                                                <!-- bottom buttons -->
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex">
                                                        <span class="bottom-buttons icon-button"
                                                            onclick="toggleCommentInput(this)">
                                                            <img src="../assets/icons/comment.svg" class="me-1">Comment
                                                        </span>
                                                        <span class="bottom-buttons icon-button"
                                                            onclick="toggleActive(this)">
                                                            <img src="../assets/icons/bookmark2.svg" class="me-1">Bookmark
                                                        </span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary follow-btn me-2 button-text"
                                                            style="background-color: #B23B3B;"><img
                                                                src="../assets/icons/delete2.svg">Delete</button>
                                                        <button class="btn btn-primary follow-btn me-2 button-text"
                                                            style="background-color: #7091E6;"><img
                                                                src="../assets/icons/edit2.svg">Edit</button>

                                                        <div class="star" onclick="setRating(1)">
                                                            <img src="../assets/icons/star.svg" class="me-1 star-icon">
                                                        </div>
                                                        <div class="star" onclick="setRating(2)">
                                                            <img src="../assets/icons/star.svg" class="me-1 star-icon">
                                                        </div>
                                                        <div class="star" onclick="setRating(3)">
                                                            <img src="../assets/icons/star.svg" class="me-1 star-icon">
                                                        </div>
                                                        <div class="star" onclick="setRating(4)">
                                                            <img src="../assets/icons/star.svg" class="me-1 star-icon">
                                                        </div>
                                                        <div class="star" onclick="setRating(5)">
                                                            <img src="../assets/icons/star.svg" class="me-1 star-icon">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- collapsible comment -->
                                            <div class="comment-input-container" style="background-color:#C9F6FF">
                                                <form method="POST">
                                                    <div class="mb-3">
                                                        <textarea class="form-control body-text" name="comment" rows="5"
                                                            placeholder="Write a comment..."></textarea>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary my-1 ms-1">Comment</button>
                                                </form>
                                                <div>
                                                    <h5 class="body-text mt-5 ms-2" style="color: #808080;">Comments
                                                    </h5>
                                                </div>

                                                <!-- Comments Section -->
                                                <div class="comment-list text-break">
                                                    <div class="card comment-card mb-2 body-text">
                                                        <div class="comment-card-header d-flex align-items-center ms-3 mt-3"
                                                            style="border-color:white">
                                                            <img src="../assets/imgs/' . $this->profilePicture . '"
                                                                class="profile-pic me-1">
                                                            <div>
                                                                <h6 class="mb-0 profile-text">' . $this->userName . '
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <p class="ms-5 me-3 p-2">' . $this->comment . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}


?>