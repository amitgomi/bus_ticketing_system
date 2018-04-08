<div id="id01" class="wrapper">
    <form class="form-signin" action="verify.php" method="POST">       
    	<h2 class="form-signin-heading">Please login</h2>
    	<input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
    	<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
    	<label class="checkbox">
    	<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
    	</label>
    	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
 	</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>