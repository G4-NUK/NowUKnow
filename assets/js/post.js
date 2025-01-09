
function setRating(rating) {
    let stars = document.querySelectorAll('.star');

    // Loop through all the stars and set their active state
    stars.forEach((star, index) => {
        const img = star.querySelector('img');
        if (index < rating) {
            img.classList.add('active');
            img.classList.remove('inactive');
        } else {
            img.classList.remove('active');
            img.classList.add('inactive');
        }
    });
}

// colapsable comment
function toggleCommentInput(button) {
    const commentInputContainer = button.closest('.custom-card').querySelector('.comment-input-container');
    commentInputContainer.style.display = (commentInputContainer.style.display === "none" || commentInputContainer.style.display === "") ? "block" : "none";
}

function toggleActive(button) {
    button.classList.toggle('active');
}

function setRating(rating) {
    const stars = document.querySelectorAll('.star img');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.classList.add('active');
        } else {
            star.classList.remove('active');
        }
    });
}