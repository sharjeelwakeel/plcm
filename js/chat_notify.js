$(document).ready(function(){




  //notify_alert start
setInterval(function(){ 
 // console.log("notify");
  $.ajax({
       url:"php/notify_alert.php",
       method:"post",
      
       success:function(data){
        var str=JSON.parse(data);
          // console.log(str);
         
          if(str['status']==1){
            $(".offcanvas-body").prepend(str['data']);
            $(".notify_alert").append(str['model']);
            $(".notify_alert").removeClass("d-none");
            $(".notify_alert").addClass("d-block");
            $(".dot_notify").removeClass("d-none");
            $(".dot_notify").addClass("d-block");
          //  $(".audio")[0].play();
          var audio = new Audio("media/audio.mp3");
audio.play();


            setTimeout(function() {
              $(".notify_alert").removeClass("d-block");
            $(".notify_alert").addClass("d-none");
            $(".notify_alert").html("");
            }, 10000);




          }//if end
          else{
          //  console.log("i run");
          }//else end

       }//success end

      });//ajax end

    },1000);//set interval end

//notify_alert end



      //for email set interval

      setInterval(function(){ 

$.ajax({
url:"php/chat_alert.php",
method:"post",

success:function(data){

// console.log("chat");
var str=JSON.parse(data);
// console.log(str);

if(str['status']==1){

  $(".notify_alert").append(str['model']);
  $(".notify_alert").removeClass("d-none");
  $(".notify_alert").addClass("d-block");
  $(".dot_chat_notify").removeClass("d-none");
  $(".dot_chat_notify").addClass("d-block");
//  $(".audio")[0].play();
var audio = new Audio("media/audio.mp3");
audio.play();


  setTimeout(function() {
    $(".notify_alert").removeClass("d-block");
  $(".notify_alert").addClass("d-none");
  $(".notify_alert").html("");
  }, 10000);


}//if end
else{
//  console.log("i run");
}//else end

} //success end

});  //ajax end

      },1000);//INTERVAL END

   




      setInterval(function(){ 

$.ajax({
url:"php/mail_alert.php",
method:"post",

success:function(data){

console.log("mail");
var str=JSON.parse(data);
console.log(str);

if(str['status']==1){

  $(".notify_alert").append(str['model']);
  $(".notify_alert").removeClass("d-none");
  $(".notify_alert").addClass("d-block");
  $(".dot_mail_notify").removeClass("d-none");
  $(".dot_mail_notify").addClass("d-block");
//  $(".audio")[0].play();
var audio = new Audio("media/audio.mp3");
audio.play();
  setTimeout(function() {
    $(".notify_alert").removeClass("d-block");
  $(".notify_alert").addClass("d-none");
  $(".notify_alert").html("");
  }, 10000);


}
else{
//  console.log("i run");
}

}

});



}, 3000);//run this thang every 2 seconds






      $(".notify_close").click(function(){
        $(".notify_alert").removeClass("d-block");
            $(".notify_alert").addClass("d-none");
            $(".notify_alert").html("");
      })
          

    });
