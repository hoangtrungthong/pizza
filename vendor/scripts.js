var menu = document.querySelector('#menu-bar');
var navbar = document.querySelector('.navbar');
var btn = document.querySelectorAll('.btn');
// redirect login
var user = document.getElementById('username');
var send = document.getElementById('send');
var cart = document.getElementById('cart');
var cartLink = document.querySelector('.cart');
var div = document.createElement('div');
// cart shopping
var cartArea = div.setAttribute('id', 'cart-area');
var p = document.createElement('p');
var img = document.createElement('img');

// redirect login
btn.forEach(el => {
  if (!user) {
    el.setAttribute("href", "login/");
    send.removeAttribute("href");
  } else {
    send.removeAttribute("href");
    cartLink.setAttribute("href", "cart.php");
    // cartLink.onclick = () => {
    //   div.classList.toggle('show');
    // }
    // window.onscroll = (e) => {
    //   if (!e.target.matches('.cart')) {
    //     var cartAreas = document.querySelector("#cart-area");
    //     if (cartAreas.classList.contains('show')) {
    //       cartAreas.classList.remove('show');
    //     }
    //   }
    // }
  }
});

// cart shopping
if (user) {
  p.setAttribute('style', 'padding: 1rem; text-align: center');
  p.innerText = "Giỏ hàng trống";
  img.src = "images/anxiety.png";
  img.setAttribute('style', 'margin: 0 auto;');
  p.appendChild(img);
  div.appendChild(p);
  cart.appendChild(div);
}

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
  setInterval(loader, 3000)
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

// chat bots
// var __vnp = {
//   code: 8479,
//   key: '',
//   secret: '0b6923d07f25c9d8f2387008532bc8d2'
// };
// (function () {
//   var ga = document.createElement('script');
//   ga.type = 'text/javascript';
//   ga.async = true;
//   ga.defer = true;
//   ga.src = '//core.vchat.vn/code/tracking.js';
//   var s = document.getElementsByTagName('script');
//   s[0].parentNode.insertBefore(ga, s[0]);
// })();
