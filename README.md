[EN COURS DE DEVELOPPEMENT / TEST / REDACTION]

Ce plugin permet de configurer l'envoi de données de Domoticz vers l'Eedomus. 
Pour ce faire, il injecte dans Domoticz un script dzevents 'domzevents_plugin'. 
Celui ci ne DOIT pas être modifié manuellement. La mise à jour est effectuée automatiquement.

**Types d'information domoticz gérés (Téstés avec)**

* temperature - Température (RFXcom, deCONZ)
* humidity - Humidité (RFXcom, deCONZ)
* pressure - Pression (deCONZ)
* lux - Liminosité (deCONZ)
* batteryLevel - Niveau de batterie (RFXcom, deCONZ)
* signalLevel - Indicateur de signal (RFXcom)
* active - Off/On, Fermé/Ouvert, Ras/Mouvemement (0/1) (deCONZ)
* active - Off/On, Fermé/Ouvert, Ras/Mouvemement (0/100) (deCONZ)
* nvalue - Valeur brute : nValue (deCONZ)
* active et level - [deConzAct](https://github.com/2bprog/eedomus-deconzact-plugin) - On/Off et Luminosité de 0 à 100 (deCONZ)

Voici  un exemple pour envoyer la valeur d'un capteur de température.

![Exemple pour un capteur de température](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.jpg)

Ce plugin peut être utilisé en complément de [deconzact](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) et [deconzcap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) 

## Prérequis

* Un serveur Domoticz sur votre réseau local
* Acces au reseau local de la box Eedomus et de Domoticz

## Installation

Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "Domoticz - Events" / "Créer"

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg1.jpg)

## Champs à configurer : 

![Champs à configurer](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg2.jpg)


### Confifuration Domoticz

* IP Local et port (par défaut : 8080) du serveur Domoticz

Dans les cas ou l'acces au serveur Domoticz est sécurisé il vous faut renseigné les champs suivants (sinon vous pouvez les laisser vides):

* Utilisateur (facultatif) 
* Mot de passe (facultatif)

### Configuration Eedomus

* IP Local de votre Eedomus

### Afficher le configuration

* un fois les informations (au dessus) configurées, vous pouvez afficher la fenêtre de configuration en utilisant le lien "Cliquer ici".
Cela permet de vérifier que les informations saisies sont correctes.

### Création du Widget  : 

* La sélection de cet élément permet de créer le Widget qui donnera acces à Domoticz et à la fentre de configuration.
 
## Le widget
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




## Remarques 

* la fenêtre de configuration fonctionne seulement sur votre réseau local.



## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 

* TODO



