<?php 
// Datos obtenidos de POST
$foo = $_POST['foo'];
$bar = $_POST['bar'];

// Configracion de cadena de conexión
$host = '127.0.0.1';
$db   = 'php-pdo-excercise';
$charset = 'utf8mb4';

// Cadena de conexión y accesos
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$user = "pdo_user";
$pass = "dbmanager";

// Opciones de conexion
$dbopts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
$pdo = new PDO($dsn, $user, $pass, $dbopts);

try
{
    // Preparamos queries de inserción (aún no se ejecutan)
    $fooInsert    = $pdo->prepare("INSERT INTO tb_a (foo) VALUES (:foo)");
    $barInsert    = $pdo->prepare("INSERT INTO tb_b (bar) VALUES (:bar)");
    $fooBarInsert = $pdo->prepare("INSERT INTO tb_ab (foobar, fk_a, fk_b) VALUES(:foobar, :fk_a, :fk_b)");

    // Iniciamos transacción
    $pdo->beginTransaction();

    // Insertamos
    $fooInsert->execute([ 'foo' => 'this is foo' ]);
    $lastInsertIdOfFoo = $pdo->lastInsertId();     // Obtenemos ID de la ultima insercion a nivel de conexión

    $barInsert->execute([ 'bar' => 'this is bar' ]);
    $lastInsertIdOfBar = $pdo->lastInsertId();     // Igual... obtenemos ultimo id insertado a nivel de conexion

    $fooBarInsert->execute([ 'foobar' => 'this is foo ... and bar' , 
        'fk_a' => $lastInsertIdOfFoo, 'fk_b' => $lastInsertIdOfBar]);

    $lastInsertIdOfFooBar = $pdo->lastInsertId();

    $pdo->commit();
}
catch(Exception $e)
{
    if($pdo->inTransaction()) $pdo->rollback(); //  Si fallo la insercion en la transaccion .. rollback
    var_dump(e); die; // Mostramos el error en pantalla y matamos la ejecución
}
?>

<p> Ultimo id de Foo <?php echo $lastInsertIdOfFoo ?> </p>
<p> Ultimo id de Bar <?php echo $lastInsertIdOfBar ?> </p>
<p> Ultimo id de Foo <?php echo $lastInsertIdOfFooBar ?> </p>