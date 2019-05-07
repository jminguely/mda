export default () => {
  const gallery = document.getElementsByClassName("bg-gallery");
  const w=window,
  d=document,
  e=d.documentElement,
  g=d.getElementsByTagName('body')[0];

  const positionMatrix = [
    [1,1],
    [0,0],
    [0,2],
    [2,0],
    [2,2],
  ];

  const windowWidth = w.innerHeight||e.clientHeight||g.clientHeight;
  const windowHeight = w.innerWidth||e.clientWidth||g.clientWidth;

  if(gallery.length > 0) {
    const firstPaint = () => {

      for (let i = 0; i < Math.min(positionMatrix.length, gallery[0].children.length); i++) {
        const position = positionMatrix[i];
        showImage(gallery[0].children[i], position, i);
      }
    }

    const showNextImage = () => {
      const imageToHideNumber = Math.floor(Math.random() * 5);
      const imageToHideItem = gallery[0].querySelector(`[data-position='${imageToHideNumber}']`);

      const imagesNotVisible = gallery[0].querySelectorAll(`:not(.visible)`);
      const imageToShowNumber = Math.floor(Math.random() * imagesNotVisible.length);
      const imageToShowItem = imagesNotVisible[imageToShowNumber];

      imageToHideItem.classList.remove('visible');
      imageToHideItem.removeAttribute('data-position');

      console.log(imageToHideItem);
      
      showImage(imageToShowItem, positionMatrix[imageToHideNumber], imageToHideNumber);
    }

    const showImage = (item, position, i) => {
      item.style.top = `${position[0]*40 + (Math.floor(Math.random() * 20) - 20)}vh`;
      item.style.left = `${position[1]*40 + (Math.floor(Math.random() * 20) - 20)}vw`;
      item.style.width = `${Math.random() * 20 + 10}vw`;
      item.classList.add('visible');
      item.setAttribute('data-position', i);
    }

    setInterval(showNextImage, 5000);

    firstPaint();
  }
};
