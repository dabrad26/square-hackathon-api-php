# Photo Wall API in PHP

Temporary hackathon API server for PhotoWall written in PHP.

## Setup

In root of server include a `secrets` folder with a file called `photo-wall.txt`. This file should be in the format:

```
DB_HOST="HOST:PORT"
DB_DATABASE="NAME"
DB_USERNAME="USER"
DB_PASSWORD="PASSWORD"
SQUARE_API_URL="https://connect.squareup.com/v2"
SQUARE_API_KEY="SQUARE_KEY"
```