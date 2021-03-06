var menu = document.querySelector('#menu-bar');
var navbar = document.querySelector('.navbar');
var btn = document.querySelectorAll('.btn');
// redirect login
var user = document.getElementById('username');
var send = document.getElementById('send');
var cart = document.getElementById('cart');
var cartLink = document.querySelector('.cart');
var div = document.createElement('div');
// button up/down quantity
var plus = document.querySelector('.plus')
var minus = document.querySelector('.minus')
var quantity =  document.querySelector('.input-qty')

// up/down quantity
// var p = 0;
// plus.onclick = () => {
//   quantity.value = p++;
// }
// minus.onclick = () => {
//   if (p === 0) {
//     return;
//   } else {
//     quantity.ariaValueMin = 0;
//     quantity.value = p--;
//   }
// }

// redirect login
btn.forEach(el => {
  if (!user) {
    el.setAttribute("href", "login/");
    send.removeAttribute("href");
  } else {
    send.removeAttribute("href");
    cartLink.setAttribute("href", "cart.php");
  }
});

// menu button
menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

window.onscroll = () => {
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
}

// load index
function loader() {
  document.querySelector('.loader').classList.add('fade-out');
}
window.onload = () => {
  setInterval(loader, 2000)
}

// page active
var btn_active = navbar.getElementsByClassName('btn_active')
for (var i = 0; i < btn_active.length; i++) {
  btn_active[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
// Messenger Plugin chat Code
var chatbox = document.getElementById('fb-customer-chat');
chatbox.setAttribute("page_id", "110858906979203");
chatbox.setAttribute("attribution", "biz_inbox");

window.fbAsyncInit = function () {
  FB.init({
    xfbml: true,
    version: 'v12.0'
  });
};

(function (d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//chat bots-vchat
var _vc_data = {id : 10583534, secret : '189589f0b79ea90fe393831e8a29e162'};
(function() {var ga = document.createElement('script');
ga.type = 'text/javascript';ga.async=true; 
ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js?id=10583534';
var s = document.getElementsByTagName('script');
s[0].parentNode.insertBefore(ga, s[0]);})();
