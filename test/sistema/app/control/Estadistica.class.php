<?php


class Estadistica extends TPage
{
	function __construct()
	{
		parent::__construct();

	}
	public function hola()
	{
		$array = array();
		$array['total_votos'] = 1231;
		$array['total_region'] = 1231;
		$array['total_distrito'] = 1231;

		return $array;
	}
	public function resumen_provincia()
	{

		try
		{

			$id_provincia = $_GET['id'];
			TTransaction::open('database'); // abre uma transação
			$conn         = TTransaction::get(); // obtém a conexão

			$sth          = $conn->prepare('SELECT
				locales.id_provincia,
				Count(locales.idlocal) AS total_locales
				FROM
				locales
				WHERE
				locales.id_provincia = ?
				GROUP BY
				locales.id_provincia
				');

			$sth->execute(array($id_provincia));
			$result = $sth->fetchAll();

			// exibe os resultados
			$array  = array();
			foreach($result as $row){
				$array['total_locales'] = $row['total_locales'];

			}
			///////////////////////////////////////////////////////////////////

			$sth = $conn->prepare('SELECT
				Count(locales.idlocal) AS total_asignados,
				locales.id_provincia
				FROM
				locales
				WHERE
				locales.id_coord_local <> 0 AND
				locales.id_provincia = ?
				GROUP BY
				locales.id_provincia
				');

			$sth->execute(array($id_provincia));
			$result = $sth->fetchAll();

			// exibe os resultados
			$array['total_asignados'] = 0;
			foreach($result as $row){
				$array['total_asignados'] = $row['total_asignados'];

			}


			$total_no_asignados = $array['total_locales'] - $array['total_asignados'];
			$array['total_no_asignados'] = $total_no_asignados;
			$porcentaje_no_asignado = round(($total_no_asignados / $array['total_locales']) * 100,2);
			$array['porcentaje_no_asignado'] = $porcentaje_no_asignado.'%';

			//////////////////////////////////////////////////////////////////////////////////

			$sth = $conn->prepare('SELECT
				Count(locales.idlocal) AS total_no_asignados,
				locales.id_provincia
				FROM
				locales
				WHERE
				locales.id_coord_local <> 0 AND
				locales.id_provincia = ?
				GROUP BY
				locales.id_provincia
				');

			$sth->execute(array($id_provincia));
			$result = $sth->fetchAll();

			// exibe os resultados
			foreach($result as $row){
				$array['total_no_asignados'] = $row['total_no_asignados'];

			}
			$total_no_asignados = $array['total_locales'] - $array['total_no_asignados'];
			$array['total_asignados'] = $total_no_asignados;

			$porcentaje_no_asignado = round(($total_no_asignados / $array['total_locales']) * 100,2);
			$array['porcentaje_no_asignado'] = $porcentaje_no_asignado.'%';

			$array['porcentaje_asignado'] = 100 - $porcentaje_no_asignado;
			$array['porcentaje_asignado'] = $array['porcentaje_asignado'].'%';



			///////////////////////////////////////////////////////////////

			$sth = $conn->prepare('SELECT
				locales.id_provincia,
				Count(mesas.idmesa) as personeros
				FROM
				locales
				LEFT JOIN listas ON listas.idlista = locales.id_provincia
				LEFT JOIN mesas ON mesas.id_local = locales.idlocal
				WHERE
				listas.grupo_lista = "PROVINCIA" AND
				locales.id_provincia = ?
				GROUP BY
				locales.id_provincia
				');

			$sth->execute(array($id_provincia));
			$result = $sth->fetchAll();

			// exibe os resultados
			$array['total_personeros'] = 0;
			foreach($result as $row){
				$array['total_personeros'] = $row['personeros'];

			}




			///////////////////////////////////////////////////////////////




			$sth = $conn->prepare('
				SELECT
				locales.id_provincia,
				Count(mesas.idmesa) as total_personeros_provincia
				FROM
				mesas
				RIGHT JOIN locales ON locales.idlocal = mesas.id_local
				WHERE
				locales.id_provincia = ?
				GROUP BY
				locales.id_provincia

				');

			$sth->execute(array($id_provincia));
			$result = $sth->fetchAll();

			// exibe os resultados
			$array['total_personeros_provincia'] = 0;
			foreach($result as $row){
				$array['total_personeros_provincia'] = $row['total_personeros_provincia'];

			}

			//////////////////////////////////////////////////////



			$array['total_personeros_faltante'] = rand(1,100);

			/////////////////////////////////////////////////////


			TTransaction::close(); // fecha a transação.
			return $array;

		}
		catch(Exception $e){
			new TMessage('error', $e->getMessage());
		}

	}



	public function resumen_votos_region()
	{
		try
		{
			TTransaction::open('database'); // abre uma transação
			$conn   = TTransaction::get(); // obtém a conexão

			$sth    = $conn->prepare('select `locales`.`idlocal` AS `idlocal`,`locales`.`id_departamento` AS `id_departamento`,`locales`.`id_provincia` AS `id_provincia`,`locales`.`id_distrito` AS `id_distrito`,`provincia`.`des_lista` AS `provincia`,`distrito`.`des_lista` AS `distrito`,sum(`mesas_validas`.`total_region`) AS `mv_total_region`,sum(`mesas_validas`.`total_consejero`) AS `mv_total_consejero`,sum(`mesas_validas`.`total_provincia`) AS `mv_total_provincia`,sum(`mesas_validas`.`total_distrito`) AS `mv_total_distrito`,sum(`mesas_validas`.`total_personeros`) AS `mv_total_personeros`,sum(`mesas_validas`.`total_sin_personeros`) AS `mv_total_sin_personeros`,sum(`mesas_validas`.`mesa_valida`) AS `mv_total_mesas`,sum(`mesas_impugnadas`.`total_region`) AS `mi_total_region`,sum(`mesas_impugnadas`.`total_consejero`) AS `mi_total_consejero`,sum(`mesas_impugnadas`.`total_provincia`) AS `mi_total_provincia`,sum(`mesas_impugnadas`.`total_distrito`) AS `mi_total_distrito`,sum(`mesas_impugnadas`.`total_personeros`) AS `mi_total_personeros`,sum(`mesas_impugnadas`.`total_sin_personeros`) AS `mi_total_sin_personeros`,sum(`mesas_impugnadas`.`mesa_impugnada`) AS `mi_total_mesas` from ((((`locales` join `view_resumen_mesas_validas` `mesas_validas` on((`mesas_validas`.`id_local` = `locales`.`idlocal`))) join `view_resumen_mesas_impugnadas` `mesas_impugnadas` on((`mesas_impugnadas`.`id_local` = `locales`.`idlocal`))) join `listas` `provincia` on((`provincia`.`idlista` = `locales`.`id_provincia`))) join `listas` `distrito` on((`distrito`.`idlista` = `locales`.`id_distrito`)))
				GROUP BY
				locales.id_provincia
				');
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_OBJ);

			$array  = array();

			$provincias = array();
			$provincias_votos = array();
			
			$total_votos_region = 0;

			foreach($result as $row){
				$provincias_votos[] = $row->mv_total_region;
				$provincias[] = $row->provincia;
				$total_votos_region = $total_votos_region+$row->mv_total_region;
			}

			$array['provincias'] = $provincias;
			$array['provincias_votos'] = $provincias_votos;
			$array['total_votos_region'] = $total_votos_region;
			


			$sth       = $conn->prepare('SELECT
				locales.id_provincia AS id_provincia,
				locales.id_distrito AS id_distrito,
				provincia.des_lista AS provincia,
				distrito.des_lista AS distrito,
				Sum(mesas_validas.total_region) AS mv_total_region
				FROM
				(((locales
				JOIN view_resumen_mesas_validas AS mesas_validas ON ((mesas_validas.id_local = locales.idlocal)))
				JOIN view_resumen_mesas_impugnadas AS mesas_impugnadas ON ((mesas_impugnadas.id_local = locales.idlocal)))
				JOIN listas AS provincia ON ((provincia.idlista = locales.id_provincia)))
				INNER JOIN listas AS distrito ON distrito.idlista = locales.id_distrito
				GROUP BY
				locales.id_distrito

				');
			$sth->execute();
			$result    = $sth->fetchAll(PDO::FETCH_OBJ);



			$distritos = array();
			$distritos_votos = array();

			foreach($result as $row){
				$distritos[$row->id_provincia][] = $row->distrito;
				$distritos_votos[$row->id_provincia][] = $row->mv_total_region;
			}

			$array['distritos'] = $distritos;
			$array['distritos_votos'] = $distritos_votos;


			TTransaction::close(); // fecha a transação.
			return $array;
		}
		catch(Exception $e){
			new TMessage('error', $e->getMessage());
		}

	}





}
