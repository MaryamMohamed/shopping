## About Project

"Shopping" is a simple web app to manage products and create a shopping cart.

## Divivded Into:
- Registration System.
- Admin Dashboard.
- Customer Dashboard.

## Registration System
- Admin sign in.
- Admin sign out.
- Customer create account.
- Customer sign in.
- Customer sign out.

## Admin Dashboard
- Add Product.
- Edit Product.
- Delete Product.
- View Products.

### Customer Dashboard
- View products.
- Add products to cart.
- View cart.
- Remove from cart.
- Update item quantity in cart.

## How To Work?
# First:  Migrate Database.    (php artisan migrate)

# Second: Migrate Seeds.       (php artisan db:seed)

# Some Admin Routes:
- http://localhost/shopping/public/admin/login
email: admin@gmail.com
password: 12345678

from admin/home choose dashboard and the products
- http://localhost/shopping/public/admin/products

# Some Customer Routes:
- http://localhost/shopping/public/user/register
- http://localhost/shopping/public/user/login
- http://localhost/shopping/public/user/home
