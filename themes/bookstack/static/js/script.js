
// Mobile menu

var menuButton = document.getElementById('menu-button');
var menuDropDown = document.querySelector('header div.inner');

menuButton.onclick = function(event) {
    var menuClass = menuDropDown.className;
    var visible = menuClass.indexOf('showing') !== -1;
    if (visible) {
        menuDropDown.className = menuClass.replace('showing', '');
    } else {
        menuDropDown.className += ' showing';
    }
    event.stopPropagation();
};

document.body.onclick = function(event) {
    menuDropDown.className = menuDropDown.className.replace('showing', '');
    event.stopPropagation();
};


// Handle video click to play
let videos = document.querySelectorAll('video');
for (var i = 0; i < videos.length; i++) {
    videos[i].addEventListener('click', videoClick)
}

function videoClick() {
    if (typeof InstallTrigger !== 'undefined') return;
    this.paused ? this.play() : this.pause();
}