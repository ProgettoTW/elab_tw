# Progetto per l'esame di Tecnologie Web 2021/22

  

## Membri Gruppo:

  

- Luca Bandini

- Francesco Esposito

- Davide Carità

  

### Specifiche del progetto

  

Il progetto consiste nella realizzazione di una piattaforma di Delivery di Torte e prodotti di pasticceria nel Campus di

Cesena. Il nome della piattaforma è **Pastecceroo** (Pronunciato `pasticcerù`).

  

### Linguaggi utilizzati

  

+ HTML5

+ PHP

+ CSS (Bootstrap and Fontawesome)

+ JS

+ MYSQL
---
---
  

## Setup del progetto



- Per prima cosa clonare il repository nella root del server PHP tramite il comando

```
git clone https://github.com/ProgettoTW/elab_tw
```
---
### Importante:
**Per ricevere le notifiche via mail occorre impostare il server SMTP nel file `php.ini`
La procedura varia a seconda del OS, per la simulazione del progetto abbiamo utilizzato per comodità un server SMTP hostato localmente nella porta `25`.**

---
#### Creare il database

- Per creare il database basta eseguire le query SQL dentro al file `DATABASE_CREATE.sql`nella console di MySQL. 
Questa query creerà anche un account Venditore di prova dalle credenziali:
`mail:		pasticceroo@protonmail.com`
`password: 	Password1234`

Una volta creato sarà possibile popolarlo direttamente dalla dashboard venditore sul sito.
