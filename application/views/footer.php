		<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
	    <!-- BOOTSTRAP SCRIPTS -->
	    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	    <!-- METISMENU SCRIPTS -->
	    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
	    <!-- MORRIS CHART SCRIPTS -->
	    <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
	    <script src="<?php echo base_url();?>assets/js/morris/morris.js"></script>
	    <!-- DATA TABLE SCRIPTS -->
	    <script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
	    <script src="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.js"></script>
	    <!--<script src="<?php echo base_url();?>assets/js/jquery-1.12.4.js"></script>-->
	    <!--<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>-->
	    <script>
	    /*
			var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
			var baseurl = "http://localhost/SA01/";
		    $("ul li a").each(function(){
		    	if($(this).attr("href") == baseurl+pgurl || $(this).attr("href") == '' )
	            	$(this).addClass("active-menu");
		    });
		*/
		</script>
		<script>
              $(function(){
                $("#datepicker").datepicker();
              });
            </script>
		<script>
		//deprecated ceritanya, karena tidak realtime, hehehe

		/*	function checkPasswordMatch() {
    		var password = $("#txtNewPassword").val();
    		var confirmPassword = $("#txtConfirmPassword").val();
    		if (password != confirmPassword)
    			{
		        	$("#divCheckPasswordMatch").html("Passwords do not match!");
		    		$("#submitButton").prop('disabled', true);		        	
    			}
		    else
		    	{
		    		$("#divCheckPasswordMatch").html("Passwords match.");
		    		$("#submitButton").prop('disabled', false);
		    	}
			}
		*/
		</script>
		<script>
	            $(document).ready(function () {
	                $('#dataTables-example').dataTable();
	            });
	    </script>
	    <script>
	            $(document).ready(function () {
	                $('#dataTables-example2').dataTable();
	            });
	    </script>
	    <script>
	            $(document).ready(function () {
	                $('#dataTables-example3').dataTable();
	            });
	    </script>
	    <script>
	            $(document).ready(function () {
	                $('#dataTables-example4').dataTable();
	            });
	    </script>
	    <!-- CUSTOM SCRIPTS -->
	    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
	    <script src="<?php echo base_url();?>assets/js/alba_custom.js"></script>
	</body>
</html>