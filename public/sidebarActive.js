// Get the current URL
var currentUrl = window.location.pathname;

// Loop through each sidebar link
var links = document.querySelectorAll('.sidebarLink');
for (var i = 0; i < links.length; i++) {
    var link = links[i];

    // Check if the link's href matches the current URL
    if (link.getAttribute('href') === currentUrl) {
        link.classList.add('active'); // Add the "active" class
    }
}