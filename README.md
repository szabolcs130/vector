# Technológiák

- PHP(natív)
- MySQL
- REST API
- Postman(tesztelés)

# Indítás

1. Repository klónázása:

git clone https://github.com/szabolcs130/vector.git

2. XAMPP indítása (Apache + MySQL)

3. Adatbázis importálása phpMyAdminban
database/vector.sql

4. Alkalmazás futtatása:

http://localhost/vector/public/api/events

5. Postman collection importálása:

docs/vector.postman_collection.json

# Api végpontok

## GET /api/events

Visszaadja a jövőbeli eseményeket szabad helyekkel együtt

Response példa:

[
    {
        "id": 2,
        "name": "event2",
        "start_date": "2027-03-01 20:40:00",
        "capacity": 10,
        "free_spots": 0
    }
]

## POST /api/events/{id}/register

Jelentkezés egy eseményre

Request body:
{
    "name": "Teszt",
    "email": "teszt@mail.com"
}

Response példa:

{
    "message": "Registered",
    "ticket": "dcc6c8715e"
}

# Megvalósított Funkciók:

- esemény listázása szabad helyekkel együtt
- esemény jelentkezés létszámkorlátozás figyelembe vételével
- Race condition kezelése
- egyedi jegygenerálás
- Input validálás
- Hibakezelés
- Logolás esemény betelésekor

# Döntések
- MVC tervezési mintát alkalmaztam Repository és Service segítségével a tiszta rétegezés érdekében
- Pesszimista lockolást használtam, hogy a párhuzamos jelentkezések esetén az adott esemény adatai zárolásra kerüljenek a túlfoglalás ellen
- jegygenerálásnál az adatbázis UNIQUE constraint segítségével biztosítja az egyediséget, illetve ütközésnél a tranzakció rollback-el, így nem lesz duplikált adat.
