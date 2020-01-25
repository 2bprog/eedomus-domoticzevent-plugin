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
* active et level - [deConzAct](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) - On/Off et Luminosit� de 0 � 100 (deCONZ)

Voici  un exemple pour envoyer la valeur d'un capteur de temp�rature.

![Exemple pour un capteur de temp�rature](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.jpg)

## Pr�requis

* Un serveur Domoticz sur votre r�seau local
* Acces au reseau local de la box Eedomus et de Domoticz

## Installation

Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "Domoticz - Events" / "Cr�er"

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg1.jpg)

## Champs � configurer : 

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg2.jpg)

### Configuration Domoticz

* IP Local et port (par d�faut : 8080) du serveur Domoticz

Dans les cas ou l'acces au serveur Domoticz est s�curis�, il vous faut renseign� les champs suivants (sinon vous pouvez les laisser vides):

* Utilisateur (facultatif) 
* Mot de passe (facultatif)

### Configuration Eedomus

* IP Local de votre Eedomus

### Afficher le configuration

* un fois les informations de configuration Demoticz et Eedomus renseign�es, vous pouvez afficher la fen�tre de configuration en utilisant le lien "Cliquer ici". Cela permet de v�rifier que les informations saisies sont correctes.

* Voici le message qui s'affichera en cas d'erreur de configuration ou de serveur non accessible
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgerr.jpg)

* En cas de succes la fen�tre suivante doit s'afficher :
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgok.jpg)

### Cr�ation du Widget  : 

* La s�lection de cet �l�ment permet de cr�er le Widget qui vous donnera acces � votre serveur Domoticz, � l'eedomus en local et � la fen�tre de configuration.
 
## Le widget

* Ce Widget vous permet la fen�tre de configuration en cliquant sur le bouton "Cliquez ici (Ip eedomus)"

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/widget.JPG)


## Fen�tre de configuration

* La fen�tre ci-dessous affichera les �changes configu�s entre Domoticz et Lors du 1er lancement la liste affichera **"Aucune donn�e disponible dans le tableau"**

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/config.JPG)


#### Ajouter / Modifier / Supprimer 

* Pour ajouter un nouvel echange, cliuez sur le bouton **Ajouter**, un fen�tre s'affichea vous permettant de s�lectionner le p�riph�rique source Domoticz, le p�riph�rique destination et enfin le type d'information que vous voulez envoyer, une fois la configuration termin�e, cliquez sur le bouton **Ajouter**, le message **Succ�s** doit apparaitre, vous pouvez ensuite fermer la fen�tre.

![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Ajouter.JPG)

* Pour modifier un �lement existant, s�lectionnez la ligne dans le tableau, pui cliquer sur le bouton **Modifier**, une fen�tre 



### Sauvegarde des modifications

![save](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save.JPG)

![save-ok](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save-ok.JPG)

### Script g�n�r� sur Domoticz

![domz-script](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domz-script.JPG)

## Remarques 

* La fen�tre de configuration fonctionne seulement sur votre r�seau local.
* Ce plugin peut �tre utilis� en compl�ment des plugins [deconzact](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) et [deconzcap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) 


## Sources et historique des versions

* [Sources](https://github.com/2bprog/eedomus-domoticzevent-plugin)
* [Historique des versions](https://github.com/2bprog/eedomus-domoticzevent-plugin/blob/master/CHANGELOG.md)

## Liens 

* [Plugin eedomus deCONZAct sur Github](https://github.com/2bprog/eedomus-deconzact-plugin)
* [Plugin eedomus deCONZCat sur Github](https://github.com/2bprog/eedomus-deconzact-plugin)
* [Site officiel de Domoticz](https://www.domoticz.com/)
* [DzVents dans Domoticz](https://www.domoticz.com/wiki/DzVents:_next_generation_LUA_scriptin)



