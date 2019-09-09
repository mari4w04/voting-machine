$('#frmRegister').submit(function(){
    console.log('signing up...')
    $.ajax({
        method: "POST",
        url: 'register.php',
        //key: whatever is in the form - convert the form to code that php will understand
        data: $('#frmRegister').serialize(),
        //return what? as json
        dataType: "JSON"
    }).
    done(function(jData){
        console.log(jData)
        if(jData.status == 1){
            console.log("you have signed up")
            // swal({
            //     title:"CONGRATS", text:"You have signed up", icon: "success",
            //     });
            return
        }

        if(jData.status == 0){
            console.log("something went wrong")
            // swal({
            //     title:"Oops something went wrong", text:jData.message, icon: "warning",
            //     });
            return
        }
    }).
    fail(function(jData){
        console.log('error')
        // swal({
        //     title:"SYSTEM UPDATE", text:"System is under maintenance" +jData.code, icon: "warning",
        //     });
    })
    return false
});
