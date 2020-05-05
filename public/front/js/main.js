function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }


$(document).ready(function(){
    // Get value on button click and show alert
    $("#myBtn").click(function(){
        var email = $("#email").val();
        var pass = $("#password").val();
        if (email == '' || pass == ''){
            // alert("برجاء إدخال بريد صحيح");
            swal({
              title: "برجاء إدخال بريد صحيح",
              icon: "warning",
              button: " !أوافق"
            });
        }else{
          swal({
            title: "تم التسجيل بنجاح",
            icon: "success",
            button: " !أوافق"
          });
        }
        
    });
    $("#myBtn1").click(function(){
        var name = $("#name").val();
        var email = $("#emai1").val();
        var phone = $("#phone").val();
        var pass = $("#password").val();
        alert('gggg');

        if (email == '' || pass == '' || name =='' || phone == ''){
            swal({
              title: "لا بد من ادخال البيانات",
              icon: "warning",
              button: " !أوافق"
            });
        }
        else{

          swal({
            title: "تم التسجيل بنجاح",
            icon: "success",
            button: " !أوافق"
          });
        }
        
    });
    $(".myBtn2").click(function(){
        
          swal({
            title: "يجب التسجيل  ",
            icon: "warning",
            button: " !أوافق"
          });
        });



    $("#myBtn3").click(function(){
        var name = $("#name").val();
        var email = $("#emai1").val();
        var phone = $("#phone").val();
        if (email == '' || pass == '' || name =='' || phone == ''){
            swal({
                title: "برجاء ادخال الحقول المطلوبه",
                icon: "warning",
                button: " !أوافق"
            });
        }else{
            swal({
                title: "تم التسجيل بنجاح ",
                icon: "success",
                button: " !أوافق"
            });
        }

    });

    
});
