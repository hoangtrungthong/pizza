var preview = document.getElementById('preview');
var img = document.getElementById('img')

img.onchange = e => {
    var files = e.target.files
    var reader = new FileReader();
    reader.readAsDataURL(files[0]);
    reader.onload =() => {
        var url = reader.result
        preview.setAttribute('src',url)
    }
}
