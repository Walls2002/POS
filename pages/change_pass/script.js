$(document).ready(function () {
	$(".cancel").click(function () {
		location.href="../../index.php";
	})
	$(".submit").click(function () 
	{
		const new_pass=$("#new_pass").val();
		const confirm_pass=$("#confirm_pass").val();

		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		const username = urlParams.get('username');
		const id = urlParams.get('id');
		const name = urlParams.get('name');
		

		if ( new_pass=="" || confirm_pass =="") 
		{
			$(".alert1").css("display","block");
			setTimeout(function() 
			{ 
				$(".alert1").css("display","none");
			}, 2500);

			
		}
		else if(new_pass!=confirm_pass)
		{
			$(".alert2").css("display","block");
			setTimeout(function() 
			{ 
				$(".alert2").css("display","none");
			}, 2500);
		}
		else
		{
			if (new_pass.length>=10 && new_pass.length<=20) 
			{
				$.ajax({  
				type: 'POST',  
				url: 'new_pass.php', 
				data: {id:id,username:username,
				       new_pass:new_pass},
				success: function(response) {
					console.log("Response :"+response);
					location.href="../home/cashier.php?name="+name+"&username="+username;
				}
			});
			}
			else
			{
				$(".alert3").css("display","block");
				setTimeout(function() 
				{ 
					$(".alert3").css("display","none");
				}, 2500);
			}
		}

	})
})