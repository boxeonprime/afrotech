
/* GLOBAL */

var Haven = Haven || {};

/**
 * Utility functions
 */

Haven = {

  sendAjax: function (data, back) {

    var xhttp = new XMLHttpRequest();

    xhttp.open(data.method, data.action, true);

    xhttp.setRequestHeader('Content-type', data.contentType);

    xhttp.setRequestHeader(data.customHeader, data.payload, false);

    xhttp.send();

    xhttp.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {

        try {

          //Haven.removeLoader();

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

  // Place order
  if (document.getElementsByClassName("place-order")) {
    let form = document.getElementsByClassName("place-order");
    for (let i = 0; i < form.length; i++) {
      form[i].addEventListener("submit", function (event) {
        event.preventDefault();
        Haven.disableButton(this.querySelector('[type=submit]'));
        let cart = Haven.getCookie("cart");
        Subscriptions.order(cart);

      });
    }
  }


  // NEEDED

  if (document.getElementsByClassName('donate')) {
    var buttons = document.getElementsByClassName('donate');
    var num = buttons.length;
    for (var i = 0; i < num; i++) {

      buttons[i].addEventListener("click", function () {
        location.assign("/donate");
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
  

};


