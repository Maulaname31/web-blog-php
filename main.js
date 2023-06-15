const menuToogle = document.querySelector('.menu-toogle input');
const nav =document.querySelector('nav ul');

menuToogle.addEventListener('click', function(){
    nav.classList.toggle('slide');
});

// scroll
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('nav');
    if (window.pageYOffset > 0) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
  
  