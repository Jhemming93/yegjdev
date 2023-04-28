




 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var options = "";
    var instances = M.Sidenav.init(elems, options);
    
  });


window.addEventListener("resize", function(){
    const width = window.innerWidth
    const card = document.querySelector('.my-horizontal')
    
    if(width < 600){
     card.classList.remove("horizontal")
    }else{
     card.classList.add("horizontal")
    }
})


  