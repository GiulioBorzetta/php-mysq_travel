# PHP & MYSQL - Travek

## Come avviare il progetto sul proprio pc?

- Duplicare il progetto sul proprio computer
- Aprire il terminare e usare il comando `php -S localhost:8000`

## Come è strutturato il progetto?

Il sito è progettato solo su una pagina, dove è possibile suddividerlo in 3 parti:

- Il filtro
- La creazione dei paesi
- La creazione dei viaggi


![Filtro](https://github.com/GiulioBorzetta/php-mysql-travel/blob/main/images/filter.png)

In questa immagine si può notare che per cercare le informazioni necessarie, è possibile farlo in due modi:

- Attraverso il nome del paese
- Attraverso la quantità di posti disponibili

Andando ad inserire in uno dei due riquadri o entrambi dei valori, i risultati che trova li mostrerà nella tabella che è presente subito sotto.

![Creazione dei paesi](https://github.com/GiulioBorzetta/php-mysql-travel/blob/main/images/country.png)

Nella parte della creazione dei paesi, si può notare che ci sta solo un valore da inserire, il paese e una volta inserito sarà possibile vedere tutti i paesi inseriti nella tabella sottostante.

![Creazione dei viaggi](https://github.com/GiulioBorzetta/php-mysql-travel/blob/main/images/travel.png)

Nella creazione dei viaggi, possiamo notare una scritta "Add New Travel", dove aprirà una nuova pagina con la possibilità di inserire:
- Numero dei posti disponibili
- Paese 1
- Paese 2
- Paese 3
- Paese 4

![Inserimento dati Viaggi](https://github.com/GiulioBorzetta/php-mysql-travel/blob/main/images/insert_travel.png)

Una volta inseriti tutti i valori (i paesi non devono esser inseriti tutti, in un viaggio potrebbero starci anche solo 2 paesi), si ritornerà nella prima pagina e saranno presenti tutti i viaggi inseriti

## A livello di codice come è costituito?

all'interno è possibile vedere subito index.php che sarebbe la pagina che vediamo appena carichiamo la pagina, poi è presente un cartella "database" con all'interno solo un file. Questo file permette il collegamento tra il sito e il server (sono da sostituire le credenziali, sennò il sito non funzionerà), poi è presente la cartella MYSQL dove è presente il file da inserire nel MYSQL per settare le tabelle. Nelle Cartelle "Viaggi" e "Paese" sono rispettivamente tutta la parte di creazione, modifica e eliminazione dei viaggi e per la cartella "Paese" vale la stessa cosa, solo per la parte dei paesi. La Cartella "images" sono presenti delle foto per il README di GITHUB. 

Nella cartella Viaggi i file che sono presenti servono a:

- delete_viaggi.php, per eliminare un viaggio creato
- edit_viaggi.php, per modificare un viaggio creato
- filter_viaggi.php, è la prima parte del sito, per filtrare i viaggi in base al paese o al numero di posti disponibili
- insert_viaggi.php, per la creazione di un viaggio
- manage_viaggi.php, per la visualizzazione nella prima pagina dei viaggi presenti

Nella cartella Paese i file che sono presenti servono a:

- delete_country.php, per eliminare il paese creato
- insert_country.php, per inserire un nuovo paese
- manage_country.php, per vedere i paesi che sono presenti, per poi modificarli e/o eliminarli
- modify_country.php, per modificare il nome del paese



