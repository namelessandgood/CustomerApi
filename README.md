# Ticket Api

hello there in my github repo
I make the Ticket api for learn how api work in Laravel

## tools

I used `Laravel 11` and `Visual Studio code` (vscode) in this project

let's go.

## what is response in the api

### in ticket route is response this json format

```json
    {
    "ticket": {
        "type": "ticket",
        "id": 1,
        "attributes": {
            "title": "repellendus aut ut",
            "description": null,
            "status": "A",
            "createdAt": "2024-08-15T00:29:12.000000Z",
            "updatedAt": "2024-08-15T00:29:12.000000Z"
        },
        "relationships": {
            "user": {
                "data": {
                    "type": "user",
                    "id": 8
                },
                "links": []
            }
        },
        "included": [
            {
                "type": "users",
                "id": 8,
                "attributes": {
                    "name": "Phyllis Hermiston",
                    "email": "volkman.vidal@example.org"
                }
            }
        ],
        "links": {
            "self": "http://127.0.0.1:8000/api/v1/tickets/1"
        }
    }
}
```

### In user json format

```json
{
    "data": {
        "type": "users",
        "id": 1,
        "attributes": {
            "name": "Doug Casper",
            "email": "preinger@example.org",
            "emailVerifiedAt": "2024-08-15T00:29:12.000000Z",
            "createdAt": "2024-08-15T00:29:12.000000Z",
            "updatedAt": "2024-08-15T00:29:12.000000Z"
        }
    }
}
```
