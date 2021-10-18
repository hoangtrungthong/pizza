var preview = document.getElementById('preview');
var img = document.getElementById('img')
var price = document.getElementById('price')

img.onchange = e => {
    var files = e.target.files
    var reader = new FileReader();
    reader.readAsDataURL(files[0]);
    reader.onload =() => {
        var url = reader.result
        preview.setAttribute('src',url);
    }
}

var money = Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'VND',
})

price = money.format(price)

// var currency = document.getElementById('price')

// // bind event listeners
// currency.addEventListener('focus', onFocus)
// currency.addEventListener('blur', onBlur)


// function localStringToNumber( s ){
//   return Number(String(s).replace(/[^0-9.-]+/g,""))
// }

// function onFocus(e){
//   var value = e.target.value;console.log(value)
//   e.target.value = value ? localStringToNumber(value) : ''
//   var options = Intl.NumberFormat('en-US', {
//     style: 'currency',
//     currency: 'VND',
//     currencyDisplay : "symbol"
// })
  
//   e.target.value = (value || value === 0) 
//     ? localStringToNumber(value).toLocaleString(undefined, options)
//     : ''
// }

// function onBlur(e){
//   var value = e.target.value
//   console.log(value)
//   var options = Intl.NumberFormat('en-US', {
//     style: 'currency',
//     currency: 'VND',
//     currencyDisplay : "symbol"
// })
  
//   e.target.value = (value || value === 0) 
//     ? localStringToNumber(value).toLocaleString(undefined, options)
//     : ''
// }
