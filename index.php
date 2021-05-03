<?php
// Spécifier le nom du fichier à traiter
$file = "part-r-00000";
// Formats d'affichage disponibles
$chartTypes = ['bar', 'pie', 'doughnut', 'polarArea', 'radar', 'line'];
// Format d'affichage
$chartType = 'bar';
if(!empty($_GET["type"]) and in_array($_GET["type"], $chartTypes)){
    $chartType = $_GET["type"];
}
// Traitement du fichier
$content = fopen($file, "r") or die("Unable to open file!");
$data = [];
while(!feof($content)) {
  $line = explode("\t", fgets($content));
  if(count($line) == 2){
    $data[$line[0]] = $line[1];
  }
}
fclose($content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olympix dataset analysis</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="chart.js"></script>
</head>
<body>
    
<div>
    <select name="type" id="type">
    <?php
    foreach($chartTypes as $type){
    ?>
    <option value="<?php echo $type; ?>" <?php if($chartType == $type){echo 'selected=selected';} ?>><?php echo $type; ?></option>
    <?php
    }
    ?>
    </select>
    <canvas id="myChart"></canvas>
</div>

<script>
document.getElementById('type').addEventListener("change", function(){
    document.location = "./?type=" + this.value;
});
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: '<?php echo $chartType; ?>',
    data: {
        <?php
        $labels = [];
        $labels = array_map(function($element){
            return "'".$element."'";
        }, array_keys($data));
        $colors = [];
        $colors = array_map(function($element){
            return "'#".dechex(mt_rand( 0, 0xFFFFFF ))."'";
        }, array_keys($data));
        ?>
        labels: [<?php echo implode(",", $labels); ?>],
        datasets: [{
            label: '# Total number of medals',
            data: [<?php echo implode(",", $data); ?>],
            backgroundColor: [<?php echo implode(",", $colors); ?>]
        }]
    }
});
</script>
</body>
</html>
