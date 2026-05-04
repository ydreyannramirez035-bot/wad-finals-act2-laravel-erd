## Web Application Development (WAD 2) Final Project.
# OrderTrack – Order Management System

## Project Title
OrderTrack: A Laravel-Based Order Management System

---

## System Description
OrderTrack is a web-based Order Management System developed using the Laravel framework. It allows customers to create and manage their own orders, while administrators can monitor all transactions, manage products, and view overall system performance through a dedicated admin dashboard.

The system uses authentication, role-based access control, middleware protection, and Eloquent ORM to ensure secure and efficient data management.

---

## Implemented Features

### Authentication System
- User registration and login
- Secure access using Laravel authentication
- Session-based login system

---

### Role-Based Access
- **Customer**
  - View dashboard
  - Create orders
  - View and delete own orders
  - Manage profile

- **Admin**
  - Access admin dashboard
  - View all orders
  - Manage products (CRUD)
  - Monitor system data

---

### Middleware Protection
- Restricts access to admin-only pages
- Prevents unauthorized access
- Automatically redirects users based on role

---

### CRUD Operations

#### Orders
- Create orders
- View orders list
- Delete orders
- Customers can only manage their own orders
- Admin can view all orders

#### Products (Admin Only)
- Create product
- View product
- Update product
- Delete product

---

### Eloquent Relationships
- Order belongs to Customer
- Order belongs to many Products (with quantity)
- Displays:
  - Customer name in orders
  - Products inside each order

---

### Authorization (Policies)
- Customers can only access their own data
- Admin has full system access
- Policies enforce secure data handling

---

### Dashboard
#### Customer Dashboard
- Total orders
- Total spent
- Recent orders

#### Admin Dashboard
- Total orders
- Total revenue
- Total customers
- Recent activity

---

### User Interface
- Clean and responsive design
- Built using Tailwind CSS
- Toast notifications for actions like:
  - Creating orders
  - Deleting orders

---

### System Flow
1. User registers or logs in
2. Customer creates an order
3. Orders are stored with products and quantities
4. User views order history
5. User deletes order
6. Admin monitors all system data
7. User logs out

---

## This project demonstrates:
- Laravel CRUD operations
- Authentication and authorization
- Middleware protection
- Role-based system
- Eloquent relationships
