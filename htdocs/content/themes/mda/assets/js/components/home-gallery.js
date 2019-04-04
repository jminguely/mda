export default () => {
  const gallery = document.getElementsByClassName("home-gallery");

  if(gallery.length > 0) {
    const showRandomImage = () => {
      const randomItem = Math.floor(Math.random() * gallery[0].children.length);

      [].forEach.call(gallery[0].children, function(item) {
          item.classList.remove("visible");
      });

      gallery[0].children[randomItem].classList.add('visible')
    }

    setInterval(showRandomImage, 6000);

    showRandomImage();

  }

};
