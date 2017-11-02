
	function contactme()
	{
		var name= $("#name").val();
		var email = $("#email").val();
		var subject = $("#subject").val();
		var msg=$("#msg").val();
		var compid= $("#compid").val();
		
		
		$.ajax({
			type:'GET',
			url:'ajax/contactme.php',
			data:{
				name:name,
				email:email,
				sub:subject,
				msg:msg,
				compid:compid
			},
			success: function (data)
			{
				$("#show_contact").show();
				$("#show_contact").html(data);
				$("#name").val('');
				$("#email").val('');
				$("#subject").val('');
				$("#msg").val('');
			}
		});
		
	}
