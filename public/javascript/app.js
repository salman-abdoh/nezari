$('.language').click(function(){
    $(this).toggleClass('is-open');
  })
  
  $('.language__el').click(function(){ 
    var css = document.getElementById("css");   
    $('.language__el').removeClass('is-active');
    $(this).toggleClass('is-active');
  
    css.href = "xyz.com";
  });
  var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("btn-close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
$(document).click(function (e) {
  var modalImg = document.getElementById("img01");

  if ($(e.target).is(modal)) {

    modal.style.display = "none";
  }

});

