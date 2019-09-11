$('#frmRegister').submit(function(){
    console.log('signing up...')
    $.ajax({
        method: "POST",
        url: '../apis/register.php',
        //key: whatever is in the form - convert the form to code that php will understand
        data: $('#frmRegister').serialize(),
        //return what? as json
        dataType: "JSON"
    }).
    done(function(jData){
        console.log(jData)
        if(jData.status == 1){
            swal("Thank you!", "Your account has been created!", "success");
            console.log("you have signed up")
            return
        }

        if(jData.status == 0){
            console.log("something went wrong")
            return
        }
    }).
    fail(function(jData){
        console.log('error')
       
    })
    return false
});