var trigger = document.querySelector('.menu-trigger');
var lines = document.querySelectorAll('.line');
var navDown = document.querySelector('.list');
var inputBtn = document.querySelector('.header-container-btn-search');
var inputHide = document.querySelector('.header-container-input-close');
var closeBtn = document.querySelector('.header-container-close');
var btn_left = document.querySelector('.carousel-left-btn');
var btn_right = document.querySelector('.carousel-right-btn');
var imgs = document.querySelectorAll('.js-var');
var titleCountry = document.querySelector('.carousel-title-country');
var ul = document.querySelector('.list');
var listItem = document.querySelectorAll('.list-item');
var items = document.querySelectorAll('.topListContainer');
var more = document.querySelector('.btnMore');
var items2 = document.querySelectorAll('.topListContainer2');
var counter = 0;

// more.addEventListener('click', function(){
//   for (var i = 0; i < items.length; i++) {
//     items[i].classList.add('hide');
//
// }
//
//   for (var i = 0; i < items2.length; i++) {
//       items2[i].classList.add('show');
//     }
// })

for (var i = 0; i < listItem.length; i++) {
  listItem[i].addEventListener('click', function() {
    trigger.classList.remove('active');
    ul.classList.remove('navDown');
  });
}

trigger.addEventListener('click', function() {
  trigger.classList.toggle('active');
  navDown.classList.toggle('navDown');
});
inputBtn.addEventListener('click', function() {
  inputBtn.classList.add('-none');
  inputHide.classList.add('navDown');
});
closeBtn.addEventListener('click', function() {
  inputHide.classList.remove('navDown');
  inputBtn.classList.remove('-none');
});

titleCountry.textContent = imgs[counter].dataset.pays;

btn_right.addEventListener('click', function() {
  if (counter < imgs.length - 1) {
    imgs[counter].classList.remove('is-active');
    counter++;
    imgs[counter].classList.add('is-active');
    titleCountry.textContent = imgs[counter].dataset.pays;
    console.log(imgs[counter]);
  } else {
    counter = 0;
    imgs[imgs.length - 1].classList.remove('is-active');
    imgs[counter].classList.add('is-active');
    titleCountry.textContent = imgs[counter].dataset.pays;
  }
});

btn_left.addEventListener('click', function() {
  if (counter < imgs.length - 1) {
    imgs[counter].classList.remove('is-active');
    counter++;
    imgs[counter].classList.add('is-active');
    titleCountry.textContent = imgs[counter].dataset.pays;
  } else {
    counter = 0;
    imgs[imgs.length - 1].classList.remove('is-active');
    imgs[counter].classList.add('is-active');
    titleCountry.textContent = imgs[counter].dataset.pays;
  }
  if (counter > 0) {
    imgs[counter + imgs.length];
  }
});
