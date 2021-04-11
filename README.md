# Verifica intermedia Linguaggio di programmazione PHP 2021

Consegna zip sulla piattaforma e commit finale su branch e upload su altervista.
Dare la priorità alla consegna su formaretedad formato zip

- dopo la consegna del 6 Aprile 2021 potete completare l'esercitazione su repository e altervista


### [Documento di drive dove inserire i riferimenti](https://docs.google.com/spreadsheets/d/1OVv-vFbc5OM0FhRONraV3XmTt6E8l9icCyvqPIUFe0A/edit?usp=sharing)

## Importazione dati, creazione della classe User, trasformazione di un elenco di istanze della classe Users

- [ ] importare i dati presenti nel file [./dataset/users-management-system.json]("./dataset/users-management-system.json")
- [ ] trasformare ogni riga presente nel dataset in un instanza di una classe **User** con le seguenti proprietà:
    - userId
    - firstName
    - lastName
    - birthday
    - email 

- [ ] Implementare il metodo **getAge** che permette di ottenere l'età dell'utente
- [ ] Implementare il metodo **isAdult** che restituisce **true** se l'utente e maggiorenne **false** e se l'utente è minorenne.

## Creazione del layout

Partendo dal layout [index.html](./index.html)
Visualizzare l'elenco degli **Users**.

- [ ] Sanificare **lastName** per la visualizzazione (ROSSI --> Rossi)
- [ ] Visualizzare l'ètà dell'utente

## Implementare le funzionalità di ricercha 

- [ ] Implementare le ricerche per presenti nell'intestazione della tabella.

    - [ ] findByFirstName
    - [ ] findByLastName
    - [ ] findByAge (età)

---  

## Implementazioni aggiuntive

- [ ] Implementare le ricerche per presenti nell'intestazione della tabella.

    - [ ] findByUserId
    - [ ] findByEmail

- [ ] Realizzare separatamente il layout [raggruppa per cognome in ordine alfabetico](./group_by_last_name.html)