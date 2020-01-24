[EN COURS DE REDACTION]

Ce plugin permet de configurer l'envoi de données de Domoticz vers eedomus. Pour ce faire, il injecte dans domoticz un script dzevents 'domzevents_plugin'. Celui ci ne DOIT pas être modifié manuellement. La mise à jour est effectuée automatiquement par le plugin.
Ci-dessous un exemple d'usage pour l'échange dun capteur de température.

![Exemple pour un capteur de température](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.jpg)

Vous pouvez combiner l'usage avec les plugins [deconzact](https://github.com/2bprog/eedomus-deconzact-plugin) et [deconzcap](https://github.com/2bprog/eedomus-deconzcap-plugin) 

## Prérequis

* Un serveur Domoticz sur votre réseau local

## Installation
Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "TODO" / "Créer"

!! TODO CAPTURE : IMG Plugin

## Champs à configurer : 

!! TODO CAPTURE : IMG Plugin

### IP de votre eedomus

* TODO 

### IP + Port / Utilisateur et Mode de passe domoticz

* TODO 

## Widget crée  : 

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/widget.JPG)

## Fenêtre de configuration

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/config.JPG)

### Ajouter / Modifier / Supprimer 
![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Ajouter.JPG)

![Modifier](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Modifier.JPG)

![supprimer](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/supprimer.JPG)

### Listes d'élément

![list-domz](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/list-domz.JPG)

![list-eed](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/list-eed.JPG)

!! TODO CAPTURE : Type d'info

### Sauvegarde des modifications

![save](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save.JPG)

![save-ok](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save-ok.JPG)

### Script généré sur Domoticz

![domz-script](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domz-script.JPG)



## Types d'information domoticz gérés

* Température (rfxcom, deCONZ)
* Humidité (rfxcom, deCONZ)
* Pression (deCONZ)
* Liminosité (deCONZ)
* Niveau de batterie (rfxcom, deCONZ)
* Indicateur de signal (rfxcom)
* Etat de la communication
* Off/On, Fermé/Ouvert, Ras/Mouvemement (0/1) 
* Off/On, Fermé/Ouvert, Ras/Mouvemement (0/100)
* Valeur brute : nValue
* [deConzAct](https://github.com/2bprog/eedomus-deconzact-plugin) - On/Off et Luminosité (deCONZ)

## Remarques 

* la fenêtre de configuration fonctionne seulement sur votre réseau local.



## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 




