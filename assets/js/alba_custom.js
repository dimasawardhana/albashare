/*=============================================================
    Authour URI: www.albashar-e.com
    License: 

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

//untuk ngaktivin side bar
var url = window.location.href;
var parts = url.split("/");
var beforeLast = parts[parts.length - 2]; //keep in mind that since array starts with 0, last part is [length - 1]
var beforeLast2 = parts[parts.length - 3];
var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
var baseurl = "http://localhost/SA01/";
$("ul li a").each(function(){
	if($(this).attr("href") == baseurl+pgurl || $(this).attr("href") == baseurl+beforeLast || $(this).attr("href") == baseurl+beforeLast2 )
    	$(this).addClass("active-menu");
});

$('#txtConfirmPassword').keyup(function() {
	var password = $('#txtNewPassword').val();
	var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
	if (password == val){
		$("#divCheckPasswordMatch").html("Passwords match.");
		$("#submitButton").prop('disabled', false);	

	} else {
		$("#divCheckPasswordMatch").html("Passwords not match!");
		$("#submitButton").prop('disabled', true);	
	}
});

//untuk table
$(document).ready(function () {
    $('#dataTables-example').dataTable();
});
$(document).ready(function () {
    $('#dataTables-example2').dataTable();
});

//alert untuk menghapus
function myFunction()
{
	var x;
if (confirm("Anda yakin ingin menghapus anggota?") == true) {
    x = "You pressed OK!";
    // window.location='../delete/'+'354';
} else {
    x = "You pressed Cancel!";
    // document.getElementById("formTicket").reset();
}
document.getElementById("demo").innerHTML = x;
}
