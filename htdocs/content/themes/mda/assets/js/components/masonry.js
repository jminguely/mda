import Masonry from 'masonry-layout';

export default () => {
  const masonry = document.getElementsByClassName("masonry-grid");
  if(masonry.length > 0) {
    var msnry = new Masonry( '.masonry-grid', {
      itemSelector: '.masonry-grid-item',
      percentPosition: true
    });
  }
};
