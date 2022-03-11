
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


// Codemirror Setup

const modeMap = {
  'language-html': 'htmlmixed',
  'language-bash': 'shell',
  'language-js': 'javascript',
  'language-shell': 'bash',
  'language-nginx': 'nginx',
  'language-apache': 'apache',
  'language-php': 'php',
  'language-sql': 'text/x-mysql',
};

const codeBlocks = document.querySelectorAll('pre');
for (let i = 0; i < codeBlocks.length; i++) {
  const block = codeBlocks[i];
  const codeElem = block.querySelector('code');
  if (codeElem === null) continue;

  const langClass = codeElem.className;
  const mode = (typeof modeMap[langClass] !== 'undefined') ? modeMap[langClass] : 'htmlmixed';
  const content = codeElem.textContent.trim();
  CodeMirror(function(cmElem) {
    block.parentNode.replaceChild(cmElem, block);
  }, {
    theme: 'base16-light',
    lineNumbers: true,
    mode: mode,
    readOnly: true,
    value: content
  });
}
