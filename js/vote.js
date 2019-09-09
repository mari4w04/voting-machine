$('.vote-btn').click(function(){

    // console.log(this.dataset.cand)

    $.ajax({
        method : "GET",
        url : 'apis/api-vote.php',
        data : {
            "candidate":this.dataset.cand,
            },
        cache: false,
        dataType:"JSON"
    }).
    done(function(jData){
    if(jData.status == 1){
        console.log('*************')
        console.log(jData)
        }
    }).fail(function(){
        console.log('fatal error')
    })
        return false;
    });