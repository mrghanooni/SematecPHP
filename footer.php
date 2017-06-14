<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Powered by <a href="MohammadReza GHanooni" title="MR Work Out!" target="_blank" class="w3-hover-text-green">MohammadReza GHanooni</a></p><br><br>

<?php
  function getGold()
{  
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.quandl.com/api/v3/datasets/WGC/GOLD_DAILY_AUD.json');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);

//echo $result;
$goldArray= json_decode($result, true);

return $goldArray;
}
	
$goldPrice = getGold();

?>
<P> Gold Rate right Now:</P> <?php echo $goldPrice["refreshed_at"]; ?>
</footer>
</body>
</html>