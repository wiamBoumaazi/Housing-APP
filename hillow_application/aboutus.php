<?php include 'db.php' ?>
<?php session_start();
include 'navbar.php'
?>


<style>
    .background {
        background-color: beige;
    }
</style>

<!DOCTYPE html>
<html >

<body>
<div class = "background">
<!-- Navigation -->



<div class = "container-fluid padding">
	<div class = "row welcome text-center">
		<div class = "col-12">
			<h1 style="color: purple;">Meet The Team</h1>
		</div>
		<hr>
	</div>
</div>

<!--- Cards -->
<div class = "container-fluid padding" style="margin-left: 13%">
	<div class = "row padding">
		<div class = "col-md-3">
			<div class = "card" style="width: 100%; height: 100%">
				<div class = "card-body">
					<h4 class = "card-title sd-text">Wiam Boumaazi</h4>
					<p class = "card-text">As a Team Lead, Wiam is an active team member who is determined to 
						successfully accomplish tasks on time with collaboration with the other team members. To overcome challenges, Wiam adopts a technique 
						of breaking the challenge into subproblems in order to work on each one of them individually with the sub-team members.</p>
				</div>
				</div>
		</div>
		
		<div class = "col-md-3">
			<div class = "card" style="width: 100%; height: 100%">
				<div class = "card-body">
					<h4 class = "card-title sd-text">Karina Abad</h4>
					<p class = "card-text">Karina strives in to put in her best in all that she works for, while maintaining a good environment within teams.
						 With this project, she is excited to embark on an exciting journey 
						that will enable her team members, along with herself, to grow as budding software engineers.</p>
				</div>
		</div>
	</div>
	<div class = "col-md-3">
		<div class = "card" style="width: 100%; height: 100%">
			<div class = "card-body">
				<h4 class = "card-title sd-text">Katie Kennedy</h4>
				<p class = "card-text">Katie has great experience with handling backend while maintaining a fun and friendly work 
					environment between team members. She works with utmost efficiency and always strives to develop clean and precise code.</p>
			</div>
			</div>
	</div>
</div>
<div class = "row padding">
	<div class = "col-md-3">
		<div class = "card" style="width: 100%; height: 100%">
			<div class = "card-body">
				<h4 class = "card-title sd-text">Muhammedrehan Kanuga</h4>
				<p class = "card-text">Myself, Mohammedrehan, a computer science student at SF State who has been learning and working with several 
					different programming languages like javascript, html, css, java, r, c, c++ etc.</p>
			</div>
			</div>
	</div>
	<div class = "col-md-3">
		<div class = "card" style="width: 100%; height: 100%">
			<div class = "card-body">
				<h4 class = "card-title sd-text">Jaren Lynch</h4>
				<p class = "card-text">Jaren is a great team member who knows a good amount on the ins and outs of Github. 
					He is very well organized and maintains a good working environment with himself, and team members. 
					Like other members of the group, Jaren strives to do his best in whatever he puts his heart in.</p>
			</div>
			</div>
	</div>
    <div class = "col-md-3">
        <div class = "card" style="width: 100%; height: 100%">
            <div class = "card-body">
                <h4 class = "card-title sd-text">Utsav Bhatta</h4>
                <p class = "card-text">I am Utsav Bhatta. I am a senior student in SF state. I have been working with several programming
                    languages like Java, C, and Javascript. I am a backend team member in this project. I am really excited to be a part of this big project.</p>
            </div>
        </div>
    </div>
</div>



</div>
</div>
    <div>
        <?php include "footer.php" ?>
    </div>
</body>
</html>