function checkanswer(qno,key)
{
	var ans=key.value;
	var qno=qno.value;
	if(ans=="1" && qno==1)
	{
		$('.submit1').addClass("right");
    	Materialize.toast('Right answer!', 4000)
    }
    else
    {
    	$('.submit').addClass("wrong");
    	Materialize.toast('Wrong answer:( Try again', 4000)
    	$('.submit').removeClass("wrong", 2000);	
    }
}