// Function to load and insert HTML content from an external file
function includeHTML(file, elementId) {
    fetch(file)
      .then(response => response.text())
      .then(data => {
        document.getElementById(elementId).innerHTML = data;
      });
  }
  
  // Load the header and footer
  includeHTML('header.html', 'header');
  includeHTML('footer.html', 'footer');



  //$ quick access buttons(whatsapp and call) animation
window.addEventListener("scroll", function() {
  const navbar = document.querySelector(".wts-icn");
  const scrolled = window.scrollY;

  // Add or remove a CSS class to control the appearance of the navbar when scrolling
  if (scrolled > 405) {
      navbar.classList.add("wts-actv");
  } else {
      navbar.classList.remove("wts-actv");
  }
});

window.addEventListener("scroll", function() {
  const navbar = document.querySelector(".cal-icn");
  const scrolled = window.scrollY;

  // Add or remove a CSS class to control the appearance of the navbar when scrolling
  if (scrolled > 650) {
      navbar.classList.add("cal-actv");
  } else {
      navbar.classList.remove("cal-actv");
  }
});
  