define(SH_COUNT_MAX, 10);
<? if(!empty($_POST['txt'])) {
$fd = fopen('sh.txt', 'w+'); fputs( $fd, $_POST['txt']."\n"); fclose($fd);
}
$fd = file( 'sh.txt' );
echo '<div>';
for( $ii = 0; $ii < SH_COUNT_MAX; $ii++ )
       echo '<p>'.htmlspecialchars($fd[$ii]).'</p>';
echo '<form method="post" action="shout.php">'
      .'<input type="text" name="txt"><input type="submit"></form>';
echo '</div>';
?>