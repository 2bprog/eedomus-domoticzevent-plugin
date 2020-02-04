Ce plugin permet de configurer l'envoi de donn�es de Domoticz vers l'Eedomus en temps r��l. 
Pour ce faire, il injecte dans Domoticz un script dzVents 'domzevents_plugin'. 
Celui ci ne DOIT pas �tre modifi� manuellement. La mise � jour est effectu�e automatiquement.

**Types d'information Domoticz g�r�s (test� avec)**

* temperature - Temp�rature (RFXcom, deCONZ)
* humidity - Humidit� (RFXcom, deCONZ)
* barometer - Pression atmosph�rique (deCONZ)
* pressure - Pression 
* lux - Luminosit� (deCONZ)
* batteryLevel - Niveau de batterie (RFXcom, deCONZ)
* batteryLevel - Niveau de batterie - Indicateur (RFXcom, deCONZ)
* signalLevel - Indicateur de signal (RFXcom)
* nvalue - Valeur brute : nValue (deCONZ)
* active - Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/1) (deCONZ)
* active - Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/100) (deCONZ)
* level : [deConzCap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) - etat t�l�commade au format deCONZ domoticz (deCONZ)
* active et level - [deConzAct](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) - On/Off et Luminosit� de 0 � 100 (deCONZ)
* getColor - [deConzAct](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) - Couleur au format eedomus R,G,B (0 � 100) (deCONZ)

Voici  un exemple pour envoyer la valeur d'un capteur de temp�rature.

![Exemple pour un capteur de temp�rature](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/exemple-temp.0.0.3.jpg)

## Pr�requis

* Un serveur Domoticz sur votre r�seau local
* Acc�s au r�seau local de la box Eedomus et de Domoticz

## Installation

Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "Domoticz - Events" / "Cr�er"

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg1.jpg)

## Champs � configurer : 

![Configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfg2.jpg)

### Configuration Domoticz

* IP Local et port (par d�faut : 8080) du serveur Domoticz

Dans les cas ou l�acc�s au serveur Domoticz est s�curis�, il vous faut renseigner les champs suivants (sinon vous pouvez les laisser vides):

* Utilisateur (facultatif) 
* Mot de passe (facultatif)

### Configuration Eedomus

* IP Local de votre Eedomus

### Afficher le configuration

* un fois les informations de configuration Domoticz et Eedomus renseign�es, vous pouvez afficher la fen�tre de configuration en utilisant le lien "Cliquer ici". Cela permet de v�rifier que les informations saisies sont correctes.

* Voici le message qui s'affichera en cas d'erreur de configuration ou de serveur non accessible
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgerr.jpg)

* En cas de succ�s, la fen�tre suivante doit s'afficher :
![Erreur de lecture](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/domzevents-cfgok.0.0.3.jpg)

### Cr�ation du Widget 

* La s�lection de cet �l�ment permet de cr�er le Widget qui vous donnera acc�s � votre serveur Domoticz, � l'Eedomus en local et � la fen�tre de configuration.
 
## Le Widget

* Ce Widget vous permet la fen�tre de configuration en cliquant sur le bouton "Cliquez ici (Ip eedomus)"

![Acc�s a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/widget.JPG)


## Fen�tre de configuration

* La fen�tre ci-dessous affichera les �changes configur�s entre Domoticz. Lors du 1er lancement la liste affichera **"Aucune donn�e disponible dans le tableau"**

![Acces a la configuration](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/config.0.0.3.JPG)


#### Ajouter / Modifier / Supprimer 

* Pour ajouter un nouvel �change, cliquez sur le bouton **Ajouter**, une fen�tre s�affichera vous permettant de s�lectionner le p�riph�rique source Domoticz, le p�riph�rique destination Eedomus et enfin le type d'information que vous voulez envoyer.

![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/Ajouter.0.0.3.JPG)

* Une fois la configuration termin�e, cliquez sur le bouton **Ajouter**, le message **Succ�s** doit appara�tre, vous pouvez ensuite **Fermer** la fen�tre.

![Ajouter](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/success.jpg)

* Pour modifier un �l�ment, s�lectionnez la ligne dans le tableau, puis cliquez sur le bouton **Modifier**, le fonctionnement est similaire � l'ajout.

* Pour supprimer un �l�ment,s�lectionnez la ligne dans le tableau, puis cliquez sur le bouton **Supprimer**.

#### Sauvegarde des modifications

* Apr�s avoir effectuer vos modifications de configuration, il faut appliquer et sauvegarder votre configuration avec le bouton ci-dessous :

![save](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save.JPG)

* Le message suivant s'affichera si la sauvegarde a �t� avec succ�s. Votre configuration sera alors effective.

![save-ok](https://raw.githubusercontent.com/2bprog/eedomus-domoticzevent-plugin/master/doc/save-ok.JPG)


## Remarques 

* La fen�tre de configuration fonctionne seulement sur votre r�seau local.
* Ce plugin peut �tre utilis� en compl�ment des plugins [deconzact](https://forum.eedomus.com/viewtopic.php?f=50&t=9236) et [deconzcap](https://forum.eedomus.com/viewtopic.php?f=50&t=9238) 


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


