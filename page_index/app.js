function one(sSelector, o){
  o = typeof o == "undefined" ? document : o
  return o.querySelector(sSelector)
}
function all(sSelector, o){
  o = typeof o == "undefined" ? document : o
  return o.querySelectorAll(sSelector)
}
let modal_create_post = {

  close : function(){
    event.stopPropagation()
    console.log(event.target.className)
    if( event.target.getAttribute("data-close") ){
      // document.querySelector("#modal_tweet").classList.remove("show")
      one("#modal_create_post").classList.add("fadeOut")
    }
  },

  show : function(){
    one("#modal_create_post").classList.remove("fadeOut")
    one("#modal_create_post").classList.add("fadeIn")
  },

  send : function(){
    
  },

}
