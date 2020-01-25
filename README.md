[EN COURS DE DEVELOPPEMENT / TEST / REDACTION]

Ce plugin permet de configurer l'envoi de donn�es de Domoticz vers l'Eedomus. 
Pour ce faire, il injecte dans Domoticz un script dzevents 'domzevents_plugin'. 
Celui ci ne DOIT pas �tre modifi� manuellement. La mise � jour est effectu�e automatiquement.

**Types d'information domoticz g�r�s (T�st�s avec)**

* temperature - Temp�rature (RFXcom, deCONZ)
* humidity - Humidit� (RFXcom, deCONZ)
* pressure - Pression (deCONZ)
* lux - Liminosit� (deCONZ)
* batteryLevel - Niveau de batterie (RFXcom, deCONZ)
* signalLevel - Indicateur de signal (RFXcom)
* active - Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/1) (deCONZ)
* active - Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/100) (deCONZ)
* nvalue - Valeur brute : nValue (deCONZ)
* active et level - [deConzAct](https://github.com/2bprog/eedomus-deconzact-plugin) - On/Off et Luminosit� de 0 � 100 (deCONZ)

Voici  un exemple pour envoyer la valeur d'un capteur de temp�rature.

![Exemple pour un capteur de temp�rature](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.jpg)

Ce plugin peut �tre utilis� en compl�ment de [deconzact](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) et [deconzcap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) 

## Pr�requis

* Un serveur Domoticz sur votre r�seau local
* Acces au reseau local de la box Eedomus et de Domoticz

## Installation

Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "Domoticz - Events" / "Cr�er"

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg1.jpg)

## Champs � configurer : 

![Champs � configurer](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg2.jpg)


### Confifuration Domoticz

* IP Local et port (par d�faut : 8080) du serveur Domoticz

Dans les cas ou l'acces au serveur Domoticz est s�curis� il vous faut renseign� les champs suivants (sinon vous pouvez les laisser vides):

* Utilisateur (facultatif) 
* Mot de passe (facultatif)

### Configuration Eedomus

* IP Local de votre Eedomus

### Afficher le configuration

* un fois les informations (au dessus) configur�es, vous pouvez afficher la fen�tre de configuration en utilisant le lien "Cliquer ici".
Cela permet de v�rifier que les informations saisies sont correctes.

### Cr�ation du Widget  : 

* La s�lection de cet �l�ment permet de cr�er le Widget qui donnera acces � Domoticz et � la fentre de configuration.
 
## Le widget
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




## Remarques 

* la fen�tre de configuration fonctionne seulement sur votre r�seau local.



## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 

* TODO



