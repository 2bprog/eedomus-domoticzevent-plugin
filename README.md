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
* active et level - [deConzAct](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) - On/Off et Luminosité de 0 à 100 (deCONZ)

Voici  un exemple pour envoyer la valeur d'un capteur de température.

![Exemple pour un capteur de température](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.jpg)

## Prérequis

* Un serveur Domoticz sur votre réseau local
* Acces au reseau local de la box Eedomus et de Domoticz

## Installation

Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "Domoticz - Events" / "Créer"

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg1.jpg)

## Champs à configurer : 

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg2.jpg)

### Configuration Domoticz

* IP Local et port (par défaut : 8080) du serveur Domoticz

Dans les cas ou l'acces au serveur Domoticz est sécurisé, il vous faut renseigné les champs suivants (sinon vous pouvez les laisser vides):

* Utilisateur (facultatif) 
* Mot de passe (facultatif)

### Configuration Eedomus

* IP Local de votre Eedomus

### Afficher le configuration

* un fois les informations de configuration Demoticz et Eedomus renseignées, vous pouvez afficher la fenêtre de configuration en utilisant le lien "Cliquer ici". Cela permet de vérifier que les informations saisies sont correctes.

* Voici le message qui s'affichera en cas d'erreur de configuration ou de serveur non accessible
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgerr.jpg)

* En cas de succes la fenêtre suivante doit s'afficher :
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgok.jpg)

### Création du Widget  : 

* La sélection de cet élément permet de créer le Widget qui vous donnera acces à votre serveur Domoticz, à l'eedomus en local et à la fenêtre de configuration.
 
## Le widget

* Ce Widget vous permet la fenêtre de configuration en cliquant sur le bouton "Cliquez ici (Ip eedomus)"

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/widget.JPG)


## Fenêtre de configuration

* La fenêtre ci-dessous affichera les échanges configués entre Domoticz et Lors du 1er lancement la liste affichera **"Aucune donnée disponible dans le tableau"**

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/config.JPG)


#### Ajouter / Modifier / Supprimer 

* Pour ajouter un nouvel echange, cliuez sur le bouton **Ajouter**, un fenêtre s'affichea vous permettant de sélectionner le périphérique source Domoticz, le périphérique destination et enfin le type d'information que vous voulez envoyer, une fois la configuration terminée, cliquez sur le bouton **Ajouter**, le message **Succès** doit apparaitre, vous pouvez ensuite fermer la fenêtre.

![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Ajouter.JPG)

* Pour modifier un élement existant, sélectionnez la ligne dans le tableau, pui cliquer sur le bouton **Modifier**, une fenêtre 



### Sauvegarde des modifications

![save](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save.JPG)

![save-ok](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save-ok.JPG)

### Script généré sur Domoticz

![domz-script](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domz-script.JPG)

## Remarques 

* La fenêtre de configuration fonctionne seulement sur votre réseau local.
* Ce plugin peut être utilisé en complément des plugins [deconzact](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) et [deconzcap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) 


## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 

* [Plugin eedomus deCONZAct sur Github](https://github.com/2bprog/eedomus-deconzact-plugin)
* [Plugin eedomus deCONZCat sur Github](https://github.com/2bprog/eedomus-deconzact-plugin)
* [Site officiel de Domoticz](https://www.domoticz.com/)
* [DzVents dans Domoticz](https://www.domoticz.com/wiki/DzVents:_next_generation_LUA_scriptin)



