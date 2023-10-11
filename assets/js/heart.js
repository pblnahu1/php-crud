const heart = document.getElementsByClassName('heart');

for (let i = 0; i < heart.length; i++){
    heart[i].addEventListener('click', function () {
        this.classList.toggle('selected');
    })
}
