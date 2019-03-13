<?php

require 'Main.php';

include 'Models/Ropa.php';

class Home extends Main {
	
	public function __construct() {
		parent::__construct();
	}

	public function load() {
		# ORM Instance
		$ropa = new Ropa();

		# Test FindAll
		echo "<br />";
		echo "<table>";
		foreach ($ropa->findAll() as $array) {
			echo "<tr>";
			foreach ($array as $key => $value) {
				echo "<td>".$value."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		# Test Remove
		if( $ropa->remove(['id' => '1']) ) {
			echo "<br />Se elimino el registro 1<br />";
		} else {
			echo "<br />Error al eliminar<br />";
		}

		# Test Find
		echo "<br />";
		echo "<table>";
		foreach ($ropa->find([],[]) as $array) {
			echo "<tr>";
			foreach ($array as $key => $value) {
				echo "<td>".$value."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		# Test Add
		if( $ropa->add(['1','Jeans']) ) {
			echo "<br />Se agrego un registro<br />";
		} else {
			echo "<br />Error al agregar<br />";
		}

		# Test Find
		echo "<br />";
		echo "<table>";
		foreach ($ropa->find([],['id' => 1]) as $array) {
			echo "<tr>";
			foreach ($array as $key => $value) {
				echo "<td>".$value."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		# Test Add
		if( $ropa->edit(['descripcion' => 'Pantalones'],['id' => '1']) ) {
			echo "<br />Se modifico el registro 1<br />";
		} else {
			echo "<br />Error al modificar<br />";
		}

		# Test Find
		echo "<br />";
		echo "<table>";
		foreach ($ropa->find(['descripcion'],['id' => 1]) as $array) {
			echo "<tr>";
			foreach ($array as $key => $value) {
				echo "<td>".$value."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		$this->loadView('main');
	}

}

?>