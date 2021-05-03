# Data Visualization

## Présentation

* Ce projet contient un fichier `php` permettant de visualiser l'output d'un job MapReduce sous forme de graphes.

## Prérequis

* Installer Apache (ou n'importe quel serveur web) & PHP (version 7.0 ou plus) sur votre machine.


## Utilisation

* Placer le dossier téléchargé sous le répertoire de votre serveur web.
  
* Lancer le navigateur et taper l'URL suivante : 
  ```
  127.0.0.1/DataVisualization
  ```

  ![screenshot](https://www.nassimbahri.ovh/docs/bigdata/documentations/visualization/c1.png)

## Modification

* Pour changer le fichier à analyser, vous devez modifier la ligne suivante :

  ```php
  $file = "part-r-00000";
  ```

* Pour changer le type de graph à afficher, vous devez modifier la ligne suivante :

  ```php
  $chartType = 'bar';
  ```

  et choisir un format d'affichage parmis cette liste : 

  ```php
  $chartTypes = ['bar', 'pie', 'doughnut', 'polarArea', 'radar', 'line'];
  ```

## Voir aussi

Le fichier analysé peut être l'output de l'un des projets suivants :

* Job MapReduce disponible sur ce [lien](https://github.com/BigDataESEN/OlympixMapReduce).
* Script Pig disponible sur ce [lien](https://github.com/BigDataESEN/OlympixPig).