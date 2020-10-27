<!DOCTYPE html>
<html>
<head>
    <title>My profile</title>
    <script type="text/javascript" src="verify.js"></script> 
    <!-- Link to css file -->
    <link rel= "stylesheet" type="text/css" href="index.css">
</head>
<body>
<!-- Modal HTML -->
<div id="healthModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<img src="img/alertIcon.png" width="200px" height="200px">		
				<h4 class="modal-title">Are you healthy?</h4>	
			</div>
			<div class="modal-body">
				<p>You must be healthy enough to share ride with other people.</br> Please do not share ride while you are having an infectious disease.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-no" onclick="nHealthy()">No, go back</button>
				<button type="button" class="btn btn-yes" onclick="yHealthy()">Yes, continue</button>
			</div>
		</div>
	</div>
</div>     
</body>
</html>