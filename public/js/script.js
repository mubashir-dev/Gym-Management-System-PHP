$(function(e)
{
	$(".btn_login").on("click",function(e)
	{
	e.preventDefault();
	var email=$("#inputEmail").val();
	var password=$("#inputPassword").val();
	if(email=="" || password=="")
	{
		alert("Fill All Fields ")
		return false;
	}
	else
	{
	$.ajax({
		url:"auth.php",
		method:"POST",
		data:{email:email,password:password},
		success:function(resp)
		{
			window.location = "Dashboard.php";
		},
		error:function(resp)
		{
			alert(resp);
		}
	});
	}
	//--End of Login Code//


	//Code For Logout //
	});
		$(".btn_add_members").on("click",function(e)
		{
			$(this).validate({
				rules: {
					// The key name on the left side is the name attribute
					// of an input field. Validation rules are defined
					// on the right side
					name: "required",
					contact: "required",
					date:  "required",
					fee: "required",
					Address: "required"
				  },
				  // Specify validation error messages
				  messages: {
					name: "PLEASE YOUR NAME",
					contact: "PLEASE ENTER YOUR CONTACT",
					date:"CHOOSE JOINING DATE",
					fee: "ENTER YOUR FEE",
					Address:"PLEASE ENTER MEMBER ADDRESS"

				  },
			});
		});
});

//Functio To Add Memenber 
function add_member_ajax()
{
	$form=$(".add_member");
			$.ajax({
			url:$form.attr("action"),
			method:$form.attr("method"),
			data:$form.serialize(),
			success: function( response)
			{
				alert(response);
				console.log(response);
				location.reload();
			}
			});
}
//JQurey Call  For Delete Member
function delete_member()
{
	$(function(e){
		$(".delete_object").on("click",function(e)
		{
		e.preventDefault();
		var id=$(this).attr('delete_id');
		$.ajax({
		url:"member_delete.php",
		method:"POST",
		data:{id:id},
		success: function( response)
		{
			alert(response);
			console.log(response);
			location.reload();
		}
		});
		});
		});
}
//Method for Showing All Members Data 
function show_aLL_members()
{
	$(".show_all_members").on('click',function(e)
	{
	e.preventDefault();
	var auth="Allow";
	$.ajax({
	url:"show_all_members.php",
	method:"POST",
	data:{auth:auth},
	success:function(response)
	{
		$(".home_table_body").html(response);
	}
	});
	});
}
//Method For Loading Data into Update Modal
function update_load_data()
{
	$(function(){
	$(".update_object").on("click",function(e)
	{
		var id=$(this).attr("update_id");
		e.preventDefault();
		$.ajax({
			url:"member_update_load.php",
			data:{id:id},
			method:"POST",
			success:function(response)
			{
				$(".update_modal_body").html(response);
			    $("#UpdateMember").modal("show");
			}
		});
	})
	});
}
//Method for Update Member 
function update_member()
{
	
	$form=$(".update_member");
			$.ajax({
			url:$form.attr("action"),
			method:$form.attr("method"),
			data:$form.serialize(),
			success: function( response)
			{
				alert(response);
				console.log(response);
				location.reload();
			}
			});
}
//Function Calls
show_aLL_members();
delete_member();
update_load_data();
