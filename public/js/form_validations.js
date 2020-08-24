$(function()
{
    //Form Validation For Add Member Form 
    $(".btn_add_member").on("click",function(e)
    {
        e.preventDefault();
        var name=$("#name").val();
        var contact=$("#contact").val();
        var gender=$("#gender").val();;
        var doj=$("#date").val();
        var fee=$("#fee").val();
        var address=$("#Address").val();
        if(name=="" || contact=="" || doj=="" || fee=="" || address=="")
        {
            alert('FILL ALL FIELDS')
        }
        else if ($('input[name="gender"]:checked').length == 0)
        {
            alert("SELECT MEMBER GENDER")
        }
        else
        {
            add_member_ajax();
        }
    });    
});
//function for Validating Update Form 
function Member_Update()
{
$(function()
{
    $("#btn_update_member").on("click",function(e)
    {
    e.preventDefault();
    });

});
}
Member_Update();