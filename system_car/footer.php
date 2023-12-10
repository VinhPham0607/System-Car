
<div style="margin-top: 3.5em;">
	<section class="copyright fixed-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ">
					<div class="text-center text-white">
						Create By
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="./vendor/js/jquery.js"></script>
<script src="./vendor/js/myQuery.js"></script>
<script src="./vendor/js/repair.js"></script>
<script src="./vendor/js/tree_menu.js"></script>
<script src="./vendor/bootstrap/bootstrap.min.js"></script>
<script src="./vendor/datatable/dataTables.min.js"></script>
<script src="./vendor/datatable/dataTables.select.js"></script>
<script src="./vendor/datatable/dataTables.buttons.min.js"></script>
<script src="./vendor/datatable/dataTables.buttonHtml5.min.js"></script>
<script src="./vendor/datatable/buttons.flash.min.js"></script>
<script src="./vendor/datatable/jszip.min.js"></script>
<script src="./vendor/bootstrap/moment.min.js"></script>
<script src="./vendor/bootstrap/bootstrap-datetimepicker.js"></script>	
<script src="./vendor/datatable/dataTables.bootstrap4.min.js"></script>	
<script type="text/javascript">
			function myFunction() {
			  var x = document.getElementById("myTopnav");
			  if (x.className === "topnav") {
			    x.className += " responsive";
			  } else {
			    x.className = "topnav";
			  }
			}
			$(document).ready(function(){
			  $("#topMenu-hide").click(function(){
			    $("#topMenu").hide(500);
			    $(this).hide(100);
			    $("#topMenu-show").show(100);
			  });
			  $("#topMenu-show").click(function(){
			    $("#topMenu").show(500);
			    $(this).hide(100);
			    $("#topMenu-hide").show(100);
			  });
			});

	</script>
</script>
</body>
</html>