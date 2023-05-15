function readMore(){
  let btn = document.getElementById("about-desc");
  let myParagraph = document.getElementById("myparagraph")
  btn.addEventListener('click' , function(){
      
    myParagraph.classList.toggle('d-none')
  })
}


function updateImage(){
  let profile=document.getElementById("departImg");
  let input=document.getElementById("exampleInputPassword1");
  input.onchange = function () {
      profile.src = URL.createObjectURL(input.files[0]);
  }
}

