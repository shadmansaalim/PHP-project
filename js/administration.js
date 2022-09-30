// Toggle Button To Open/Close Side Drawer
const togglerButton = document.getElementById('menu-toggle');
togglerButton.addEventListener('click', function handleChange(event) {
    const wrapperElem = document.getElementById('wrapper');
    if (wrapperElem.classList.length == 2) {
        wrapperElem.classList.remove('toggled');
    }
    else {
        wrapperElem.classList.add('toggled');
    }
});