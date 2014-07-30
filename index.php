<?php 
require_once('parameters.php');
require_once('bootstrap.php');
require_once('model.php');
require_once('helper.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Développeur Web basé à Toulouse spécialisé dans le back-end en PHP avec de bonnes connaissances en front-end." />

	<title>Flavien Beninca</title>

	<link href="assets/style.css" rel="stylesheet" />

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53339494-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

<body>

	<?php /** =NAVBAR */ ?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php /* <a class="navbar-brand" href="">Flavien Beninca</a> */ ?>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#about">A Propos</a></li>
					<li><a href="#skills">Compétences</a></li>
					<li><a href="#experience">Expérience</a></li>
					<li><a href="#education">Formation</a></li>
					<li><a href="#references">Références</a></li>
				</ul>
			</div>
	</nav>



	<div class="container-fluid">

		<?php /** =INTRO */ ?>
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-sm-push-10 text-right _text-center-xs">
				<img class="media-object img-circle _inline" data-src="holder.js/64x64" alt="64x64" src="http:&#x2F;&#x2F;www.gravatar.com&#x2F;avatar&#x2F;1a870c990fc1f25546ed1d84d9cecfae?s=100&amp;r=pg&amp;d=mm" style="width: 100px; height: 100px; margin-top: 20px;">
			</div>

			<div class="col-xs-12 col-sm-10 col-sm-pull-2 _text-center-xs">
				<h1><?= $cv->firstName.' '.$cv->lastName; ?></h1>
				<p class="h2"><?= $cv->position; ?></p>
				<p class="h2"><?= $cv->city; ?></p>
			</div>
		</div>

		<hr>

		<?php /** =ABOUT */ ?>
		<div id="about" class="row">
			<div class="col-xs-12 col-sm-4">
				<h2 class="a_h_section">A Propos</h2>
			</div>
			<div class="col-xs-12 col-sm-8">
				<?= $cv->resume; ?>

				<dl class="dl-horizontal _text-center-xs">
					<dt>Email</dt>
					<dd><a href="mailto:<?= $cv->email; ?>"><?= $cv->email; ?></a></dd>

					<?php foreach ( $links as $link ) { ?>
						
						<dt><?= $link->title; ?></dt>
						<dd><a href="<?= $link->url; ?>"><?= $link->text; ?></a></dd>

					<?php } ?>
				</dl>
			</div>
		</div>

		<hr>

		<?php /** =SKILLS */ ?>
		<div id="skills" class="row">
			<div class="col-xs-12 col-sm-4">
				<h2 class="a_h_section">Compétences</h2>
			</div>
			<div class="col-xs-12 col-sm-8">
				<div class="row">
					<?php foreach ( $skillsCategories as $category ) {
						
						$skills = get_skills($PDO, $category->id); ?>

						<div class="col-xs-12 col-sm-6">
							<h3><?= $category->title; ?></h3>
							<ul>
								<?php foreach ( $skills as $skill ) { ?>
									<li><?= $skill->text; ?></li>
								<?php } ?>
							</ul>
						</div>

					<?php } ?>
				</div>
			</div>
		</div>

		<hr>

		<?php /** =EXPERIENCE */ ?>
		<div id="experience" class="row">
			<div class="col-xs-12 col-sm-4">
				<h2 class="a_h_section">Expérience</h2>
			</div>
			<div class="col-xs-12 col-sm-8">

				<?php foreach ( $experiences as $xp ) { ?>
					
					<div class="row">
						<div class="col-xs-12 _text-center-xs">
							<h3 class="experience_title"><?= $xp->company; ?></h3>
							<p class="experience_detail"><?= $xp->position; ?></p>
							<p class="experience_date"><?= formate_date_interval($xp->start, $xp->end); ?></p>
							<p class="experience_website"><a href="<?= $xp->website; ?>">Site web</a></p>

							<p class="experience_sumary text-justify"><?= $xp->sumary; ?></p>

							<?php if ( $xp->keywords ) { ?>
								<ul class="text-left">
									<?php $explode = explode(';', $xp->keywords);

									foreach ( $explode as $keyword ) { ?>
										
										<li><?= $keyword; ?></li>

									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>

				<?php } ?>

			</div>
		</div>

		<hr>

		<?php /** =FORMATION */ ?>
		<div id="education" class="row">
			<div class="col-xs-12 col-sm-4">
				<h2 class="a_h_section">Formation</h2>
			</div>
			<div class="col-xs-12 col-sm-8">

				<?php foreach ( $educations as $education ) { ?>
					
					<div class="row">
						<div class="col-xs-12 _text-center-xs">
							<h3 class="experience_title"><?= $education->degree; ?></h3>
							<p class="experience_detail"><?= $education->school; ?></p>
							<p class="experience_date"><?= formate_date_interval($education->start, $education->end); ?></p>

							<p class="experience_sumary text-justify"><?= $education->sumary; ?></p>

							<?php if ( $education->keywords ) { ?>
								<ul class="text-left">
									<?php $explode = explode(';', $education->keywords);

									foreach ( $explode as $keyword ) { ?>
										
										<li><?= $keyword; ?></li>

									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>
					
				<?php } ?>

			</div>
		</div>

		<hr>

		<?php /** =REFERENCES */ ?>
		<div id="references" class="row">
			<div class="col-xs-12 col-sm-4">
				<h2 class="a_h_section">Références</h2>
			</div>
			<div class="col-xs-12 col-sm-8">			
				<ul class="list-unstyled">
					<?php foreach ( $references as $ref ) { ?>
						
						<li>
							<p>
								<blockquote class="text-justify">
									&laquo; <?= $ref->text; ?> &raquo;
									 - <a href="<?= $ref->url; ?>"><?= $ref->name; ?></a>
								 </blockquote>
							</p>
						</li>

					<?php } ?>
				</ul>
			</div>
		</div>

	</div>

	<script src="assets/script.js"></script>
</body>
</html>