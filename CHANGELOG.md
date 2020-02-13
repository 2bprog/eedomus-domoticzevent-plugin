## v0.0.4-beta (13/02/2020)

* Ajout échange Consigne de Thermostat
* Ajout échange Mode de Tête thermostatique (Off, Auto, Boost)

## v0.0.3-beta (04/02/2020)

* Changement de l'ordre des colonnes dans la fenêtre de configuration
* Retourne les températures avec une décimale
* Utilisation d'un timer à 30min pour les echanges des niveaux de batterie

## v0.0.2-beta (28/01/2020)

* Ajout échange etat télécommade au format deCONZ domoticz (0, 10, 20, ...)
* Ajout échange de la pression atmosphérique
* Ajout échange du niveau de batterie (en indicateur eedomus)
* Ajout échange couleur au format RGB eedomus (de 0 à 100 avec pas de 10)
* Optimisation du SetValue ou SetBattery dans le script
* Modification structure de données dans le script dzVents

## v0.0.1-beta (25/01/2020)

* Version initiale

<b>Ce Plugin permet de configurer l'envoi de valeur de Domoticz vers l'Eedomus en temps réèl</b><br><br>Température, Humidité, Pression atmosphérique, Pression, Luminosité, Niveau de batterie, Niveau de batterie - Indicateur Eedomus, Indicateur de signal, Valeur numérique brute, Off/On Ferm./Ouv Ras/Mouv. (0 ou 1), Off/On Ferm./Ouv Ras/Mouv. (0 ou 100), Consigne de Thermostat, deConzCap - Etat télécommande, deConzCap - Mode Tête Thermostatique, deConzAct - On/Off et Luminosité, deConzAct - Couleur au format Eedomus R,G,B (0 à 100)<br><br>Ce plugin peut etre utilisé en complement de <a href='https://forum.eedomus.com/viewtopic.php?f=50&t=9236' target='_blank'>deConzAct</a> et <a href='https://forum.eedomus.com/viewtopic.php?f=50&t=9238' target='_blank'>deConzCap</a>