
$('#frmRegister').submit(function(){
    console.log('signing up...')
    $.ajax({
        method: "POST",
        url: '../voting-machine/register.php',
        //key: whatever is in the form - convert the form to code that php will understand
        data: $('#frmRegister').serialize(),
        //return what? as json
        dataType: "JSON"
    }).
    done(function(jData){
        console.log(jData)
        if(jData.status == 1){
            console.log("you have signed up")
        }

        if(jData.status == 0){
            console.log("something went wrong")
        }
    }).
    fail(function(jData){
        console.log('error')
       
    })
    return false
});
