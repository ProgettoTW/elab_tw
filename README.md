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
<<<<<<< Updated upstream
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
=======

<p class="justify-content-center">Il progetto consiste nella realizzazione di una piattaforma di Delivery di Torte e prodotti di pasticceria nel Campus di
                Cesena.</br>Il nome della piattaforma è <em>Pastecceroo</em> (Pronunciato pasticcerù).</br>
            Da la possibilità ai clienti di:</br>- Registrarsi</br>- Accedere</br>- Visualizzare i prodotti</br>- Aggiungerli al carrello</br>- Controllare il carrello</br>- Effettuare degli ordini
            </br>Le funzionalità per i venditori sono:</br>- Visualizzare riepilogo ordini</br>- Gestire prodotti (Aggiornare, aggiungere, modificare)</br>
            Tutti gli ordini sono accompagnati da un sistema di notifiche che permette ai <b>Clienti</b> di conoscere lo stato degli ordini e confermare la ricezione dell'ordine.</br>
            I <b>Venditori</b>,invece, possono confermare gli ordini che arrivano, sapere quando un prodotto è arrivato a destinazione e quando nel magazzino è terminato.
        </p>



            <div class="container">
    <div class="display-6 fw-bold py-3 text-center"> Elaborato Tecnologie Web 2021-2022</div>
    <div class="row">
        <div class="col-md-5 py-5 flex-row mt-3 div-presentazione">
            <h3 class="text-center mb-4">Presentazione</h3>
            <p>Il progetto consiste nella realizzazione di una piattaforma di Delivery di Torte e prodotti di pasticceria nel Campus di
                Cesena.</br>Il nome della piattaforma è <em>Pastecceroo</em> (Pronunciato pasticcerù).</br>La piattaforma permette ai clienti di:</p>
                <ul class="presentazione">
                    <li>
                        <p>Registrarsi</p> 
                    </li>
                    <li>
                        <p>Accedere</p> 
                    </li>
                    <li>
                        <p>Visualizzare i prodotti</p> 
                    </li>
                    <li>
                        <p> Aggiungerli al carrello</p> 
                    </li>
                    <li>
                        <p>Effettuare degli ordini</p> 
                    </li>
                </ul>
                <p>Le funzionalità per i venditori sono:</p>
                <ul class="presentazione">
                    <li>
                        <p>Visualizzare riepilogo ordini</p> 
                    </li>
                    <li>
                        <p>Gestire prodotti (Aggiornare, aggiungere, modificare)</p> 
                    </li>
                </ul>

                <p>Tutti gli ordini sono accompagnati da un sistema di notifiche che permette ai <b>Clienti</b> di conoscere lo stato degli ordini e confermare la ricezione dell'ordine.</br>
            I   <b>Venditori</b>,invece, possono confermare gli ordini che arrivano, sapere quando un prodotto è arrivato a destinazione e quando nel magazzino è terminato.</p>
        </div>
        <div class="col-md-5 py-5 text-center mt-3 div-tecnologie">
            <h3 class="text-center mb-4">Tecnologie utilizzate</h3>
            <ul class="tecnologie">
                <li>
                    <p>HTML5</p>
                </li>
                <li>
                    <p>CSS3</p>
                </li>
                <li>
                    <p>BOOTSTRAP</p>
                </li>
                <li>
                    <p>PHP</p>
                </li>
                <li>
                    <p>JavaScript</p>
                </li>
                <li>
                    <p>MySQL</p>
                </li>
                <li>
                    <a href="https://www.figma.com/file/fjFtReDUXLz3AsotjEdGGv/Untitled?node-id=1%3A4">Figma</a>
                    <p class="figma">Clicca qui per visualizzare i mockup</p>
                </li>
            </ul>
        </div>
    </div>
    </div>
    
    <h2 class="text-center">Team Pastecceroo</h2>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Davide Carità</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block davide" src="img/davide.png" alt=""></div> 
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Francesco Esposito</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block fra " src="img/fra.png" alt=""></div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Luca Bandini</h2>
                    <p>Back-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block luca" src="img/luca.png" alt=""></div> 
        </div>
    </div>
</div>



<div class="container">
    <div class="display-6 fw-bold py-3 text-center"> Elaborato Tecnologie Web 2021-2022</div>
    <div class="row">
        <div class="col-md-5 py-5 flex-row mt-3 div-presentazione">
            <h3 class="text-center mb-4">Presentazione</h3>
            <p>Il progetto consiste nella realizzazione di una piattaforma di Delivery di Torte e prodotti di pasticceria nel Campus di
                Cesena.</br>Il nome della piattaforma è <em>Pastecceroo</em> (Pronunciato pasticcerù).</br>La piattaforma permette ai clienti di:</p>
                <ul class="presentazione">
                    <li>
                        <p>Registrarsi</p> 
                    </li>
                    <li>
                        <p>Accedere</p> 
                    </li>
                    <li>
                        <p>Visualizzare i prodotti</p> 
                    </li>
                    <li>
                        <p> Aggiungerli al carrello</p> 
                    </li>
                    <li>
                        <p>Effettuare degli ordini</p> 
                    </li>
                </ul>
                <p>Le funzionalità per i venditori sono:</p>
                <ul class="presentazione">
                    <li>
                        <p>Visualizzare riepilogo ordini</p> 
                    </li>
                    <li>
                        <p>Gestire prodotti (Aggiornare, aggiungere, modificare)</p> 
                    </li>
                </ul>

                <p>Tutti gli ordini sono accompagnati da un sistema di notifiche che permette ai <b>Clienti</b> di conoscere lo stato degli ordini e confermare la ricezione dell'ordine.</br>
            I   <b>Venditori</b>,invece, possono confermare gli ordini che arrivano, sapere quando un prodotto è arrivato a destinazione e quando nel magazzino è terminato.</p>
        </div>
        <div class="col-md-5 py-5 text-center mt-3 div-tecnologie">
            <h3 class="text-center mb-4">Tecnologie utilizzate</h3>
            <ul class="tecnologie">
                <li>
                    <p>HTML5</p>
                </li>
                <li>
                    <p>CSS3</p>
                </li>
                <li>
                    <p>BOOTSTRAP</p>
                </li>
                <li>
                    <p>PHP</p>
                </li>
                <li>
                    <p>JavaScript</p>
                </li>
                <li>
                    <p>MySQL</p>
                </li>
                <li>
                    <a href="https://www.figma.com/file/fjFtReDUXLz3AsotjEdGGv/Untitled?node-id=1%3A4">Figma</a>
                    <p class="figma">Clicca qui per visualizzare i mockup</p>
                </li>
            </ul>
        </div>
    </div>
    </div>
    
    <h2 class="text-center">Team Pastecceroo</h2>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Davide Carità</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block davide" src="img/davide.png" alt=""></div> 
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Francesco Esposito</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block fra " src="img/fra.png" alt=""></div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Luca Bandini</h2>
                    <p>Back-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block luca" src="img/luca.png" alt=""></div> 
        </div>
    </div>
</div>
>>>>>>> Stashed changes
