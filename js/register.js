$('#frmRegister').submit(function(){
    console.log('signing up...')
    $.ajax({
        method: "POST",
        url: 'voting-machine/../apis/register.php',
        //key: whatever is in the form - convert the form to code that php will understand
        data: $('#frmRegister').serialize(),
        //return what? as json
        dataType: "JSON"
    }).
    done(function(jData){
        console.log(jData)
        if(jData.status == 1){

            swal({
                title: "Thank you!",
                text: "Your account has been created!",
                type: "success",
                button: "Login to vote",
            }).then(function() {
                window.location = "login";
            });
            
            console.log("you have signed up")
            
        }

        if(jData.status == 0){
            console.log("something went wrong")
            swal({
                title: "Oops!",
                text: jData.message,
                type: "warning",
                button: "Back to signup",
            }).then(function() {
                window.location = "signup";
            });
            return
        }
    }).
    fail(function(jData){
        console.log('error')
       
    })
    return false
});