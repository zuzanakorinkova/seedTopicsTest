function one(sSelector, o){
  o = typeof o == "undefined" ? document : o
  return o.querySelector(sSelector)
}
function all(sSelector, o){
  o = typeof o == "undefined" ? document : o
  return o.querySelectorAll(sSelector)
}