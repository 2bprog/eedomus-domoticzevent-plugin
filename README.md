Ce plugin permet de configurer l'envoi de données de Domoticz vers l'Eedomus en temps réèl. 
Pour ce faire, il injecte dans Domoticz un script dzVents 'domzevents_plugin'. 
Celui ci ne DOIT pas être modifié manuellement. La mise à jour est effectuée automatiquement.

**Types d'information Domoticz gérés (testé avec)**

* temperature - Température (RFXcom, deCONZ)
* humidity - Humidité (RFXcom, deCONZ)
* barometer - Pression atmosphérique (deCONZ)
* pressure - Pression 
* lux - Luminosité (deCONZ)
* batteryLevel - Niveau de batterie (RFXcom, deCONZ)
* batteryLevel - Niveau de batterie - Indicateur (RFXcom, deCONZ)
* signalLevel - Indicateur de signal (RFXcom)
* nvalue - Valeur brute : nValue (deCONZ)
* active - Off/On, Fermé/Ouvert, Ras/Mouvemement (0/1) (deCONZ)
* active - Off/On, Fermé/Ouvert, Ras/Mouvemement (0/100) (deCONZ)
* level : [deConzCap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) - etat télécommade au format deCONZ domoticz (deCONZ)
* active et level - [deConzAct](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) - On/Off et Luminosité de 0 à 100 (deCONZ)
* getColor - [deConzAct](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) - Couleur au format eedomus R,G,B (0 à 100) (deCONZ)

Voici  un exemple pour envoyer la valeur d'un capteur de température.

![Exemple pour un capteur de température](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.0.0.3.jpg)

## Prérequis

* Un serveur Domoticz sur votre réseau local
* Accès au réseau local de la box Eedomus et de Domoticz

## Installation

Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "Domoticz - Events" / "Créer"

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg1.jpg)

## Champs à configurer : 

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg2.jpg)

### Configuration Domoticz

* IP Local et port (par défaut : 8080) du serveur Domoticz

Dans les cas ou l’accès au serveur Domoticz est sécurisé, il vous faut renseigner les champs suivants (sinon vous pouvez les laisser vides):

* Utilisateur (facultatif) 
* Mot de passe (facultatif)

### Configuration Eedomus

* IP Local de votre Eedomus

### Afficher le configuration

* un fois les informations de configuration Domoticz et Eedomus renseignées, vous pouvez afficher la fenêtre de configuration en utilisant le lien "Cliquer ici". Cela permet de vérifier que les informations saisies sont correctes.

* Voici le message qui s'affichera en cas d'erreur de configuration ou de serveur non accessible
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgerr.jpg)

* En cas de succès, la fenêtre suivante doit s'afficher :
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgok.0.0.3.jpg)

### Création du Widget 

* La sélection de cet élément permet de créer le Widget qui vous donnera accès à votre serveur Domoticz, à l'Eedomus en local et à la fenêtre de configuration.
 
## Le Widget

* Ce Widget vous permet la fenêtre de configuration en cliquant sur le bouton "Cliquez ici (Ip eedomus)"

![Accès a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/widget.JPG)


## Fenêtre de configuration

* La fenêtre ci-dessous affichera les échanges configurés entre Domoticz. Lors du 1er lancement la liste affichera **"Aucune donnée disponible dans le tableau"**

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/config.0.0.3.JPG)


#### Ajouter / Modifier / Supprimer 

* Pour ajouter un nouvel échange, cliquez sur le bouton **Ajouter**, une fenêtre s’affichera vous permettant de sélectionner le périphérique source Domoticz, le périphérique destination Eedomus et enfin le type d'information que vous voulez envoyer.

![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Ajouter.0.0.3.JPG)

* Une fois la configuration terminée, cliquez sur le bouton **Ajouter**, le message **Succès** doit apparaître, vous pouvez ensuite **Fermer** la fenêtre.

![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/success.jpg)

* Pour modifier un élément, sélectionnez la ligne dans le tableau, puis cliquez sur le bouton **Modifier**, le fonctionnement est similaire à l'ajout.

* Pour supprimer un élément,sélectionnez la ligne dans le tableau, puis cliquez sur le bouton **Supprimer**.

#### Sauvegarde des modifications

* Après avoir effectuer vos modifications de configuration, il faut appliquer et sauvegarder votre configuration avec le bouton ci-dessous :

![save](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save.JPG)

* Le message suivant s'affichera si la sauvegarde a été avec succès. Votre configuration sera alors effective.

![save-ok](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save-ok.JPG)


## Remarques 

* La fenêtre de configuration fonctionne seulement sur votre réseau local.
* Ce plugin peut être utilisé en complément des plugins [deconzact](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) et [deconzcap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) 


## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 

* [Domoticz - Events sur le forum eedomus](https://forum.eedomus.com/viewtopic.php?f=50&t=9274)
* [Plugin eedomus deCONZAct sur Github](https://github.com/2bprog/eedomus-deconzact-plugin)
* [Plugin eedomus deCONZCat sur Github](https://github.com/2bprog/eedomus-deconzact-plugin)
* [Site officiel d'Eedomus](https://www.eedomus.com/)
* [Site officiel de Domoticz](https://www.domoticz.com/)
* [DzVents dans Domoticz](https://www.domoticz.com/wiki/DzVents:_next_generation_LUA_scriptin)


