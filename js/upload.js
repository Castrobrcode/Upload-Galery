const inputfile = document.querySelector('#picture__input');
const pictureimage = document.querySelector('.picture__image');
const pictureImageText = "Insira a Imagem";
pictureimage.innerHTML = pictureImageText;

inputfile.addEventListener('change', function(e) {
const inputTarget = e.target;
const file = inputTarget.files[0];

if (file) {
   const reader = new FileReader();
   
   reader.addEventListener('load', function(e){
    const readerTarget = e.target;
    const img = document.createElement('img');
    img.src = readerTarget.result;
    img.classList.add('picture__img');
    pictureimage.innerHTML = '';
    
    pictureimage.appendChild(img)
});

   reader.readAsDataURL(file);
}else
{
    pictureimage.innerHTML = pictureImageText;
}
});