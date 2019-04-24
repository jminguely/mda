import Masonry from 'masonry-layout';

export default () => {
  console.log('msnr');
  var msnry = new Masonry( '.masonry-grid', {
    itemSelector: '.masonry-grid-item',
    percentPosition: true
  });
};
