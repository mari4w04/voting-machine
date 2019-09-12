$('.vote-btn').click(function(){

    // console.log(this.dataset.cand)
    let candidateName = this.dataset.cand;
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
        // swal({
        //     title: "Congrats",
        //     text: "You have logged in",
        //     icon: "success",
        // });
        // location.href = 'vote-dashboard'

        swal({
            title: "Thank you!",
            text: "You have voted for " +candidateName,
            type: "success",
            button: "See results",
        }).then(function() {
            window.location = "vote-dashboard";
        });
        console.log('*************')
        console.log(jData)
        }
    }).fail(function(){
        console.log('fatal error')
    })
        return false;
    });