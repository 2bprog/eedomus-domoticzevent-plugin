# eedomus-domoticzevent-plugin (Dev en cours)

Plugin eedomus pour configurer l'envoi de donn�es de Domoticz vers eedomus

## Fonctionnement

Ce Plugin injecte dans domoticz un script dzevents 'domzevents_plugin'. Celui ci ne DOIT pas �tre modifi� manuellement. La mise � jour est effectu�e automatiquement par le plugin.

## Transferts g�r�e

* Temp�rature 
* Humidit�
* Pression
* Liminosit�
* Niveau de batterie
* Indicateur de signal
* Etat de la communication
* Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/1)
* Off/On, Ferm�/Ouvert, Ras/Mouvemement (0/100)
* Valeur brute : nValue
* deConzAct - On/Off et Luminosit� ([Plugin eedomus pour les actionneurs deCONZ](https://github.com/2bprog/eedomus-deconzact-plugin))


