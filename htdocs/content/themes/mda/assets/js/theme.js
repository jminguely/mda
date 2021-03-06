import 'bootstrap';
import homeGallery from  './components/home-gallery'
import bgGallery from  './components/bg-gallery'
import masonry from  './components/masonry'

document.addEventListener("DOMContentLoaded", function() {
  document.documentElement.classList.remove("no-js");
  document.documentElement.classList.add("js");

  homeGallery();
  masonry();

  var toggleButton = document.querySelector('.toggle-navigation');
  var navigation = document.querySelector('.site-nav');

  toggleButton.onclick = () => {
    toggleButton.classList.toggle('is-active');
    navigation.classList.toggle('is-visible');
    console.log(navigation);
  }
});
