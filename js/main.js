var myImage = document.querySelector('img');

myImage.onclick = function() {
    var mySrc = myImage.getAttribute('src');
    if(mySrc === 'Pics/profile.jpg') {
      myImage.setAttribute ('src','Pics/shiba.jpg');
    } else {
      myImage.setAttribute ('src','Pics/profile.jpg');
    }
}
