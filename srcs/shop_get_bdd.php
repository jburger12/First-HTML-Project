<?PHP

	$my_tab = file("bdd/model_train_products.csv");
	unset($my_tab[0]);

	foreach ($my_tab as $elem)
	{
		$line = explode(",", $elem);
		$infos_bdd[] = $line;
	}

	$crypt = serialize($infos_bdd);

	file_put_contents("bdd/serialized", $crypt);

?>
