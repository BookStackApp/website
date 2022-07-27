
// Mobile menu

const menuButton = document.getElementById('menu-button');
const menuDropDown = document.querySelector('#header .main-nav');

menuButton.addEventListener('click', function(event) {
  menuDropDown.classList.toggle('showing');
  event.stopPropagation();
});

document.body.addEventListener('click', function(event) {
  menuDropDown.classList.remove('showing');
  event.stopPropagation();  
});


// Handle video click to play
const videos = document.querySelectorAll('video');
for (let i = 0; i < videos.length; i++) {
    videos[i].addEventListener('click', videoClick)
}

function videoClick() {
    if (typeof InstallTrigger !== 'undefined') return;
    this.paused ? this.play() : this.pause();
}

// Header double click URL reference
document.body.addEventListener('dblclick', event => {
  const isHeader = event.target.matches('h1, h2, h3, h4, h5, h6');
  if (isHeader && event.target.id) {
    window.location.hash = event.target.id;
  }
});