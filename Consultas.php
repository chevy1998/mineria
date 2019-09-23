<?php

/*require_once('conexion.php');

$conexion = conectarBD();

$CantidadInfracciones = consultas("Select count(*) from infracciones");
$CantidadInfracciones = pg_fetch_row($CantidadInfracciones);
$CantidadInfracciones = $CantidadInfracciones[0];
echo "Cantidad Infracciones: ".$CantidadInfracciones;

$CantidadInfraccionesCitation = consultas("select count(*) from infracciones where violationtype = 'Citation'");
$CantidadInfraccionesCitation = pg_fetch_row($CantidadInfraccionesCitation);
$CantidadInfraccionesCitation = $CantidadInfraccionesCitation[0];
echo "Cantidad Citation ".$CantidadInfraccionesCitation;

$CantidadInfraccionesWarning = consultas("select count(*) from infracciones where violationtype = 'Warning'");
$CantidadInfraccionesWarning = pg_fetch_row($CantidadInfraccionesWarning);
$CantidadInfraccionesWarning = $CantidadInfraccionesWarning[0];
echo "Cantidad Warning ".$CantidadInfraccionesWarning;

$CantidadInfraccionesSERO = consultas("select count(*) from infracciones where violationtype = 'SERO'");
$CantidadInfraccionesSERO = pg_fetch_row($CantidadInfraccionesSERO);
$CantidadInfraccionesSERO = $CantidadInfraccionesSERO[0];
echo "Cantidad SERO ".$CantidadInfraccionesSERO;

$CantidadInfraccionesESERO = consultas("select count(*) from infracciones where violationtype = 'ESERO'");
$CantidadInfraccionesESERO = pg_fetch_row($CantidadInfraccionesESERO);
$CantidadInfraccionesESERO = $CantidadInfraccionesESERO[0];
echo "Cantidad ESERO ".$CantidadInfraccionesESERO;

$CantidadInfraccionesGeneroWarning = consultas("select count(*) from infracciones where violationtype = 'Warning' and gender = 'F'");
$CantidadInfraccionesGeneroWarning = pg_fetch_row($CantidadInfraccionesGeneroWarning);
$CantidadInfraccionesGeneroWarning = $CantidadInfraccionesGeneroWarning[0];
echo "Cantidad Genero Warning ".$CantidadInfraccionesGeneroWarning;

$CantidadInfraccionesGeneroCitation = consultas("select count(*) from infracciones where violationtype = 'Citation' and gender = 'M'");
$CantidadInfraccionesGeneroCitation = pg_fetch_row($CantidadInfraccionesGeneroCitation);
$CantidadInfraccionesGeneroCitation = $CantidadInfraccionesGeneroCitation[0];
echo "Cantidad Genero Citation ".$CantidadInfraccionesGeneroCitation;

$CantidadInfraccionesGeneroSERO = consultas("select count(*) from infracciones where violationtype = 'SERO' and gender = 'M'");
$CantidadInfraccionesGeneroSERO = pg_fetch_row($CantidadInfraccionesGeneroSERO);
$CantidadInfraccionesGeneroSERO = $CantidadInfraccionesGeneroSERO[0];
echo "Cantidad Genero SERO ".$CantidadInfraccionesGeneroSERO;

$CantidadInfraccionesGeneroESERO = consultas("select count(*) from infracciones where violationtype = 'ESERO' and gender = 'F'");
$CantidadInfraccionesGeneroESERO = pg_fetch_row($CantidadInfraccionesGeneroESERO);
$CantidadInfraccionesGeneroESERO = $CantidadInfraccionesGeneroESERO[0];
echo "Cantidad Genero ESERO ".$CantidadInfraccionesGeneroESERO;

$CantidadInfraccionesRazaWarning = consultas("select count(*) from infracciones where violationtype = 'Warning' and race = 'BLACK'");
$CantidadInfraccionesRazaWarning = pg_fetch_row($CantidadInfraccionesRazaWarning);
$CantidadInfraccionesRazaWarning = $CantidadInfraccionesRazaWarning[0];
echo "Cantidad Raza Warning ".$CantidadInfraccionesRazaWarning;

$CantidadInfraccionesRazaCitation = consultas("select count(*) from infracciones where violationtype = 'Citation' and race = 'HISPANIC'");
$CantidadInfraccionesRazaCitation = pg_fetch_row($CantidadInfraccionesRazaCitation);
$CantidadInfraccionesRazaCitation = $CantidadInfraccionesRazaCitation[0];
echo "Cantidad Raza Citation ".$CantidadInfraccionesRazaCitation;

$CantidadInfraccionesRazaSERO = consultas("select count(*) from infracciones where violationtype = 'SERO' and race = 'HISPANIC'");
$CantidadInfraccionesRazaSERO = pg_fetch_row($CantidadInfraccionesRazaSERO);
$CantidadInfraccionesRazaSERO = $CantidadInfraccionesRazaSERO[0];
echo "Cantidad Raza SERO ".$CantidadInfraccionesRazaSERO;

$CantidadInfraccionesRazaESERO = consultas("select count(*) from infracciones where violationtype = 'ESERO' and race = 'WHITE'");
$CantidadInfraccionesRazaESERO = pg_fetch_row($CantidadInfraccionesRazaESERO);
$CantidadInfraccionesRazaESERO = $CantidadInfraccionesRazaESERO[0];
echo "Cantidad Raza ESERO ".$CantidadInfraccionesRazaESERO;

$CantidadInfraccionesColorWarning = consultas("select count(*) from infracciones where violationtype = 'Warning' and color = 'CREAM'");
$CantidadInfraccionesColorWarning = pg_fetch_row($CantidadInfraccionesColorWarning);
$CantidadInfraccionesColorWarning = $CantidadInfraccionesColorWarning[0];
echo "Cantidad Color Warning ".$CantidadInfraccionesColorWarning;

$CantidadInfraccionesColorCitation = consultas("select count(*) from infracciones where violationtype = 'Citation' and color = 'GOLD'");
$CantidadInfraccionesColorCitation = pg_fetch_row($CantidadInfraccionesColorCitation);
$CantidadInfraccionesColorCitation = $CantidadInfraccionesColorCitation[0];
echo "Cantidad Color Citation ".$CantidadInfraccionesColorCitation;

$CantidadInfraccionesColorSERO = consultas("select count(*) from infracciones where violationtype = 'SERO' and color = 'CREAM'");
$CantidadInfraccionesColorSERO = pg_fetch_row($CantidadInfraccionesColorSERO);
$CantidadInfraccionesColorSERO = $CantidadInfraccionesColorSERO[0];
echo "Cantidad Color SERO ".$CantidadInfraccionesColorSERO;

$CantidadInfraccionesColorESERO = consultas("select count(*) from infracciones where violationtype = 'ESERO' and color = 'GRAY'");
$CantidadInfraccionesColorESERO = pg_fetch_row($CantidadInfraccionesColorESERO);
$CantidadInfraccionesColorESERO = $CantidadInfraccionesColorESERO[0];
echo "Cantidad Color ESERO ".$CantidadInfraccionesColorESERO;



?>