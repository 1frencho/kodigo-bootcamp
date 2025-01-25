### README.md

```markdown
# Laravel SQL Queries - Query Builder & Eloquent ORM

## 📚 Project Overview

This project demonstrates how to use Laravel's Query Builder and Eloquent ORM to execute SQL queries efficiently. It focuses on managing data for `users` and `orders` tables, as described in the activity guidelines.
```

## ⚙️ Setup and Installation

1. Clone this repository:

   ```bash
   git clone
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Copy `.env` and set up your database connection:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Run migrations to create the database structure:

   ```bash
   php artisan migrate
   ```

6. Seed the database with sample data:
   ```bash
   php artisan db:seed
   ```
7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Open the application in your browser:
   ```bash
   http://localhost:8000
   ```

---

## 🔗 API Endpoints

### Users

| Method | Endpoint        | Description                                                              |
| ------ | --------------- | ------------------------------------------------------------------------ |
| GET    | `/api/v1/users` | Retrieves all users or filters by the first letter using `?startWith=R`. |

### Orders

| Method | Endpoint                                   | Description                                                                                               |
| ------ | ------------------------------------------ | --------------------------------------------------------------------------------------------------------- |
| GET    | `/api/v1/user/orders/{userId}`             | Retrieves all orders for the specified user ID.                                                           |
| GET    | `/api/v1/orders`                           | Retrieves detailed orders with user info. Can filter by `?min=100&max=250` or sort by `?sortByTotal=asc`. |
| GET    | `/api/v1/user/orders-count/{userId}`       | Calculates the total number of orders for the specified user ID.                                          |
| GET    | `/api/v1/orders/total`                     | Retrieves the sum of all orders' totals.                                                                  |
| GET    | `/api/v1/orders/most-cheap`                | Finds the cheapest order with user information.                                                           |
| GET    | `/api/v1/orders/by-user-in-group/{userId}` | Retrieves grouped orders by user ID.                                                                      |

---

## 📝 Activity Instructions

1. **Create a Laravel Project**: Set up a new Laravel project and configure the database connection.
2. **Database Migrations**: Create migrations for `users` and `orders` tables based on the provided database schema.
3. **Seed the Database**: Add at least 5 sample records for both tables.
4. **Controller Methods**: Implement the following queries in the corresponding controllers:
   - Retrieve orders by user ID.
   - Include user information in order details.
   - Filter orders by total range.
   - Find users whose names start with a specific letter.
   - Count orders by user ID.
   - Retrieve orders and sort them by total.
   - Calculate the sum of the total column in orders.
   - Find the cheapest order and the associated user.
   - Group orders by user.
5. **Test Each Endpoint**: Verify all routes using Postman or similar tools.
6. **Documentation**: Add clear comments in the code and provide detailed information in this `README.md`.
7. **Repository Submission**: Push the code to a public GitHub repository for evaluation.

---

## 📊 Database Schema

### Users Table

| Column Name  | Data Type | Description         |
| ------------ | --------- | ------------------- |
| id           | Integer   | Primary key         |
| name         | String    | Name of the user    |
| email        | String    | Email of the user   |
| phone_number | String    | User's phone number |
| created_at   | Timestamp | Creation timestamp  |
| updated_at   | Timestamp | Update timestamp    |

### Orders Table

| Column Name | Data Type | Description              |
| ----------- | --------- | ------------------------ |
| id          | Integer   | Primary key              |
| product     | String    | Name of the product      |
| quantity    | Integer   | Quantity ordered         |
| total       | Decimal   | Total price of the order |
| user_id     | Integer   | Foreign key to `users`   |
| created_at  | Timestamp | Creation timestamp       |
| updated_at  | Timestamp | Update timestamp         |

---
