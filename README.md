[EN COURS DE REDACTION]

Ce plugin permet de configurer l'envoi de donn�es de Domoticz vers eedomus. Pour ce faire, il injecte dans domoticz un script dzevents 'domzevents_plugin'. Celui ci ne DOIT pas �tre modifi� manuellement. La mise � jour est effectu�e automatiquement par le plugin.
Ci-dessous un exemple d'usage pour l'�change dun capteur de temp�rature.

![Exemple pour un capteur de temp�rature](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.jpg)

Vous pouvez combiner l'usage avec les plugins [deconzact](https://github.com/2bprog/eedomus-deconzact-plugin) et [deconzcap](https://github.com/2bprog/eedomus-deconzcap-plugin) 

## Pr�requis

* Un serveur Domoticz sur votre r�seau local

## Installation
Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "TODO" / "Cr�er"

!! TODO CAPTURE : IMG Plugin

## Champs � configurer : 

!! TODO CAPTURE : IMG Plugin

### IP de votre eedomus

* TODO 

### IP + Port / Utilisateur et Mode de passe domoticz

* TODO 

## Widget cr�e  : 

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/widget.JPG)

## Fen�tre de configuration

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/config.JPG)

### Ajouter / Modifier / Supprimer 
![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Ajouter.JPG)

![Modifier](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Modifier.JPG)

![supprimer](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/supprimer.JPG)

### Listes d'�l�ment

![list-domz](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/list-domz.JPG)

![list-eed](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/list-eed.JPG)

!! TODO CAPTURE : Type d'info

### Sauvegarde des modifications

![save](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save.JPG)

![save-ok](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save-ok.JPG)

### Script g�n�r� sur Domoticz

![domz-script](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domz-script.JPG)



## Types d'information domoticz g�r�s

* Temp�rature (rfxcom, deCONZ)
* Humidit� (rfxcom, deCONZ)
* Pression (deCONZ)
* Liminosit� (deCONZ)
* Niveau de batterie (rfxcom, deCONZ)
* Indicateur de signal (rfxcom)
* Etat de la communication
* Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/1) 
* Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/100)
* Valeur brute : nValue
* [deConzAct](https://github.com/2bprog/eedomus-deconzact-plugin) - On/Off et Luminosit� (deCONZ)

## Remarques 

* la fen�tre de configuration fonctionne seulement sur votre r�seau local.



## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 




