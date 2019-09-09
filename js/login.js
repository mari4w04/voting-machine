$('#frmLogin').submit( function(){

    $.ajax({
        method:"POST",
        url:"apis/api-login",
        data: $('#frmLogin').serialize(),
        dataType:"JSON"
    }).done(function(jData){
        console.log(jData)
        if(jData.status == 1){
            swal({
                title: "Congrats",
                text: "You have logged in",
                icon: "success",
            });
            location.href = 'vote'
        }else{
            swal({
                title: "System update",
                text: "System is under maintenance code: "+jData.code,
                icon: "warning",
            });
        }
        
    }).fail(function(){
        console.log('API does not work')
    });

    return false
})