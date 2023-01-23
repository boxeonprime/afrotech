
/* GLOBAL */

var Afrotok = Afrotok || {};

/**
 * Utility functions
 */

Afrotok = {

  sendAjax: function (data, back) {

    var xhttp = new XMLHttpRequest();

    xhttp.open(data.method, data.action, true);

    xhttp.setRequestHeader('Content-type', data.contentType);

    xhttp.setRequestHeader(data.customHeader, data.payload, false);

    xhttp.send();

    xhttp.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {

        try {

          //Afrotok.removeLoader();

        } catch (e) {

          //error
        }

        back(this.responseText);

      }
    }
  },


  deleteCookie: function (name) {

    document.cookie = name + "=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT";

  },

  playVideo:function(video){

    var tag = document.createElement("video");
    tag.style.width = "100%";
    tag.style.heigth = "100%";
    var src = document.createElement("source");
    src.src = "../assets/video/" + video;
    src.type = "video/mp4";
    tag.appendChild(src);
    var target = document.getElementById(video);
    var div = target.parentNode;
    target.remove();
    tag.appendChild(src);
    div.appendChild(tag);
    tag.autoplay = true;
    tag.controls = true;
  

    
  }

};

// APP
window.onload = function () {

  // LISTENERS

  if (localStorage.getItem('celebrate') == 'true') {

    document.getElementById('container').className = 'celebrate';

    localStorage.removeItem('celebrate');

    setTimeout(function () {

      document.getElementById('container').className = null;

    }, 6000);

  }

  // Listeners

  if (document.getElementsByClassName('donate')) {
    var buttons = document.getElementsByClassName('donate');
    var num = buttons.length;
    for (var i = 0; i < num; i++) {

      buttons[i].addEventListener("click", function () {
        location.assign("https://www.indiegogo.com/project/preview/95da2bb8");
      });

    }

  }

  if (document.getElementsByClassName('request')) {
    var buttons = document.getElementsByClassName('request');
    var num = buttons.length;
    for (var i = 0; i < num; i++) {

      buttons[i].addEventListener("click", function () {
        location.assign("/apply");
      });

    }

  }

  if (document.getElementById("donate-amount")) {
    document.getElementById("donate-amount").addEventListener("change", function () {
       if(this.value == 'other'){

        document.getElementById("other-amount").style.display ="block";

       }
      });
  

  }

  if (document.getElementById("card-open")) {

    document.getElementById("card-open").addEventListener("click", function () {
       
      document.getElementById("card").style.visibility = "visible";
      });
  

  }

  if (document.getElementById("zelle")) {

    document.getElementById("zelle").addEventListener("click", function () {
       
      document.getElementById("zelle-show").style.display = "block";
      });
  }

  if(document.getElementsByClassName("play-btn")){
    let btns = document.getElementsByClassName("play-btn");
    for(var i=0; i < btns.length; i++){
      btns[i].addEventListener("click", function(){
        var video = this.getAttribute("data-video");
        Afrotok.playVideo(video);
        this.remove();

      });
    }

  }
  

};


