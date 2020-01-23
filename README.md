# eedomus-domoticzevent-plugin (Dev en cours)

Plugin eedomus pour configurer l'envoi de données de Domoticz vers eedomus

## Fonctionnement

Ce Plugin injecte dans domoticz un script dzevents 'domzevents_plugin'. Celui ci ne DOIT pas être modifié manuellement. La mise à jour est effectuée automatiquement par le plugin.

## Transferts gérée

* Température 
* Humidité
* Pression
* Liminosité
* Niveau de batterie
* Indicateur de signal
* Etat de la communication
* Off/On, Fermé/Ouvert, Ras/Mouvemement (0/1)
* Off/On, Fermé/Ouvert, Ras/Mouvemement (0/100)
* Valeur brute : nValue
* deConzAct - On/Off et Luminosité ([Plugin eedomus pour les actionneurs deCONZ](https://github.com/2bprog/eedomus-deconzact-plugin))


