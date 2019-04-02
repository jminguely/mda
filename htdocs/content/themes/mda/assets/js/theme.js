import 'bootstrap';
import homeGallery from  './components/home-gallery'

document.addEventListener("DOMContentLoaded", function() {
  document.documentElement.classList.remove("no-js");
  document.documentElement.classList.add("js");

  homeGallery();

  var toggleButton = document.querySelector('.toggle-navigation');
  var navigation = document.querySelector('.site-nav');

  toggleButton.onclick = () => {
    toggleButton.classList.toggle('is-active');
    navigation.classList.toggle('is-visible');
    console.log(navigation);
  }
});
