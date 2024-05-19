
  (function ($) {

  "use strict";

    // MENU
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });

    // CUSTOM LINK
    $('.smoothscroll').click(function(){
      var el = $(this).attr('href');
      var elWrapped = $(el);
      var header_height = $('.navbar').height();

      scrollToDiv(elWrapped,header_height);
      return false;

      function scrollToDiv(element,navheight){
        var offset = element.offset();
        var offsetTop = offset.top;
        var totalScroll = offsetTop-0;

        $('body,html').animate({
        scrollTop: totalScroll
        }, 300);
      }
    });

    $('.owl-carousel').owlCarousel({
        center: true,
        loop: true,
        margin: 30,
        autoplay: true,
        responsiveClass: true,
        responsive:{
            0:{
                items: 2,
            },
            767:{
                items: 3,
            },
            1200:{
                items: 4,
            }
        }
    });

  })(window.jQuery);

  //Функция прижимания футера к низу страницы
  function footer(){
      var main = document.getElementsByTagName('main')[0],
          footer = document.getElementsByTagName('footer')[0];
      main.style.minHeight = 'calc(100vh - ' + footer.offsetHeight + 'px)';
  }
  window.addEventListener('load', footer);
  window.addEventListener('resize', footer);

  // Функция добавить в избранное
  function addFavorite(el){
      const root = document.location.protocol + '//' + document.location.host;
      var title = document.location.host;
      title = title.replace(title[0], title[0].toUpperCase());
      try{
          // Internet Explorer
          window.external.AddFavorite(root, title);
      }
      catch(e){
          try{
              // Mozilla
              window.sidebar.addPanel (title, root, "");
          }
          catch(e){
              // Opera
              if(typeof(opera) == "object"){
                  el.rel = "sidebar";
                  el.title = title;
                  el.url = root;
                  return true;
              }
              else{
                  // Unknown
                  alert("Ваш браузер не поддерживает автоматическое добавление закладок. Нажмите Ctrl+D чтобы добавить страницу в закладки.");
              }
          }
      }
      return false;
  }
  //Функция генерации пароля
  function genPassword(){
      var input = document.getElementById("password"),
          chars = "0123456789abcdefghijklmnoprstuvwxyz!@$%^&*ABCDEFGHIJKLMNOPRSTUVWXYZ",
          passwordLenght = Math.floor(Math.random() * (16 - 8) + 8), // 17  max символов, min 8 символов
          password = "",
          pattern = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
      for (var i=0; i <= passwordLenght; i++){
          var randomNumber = Math.floor(Math.random() * chars.length);
          password += chars.substring(randomNumber, randomNumber +1);
      }
      if(pattern.test(password)){
          input.value = password;
          input.type = "text";
      }
      else{
          genPassword();
      }
  }
