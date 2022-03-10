<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>O'ssurance</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans@1&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
	</head>
	<body>
	<main class="container">
		<div class="grid">
			<?php

			// 1. Créer un formulaire HTML demandant les informations nécessaires au calcul
			// 2. Après soumission du formulaire, créer les variables qui vont contenir les informations du client
			// 3. Écrire le script qui permet de déterminer à quel palier peut prétendre un client, selon ses informations (et donc à quelle couleur de tarif)
			// 4. Afficher le résultat, par ex. "Votre client a droit au tarif Vert"
			// Bonus 1. Afficher le résultat de trois manières différentes : via `if` & `elseif` ou bien `switch` ou bien `array()`
			// Bonus 2. fioritures graphiques

			?>
			<article>
			<h1>O'ssurance</h1>

			<form action="" method="get">
				<div>
					<label for="age">Votre âge :</label>
					<input type="number" name="age">
				</div>

				<div>
					<label for="ancientLicense">Ancienneté de votre permis (en nb d'années) :</label>
					<input type="number" name="ancientLicense">
				</div>

				<div>
					<label for="accident">Nombre d'accidents responsables :</label>
					<input type="number" name="accident">
				</div>

				<div>
					<label for="ancientInsurance">Ancienneté chez votre assureur (en nb d'années) :</label>
					<input type="number" name="ancientInsurance">
				</div>
				<div>
					<button>Envoyer</button>
				</div>

			</form>
			</article>
			<article>
			<h2>Calcul du tarif de votre client</h2>
			<?php

			$couleurPalier = [
				"Refus d'assurer",
				"Rouge",
				"Orange",
				"Vert",
				"Bleu"
			];

				$palier = 1;
				$age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_NUMBER_INT);
				$ancientLicense = filter_input(INPUT_GET, "ancientLicense", FILTER_SANITIZE_NUMBER_INT);
				$accident = filter_input(INPUT_GET, "accident", FILTER_SANITIZE_NUMBER_INT);
				$ancientInsurance = filter_input(INPUT_GET, "ancientInsurance", FILTER_SANITIZE_NUMBER_INT);

				if ($accident > 0) {
					$palier = ($palier-$accident);
				}

				if ($ancientLicense >= 2) {
					$palier++;
				}

				if ($age >= 25) {
					$palier++;
				}

				if ($ancientInsurance >= 5 AND $palier > 0) {
					$palier++;
				}

				if ($palier < 0) {
					$palier = 0;
					echo "Votre client ne peut pas être assuré.".PHP_EOL;
				}

				echo 'Palier n°'.$palier.'.'.PHP_EOL.'Votre client à droit au tarif <strong>'. $couleurPalier[$palier].'</strong>.';
			?>
			</article>
		</div>
	</main>
	</body>
</html>
