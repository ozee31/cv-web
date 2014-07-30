<?php

// CV
$req = $PDO->prepare('SELECT * FROM cv WHERE id = :id');
$req->execute([':id' => CV_ID]);
$cv = $req->fetch(PDO::FETCH_OBJ);

// Links
$req = $PDO->prepare('SELECT * FROM cv_links WHERE cv_id = :cv_id');
$req->execute([':cv_id' => CV_ID]);
$links = $req->fetchAll(PDO::FETCH_CLASS);

// Experiences
$req = $PDO->prepare('SELECT * FROM cv_experience WHERE cv_id = :cv_id ORDER BY start DESC');
$req->execute([':cv_id' => CV_ID]);
$experiences = $req->fetchAll(PDO::FETCH_CLASS);

// Educations
$req = $PDO->prepare('SELECT * FROM cv_education WHERE cv_id = :cv_id ORDER BY start DESC');
$req->execute([':cv_id' => CV_ID]);
$educations = $req->fetchAll(PDO::FETCH_CLASS);

// References
$req = $PDO->prepare('SELECT * FROM cv_references WHERE cv_id = :cv_id');
$req->execute([':cv_id' => CV_ID]);
$references = $req->fetchAll(PDO::FETCH_CLASS);

// Skills categories
$req = $PDO->prepare('
	SELECT c.*, COUNT(s.id) AS nbSkills
	FROM cv_categories AS c 
	LEFT JOIN cv_skills s ON ( s.category_id = c.id )
	WHERE cv_id = :cv_id
	GROUP BY c.id
	');
$req->execute([':cv_id' => CV_ID]);
$skillsCategories = $req->fetchAll(PDO::FETCH_CLASS);

/**
 * Get skills for a category
 * @param  object $PDO
 * @param  int $category_id
 * @return array
 */
function get_skills($PDO, $category_id) {

	$req = $PDO->prepare('SELECT * FROM cv_skills WHERE ( cv_id = :cv_id ) AND ( category_id = :category_id ) ');
	$req->execute([
			':cv_id'       => CV_ID,
			':category_id' => $category_id,
		]);

	return $req->fetchAll(PDO::FETCH_CLASS);
}
?>