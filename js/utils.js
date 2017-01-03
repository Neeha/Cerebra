
// handle login
$("#login_form").submit(function(e) { 
    $('.progress_loader').show();
    $('.login_submit').hide();
    var flag = returnCheckForLogin();
    if(flag)
    {
        $.ajax
        ({ 
            url: 'login.php',
            data: $("#login_form").serialize(),
            type: 'post',
            dataType: "json",
            success: function(result)
            {
                if(result == 1)
                {
                    alert("success");
                    window.location="practice.php";
                }
                else if(result == 2)
                {
                    alert("success");
                    window.location="game.php";
                }
                else
                    alert("failure");
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert('error');          
            }
        });
        $('.progress_loader').hide();
        $('.login_submit').show();
    }
    else
    {
        BootstrapDialog.show({
            title: 'Hey!',
            message: 'Please enter valid credentials 😒',
            type: BootstrapDialog.TYPE_WARNING,
            closable: true,
            draggable: true
        });
        $('.progress_loader').hide();
        $('.login_submit').show();
    }
    e.preventDefault();
});

// practice round - validation answers

function submitAnswer(e) { 
    answer = document.getElementById('answer_'+e.id).value;
    $.ajax
    ({ 
        url: 'submit.php',
        data: 'key=' + e.id + '&answer=' + answer,
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            if(result['code']==1)
            {
                Materialize.toast('Right Answer!', 4000);
                //$('answer_'+e.id).setAttribute('disabled', 'true');
                //$('a').disabled =true;
                //$('a').removeAttr('href');
                document.getElementById('answer_'+e.id).disabled = true;
                document.getElementById(e.id).className = "btn disabled";
                //$('a').addClass("disable_a_href"); 
                //return false;
            }
            else if(result['code']==0)
                Materialize.toast('Dai thappudaa!', 4000);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error');          
        }
    });
    $('.progress_loader').hide();
    $('.login_submit').show();
}

// pre run fetching questions