<?php 
include("config.php");
if(isset($_SESSION['user'])){
?>
 <!-- <h2>Room For ALL</h2> -->
			<div class='msgs'>
		  		<?php include("msgs.php");?>
			</div>
 		</ul>
 	</div>
<div class="panel-footer">
	<form id="msg_form">
		<div class="input-group">
			<input id="btn-input" type="text" class="form-control input-sm"  name="msg" placeholder="Type your message here..." />
			    <span class="input-group-btn">
			        <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">Send</button>
			    </span>
		</div>
	</form>
</div>
<?php
}
?>