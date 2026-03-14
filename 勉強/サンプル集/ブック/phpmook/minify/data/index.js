/*!
 * このコメントは消さないでください
 */
var php = {};
(function(){
  /*
   *  消えてほしいコメント
   */
  function min(a,b){  // 行コメント
    console.log("input " + a + "," + b); // --DEBUG--
    if(a < b){
      return a;
    }
    else{
      return b;
    }
  }
  php.min = min;
});
function userfunc(a){
  return a;
}