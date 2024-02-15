# SubExample

## Description

This is a sub example domain service.

## Schema

### Example

#### Example Table

| Field       | Type     | Description                          |
|-------------|----------|--------------------------------------|
| id          | int      | The primary key of the table.        |
| user_id     | int      | The foreign key of the users table.  |
| name        | varchar  | The name of the example.             |
| state       | varchar  | The state of the example.            |
| description | text     | The description of the example.      |
| created_at  | datetime | The creation date of the example.    |
| updated_at  | datetime | The last update date of the example. |
| deleted_at  | datetime | The deletion date of the example.    |

#### Example Relationships

- **Belongs To**
  - User
